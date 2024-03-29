<?php

namespace App\Http\Controllers\Profile;

use App\Enums\OrderStatus;
use App\Helpers\Checkout;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Resources\PaymentResource;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;

class ProfileController extends Controller
{
	public function my_account()
	{
		return Inertia::render('Profile/Dashboard');
	}

	public function account_details()
	{
		return Inertia::render('Profile/AccountDetails');
	}

	public function store_account_details(Request $request)
	{
		$user = auth()->user();
		$request->validate([
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'confirmed', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
			'phone' => ['required', 'string', 'max:255'],
		]);

		$user->forceFill([
			'name' => $request->name,
			'email' => $request->email,
			'phone' => $request->phone,
			// 'city' => $request->city,
			// 'address' => $request->address,
		])->save();

		return Redirect::route('profile.account_details')
			->with(
				'success',
				'Datos Actualizados correctamente'
			);
	}

	public function my_orders()
	{
		$user = auth()->user();
		$payments = $user->orders()->orderBy('id', 'DESC')->paginate(10);
		//dd($payments->first());
		return Inertia::render('Profile/MyOrders', [
			'orders' => OrderResource::collection($payments),
		]);
	}

	public function order_details(Request $request)
	{
		$user = auth()->user();

		$payment = $user->orders()->where('code', $request->code)->with('order_tickets')->firstOrFail();

		return Inertia::render('Profile/OrderDetails/OrderDetails', [
			'order' => new OrderResource($payment),
		]);
	}

	public function order_details_pdf($code)
	{
		$user = auth()->user();
		$order = $user->orders()->where('code', $code)->with('order_tickets')->firstOrFail();

		$qrcode = QrCode::format('svg')->size(200)->generate(route('order_validate', ['code' => $order->code]));
		$session_format = $order->session->date->isoFormat('dddd, D MMMM , YYYY hh:mm A');
		$order = json_decode(json_encode($order), true);
		$data = [
			'qrcode' => $qrcode,
			'session_format' => $session_format,
			...$order,
		];
		$pdf = Pdf::loadView('pdf.ticket', $data);

		return $pdf->stream();

		return view('pdf.ticket', $data);
	}

	public function change_password()
	{
		return Inertia::render('Profile/ChangePassword');
	}

	public function store_change_password(Request $request)
	{
		$user = auth()->user();

		Validator::make($request->all(), [
			'current_password' => ['required', 'string'],
			'password' => ['required', 'confirmed', Rules\Password::defaults()],
		])->after(function ($validator) use ($user, $request) {
			if (!isset($request->current_password) || !Hash::check($request->current_password, $user->password)) {
				$validator->errors()->add('current_password', __('La contraseña proporcionada no coincide con su contraseña actual. '));
			}
		})->validate();

		$user->forceFill([
			'password' => Hash::make($request->password),
		])->save();

		return Redirect::route('change_password')
			->with(
				'success',
				'Datos Actualizados Correctamente'
			);
	}

	public function cancel_order($code)
	{
		$user = auth()->user();

		$payment = $user->payments->where('code', $code)->firstOrFail();

		if ($payment->status != OrderStatus::SUCCESSFUL) {
			return Redirect::route('profile.my_orders')
				->withErrors(
					'Este boleto ya esta cancelado',
				);
		}

		[$days, $porcent_refund, $amount_refund,] = Checkout::calculate_amount_refund($payment);

		return Inertia::render('Profile/CancelOrder', [
			'amount_refund' => $amount_refund,
			'days' => $days,
			'porcent_refund' => $porcent_refund,
			'payment' => new PaymentResource($payment),

		]);
	}

	public function store_cancel_order(Request $request)
	{
		$user = auth()->user();

		$payment = $user->payments->where('code', $request->code)->firstOrFail();

		if ($payment->status != OrderStatus::SUCCESSFUL) {
			return Redirect::route('profile.my_orders')
				->withErrors(
					'Este boleto ya esta cancelado',
				);
		}

		[$days, $porcent_refund, $amount_refund] = Checkout::calculate_amount_refund($payment);

		if ($amount_refund > 0) {
			Checkout::refund($payment, $amount_refund, $days, $porcent_refund);
			$payment->status = OrderStatus::REFUNDED;
		} else {
			$payment->status = OrderStatus::CANCELED;
		}

		$payment->cancel_data = [
			'porcent_refund' => $porcent_refund,
			'days' => $days,
			'amount_refund' => $amount_refund,
		];

		$payment->canceled_at = Carbon::now();
		$payment->save();

		// try {
		//     DB::beginTransaction();
		//     if ($amount_refund > 0) {
		//         Checkout::refund($payment, $amount_refund, $days, $porcent_refund);
		//         $payment->status = OrderStatus::REFUNDED;
		//     } else {
		//         $payment->status = OrderStatus::CANCELED;
		//     }

		//     $payment->cancel_data = [
		//         'porcent_refund' => $porcent_refund,
		//         'days' => $days,
		//         'amount_refund' => $amount_refund
		//     ];

		//     $payment->canceled_at = Carbon::now();
		//     $payment->save();

		//     DB::commit();
		// } catch (\Throwable $e) {

		//     DB::rollBack();
		//     return back()->withErrors(['message' => "Al parecer hubo un error! El reembolso no se pudo realizar"]);
		// }

		return Redirect::route('profile.my_orders')
			->with(
				'success',
				'Datos Actualizados Correctamente'
			);
	}
}
