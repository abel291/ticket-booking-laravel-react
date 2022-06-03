<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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


        return Redirect::route('account_details')
            ->with(
                'success',
                'Datos Actualizados correctamente'
            );
    }

    public function my_orders()
    {

        $user = auth()->user();
        $payments = $user->payments()->orderBy('id', 'DESC')->paginate(10);
        //dd($payments->first());
        return Inertia::render('Profile/MyOrders', [
            'orders' => PaymentResource::collection($payments)
        ]);
    }

    public function order_details(Request $request)
    {

        $user = auth()->user();

        $payment = $user->payments()->where('code', $request->code)->with('tickets')->firstOrFail();

        // if (!$payment) {
        //     return Redirect::route('shopping')->withErrors(['message' => 'Al Parecer hubo un error']);;
        // }

        //dd(new PaymentResource($payment));

        return Inertia::render('Profile/OrderDetails', [
            'orderDetails' => new PaymentResource($payment),
        ]);
    }
    public function order_details_pdf($code)
    {
        $user = auth()->user();
        $payment = $user->payments()->where('code', $code)->with('tickets')->firstOrFail();
        
        $qrcode = QrCode::format('svg')->size(200)->generate(route('order_validate', ['code' => $payment->code]));
        $session_format=$payment->session->isoFormat('dddd, D MMMM , YYYY hh:mm A');
        $payment = json_decode(json_encode($payment), true);
        $data = [
            'qrcode' => $qrcode,
            'session_format' => $session_format,            
            ...$payment
        ];
        $pdf = PDF::loadView('pdf.ticket', $data);
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
}
