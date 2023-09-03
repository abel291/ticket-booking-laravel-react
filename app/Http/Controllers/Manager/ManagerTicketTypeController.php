<?php

namespace App\Http\Controllers\Manager;

use App\Enums\TicketTypesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\TicketTypeStoreRequest;
use App\Http\Resources\EventResource;
use App\Http\Resources\TicketTypeResource;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\TicketType;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ManagerTicketTypeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request, $event_id)
	{
		$event = $this->getEvent($event_id);

		$ticket_types = $event->ticket_types()->select('id', 'name', 'quantity', 'type', 'price', 'active', 'updated_at')
			->where('name', 'like', '%' . $request->search . '%')
			->orderBy('id', 'desc')
			->paginate(20);

		return Inertia::render('Manager/TicketType/TicketTypeList', [
			'event' => new EventResource($event),
			'ticketTypes' => TicketTypeResource::collection($ticket_types),
			'filters' => $request->only('search'),
			'eventId' => $event_id
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create($event_id)
	{
		return Inertia::render('Manager/TicketType/TicketTypeCreate', [
			'ticketType' => TicketType::factory()->make(),
			'typePrice' => $this->getTypePrice(),
			'edit' => false,
			'eventId' => $event_id
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(TicketTypeStoreRequest $request, $event_id)
	{

		$validated = $request->validated();
		$ticket_type = new TicketType($validated);
		if ($ticket_type->type == TicketTypesEnum::FREE) {
			$ticket_type->price = 0;
			$ticket_type->price_basic = 0;
			$ticket_type->includeFee = false;
		} else {
			$ticket_type->calculatePrice();
		}
		$ticket_type->event_id = $event_id;
		$ticket_type->user_id = auth()->user()->id;
		$ticket_type->save();

		return  to_route('manager.events.ticket_types.index', $event_id)
			->with(['success' => 'Registro creado']);
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $event_id, string $id)
	{
		$ticket_type = TicketType::whereHas('event', function ($query) use ($event_id) {
			$query->where('id', $event_id);
			$query->where('user_id', auth()->user()->id);
		})->findOrFail($id);

		return Inertia::render('Manager/TicketType/TicketTypeCreate', [
			'ticketType' => $ticket_type,
			'typePrice' => $this->getTypePrice(),
			'edit' => true,
			'eventId' => $event_id
		]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(TicketTypeStoreRequest $request, $event_id, string $id)
	{

		$validated = $request->validated();
		$ticket_type = TicketType::whereHas('event', function ($query) use ($event_id) {
			$query->where('id', $event_id);
			$query->where('user_id', auth()->user()->id);
		})->findOrFail($id)->fill($validated);

		if ($ticket_type->type == TicketTypesEnum::FREE) {
			$ticket_type->price = 0;
			$ticket_type->price_basic = 0;
			$ticket_type->includeFee = false;
		} else {
			$ticket_type->calculatePrice();
		}
		$ticket_type->save();

		return  to_route('manager.events.ticket_types.index', $event_id)->with(['success' => 'Registro guardado']);
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $event_id, string $ticket_type_id)
	{

		$ticket_type = TicketType::whereHas('event', function ($query) use ($event_id) {
			$query->where('id', $event_id)->where('user_id', auth()->user()->id);
		})->findOrFail($ticket_type_id);

		$ticket_type->delete();
		return  to_route('manager.events.ticket_types.index', $event_id)->with(['success' => 'Registro Eliminado']);
	}

	public function getEvent($event_id)
	{

		return Event::select('id', 'title', 'slug', 'thum', 'user_id', 'category_id', 'sub_category_id', 'updated_at')
			->where('user_id', auth()->user()->id)
			->with('category:id,name')
			->with('subCategory:id,name')
			->findOrFail($event_id);
	}
	public function getTypePrice()
	{
		$typePrice = [];
		foreach (TicketTypesEnum::cases() as $key => $item) {
			$typePrice[$key] = [
				'name' => $item->text(),
				'value' => $item->value,
			];
		}
		return $typePrice;
	}

	public function calculatePrice(Request $request)
	{

		$ticket_type = new TicketType();
		$ticket_type->price_basic = $request->price_basic;
		$ticket_type->includeFee = $request->includeFee;
		$ticket_type->calculatePrice();
		return $ticket_type->price;
	}
}
