<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReservationResource;
use App\Repositories\Contracts\ReservationRepositoryInterface;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    protected $reservationRepository;

    public function __construct(ReservationRepositoryInterface $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    public function index()
    {
        $reservations = $this->reservationRepository->all();
        return ReservationResource::collection($reservations);
    }

    public function show($id)
    {
        $reservation = $this->reservationRepository->find($id);
        return new ReservationResource($reservation);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'customer_id' => 'required|exists:customers,id',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
        ]);

        $reservation = $this->reservationRepository->create($validated);
        return new ReservationResource($reservation);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'hotel_id' => 'sometimes|required|exists:hotels,id',
            'customer_id' => 'sometimes|required|exists:customers,id',
            'check_in_date' => 'sometimes|required|date|after_or_equal:today',
            'check_out_date' => 'sometimes|required|date|after:check_in_date',
        ]);

        $this->reservationRepository->update($validated, $id);
        $reservation = $this->reservationRepository->find($id);
        return new ReservationResource($reservation);
    }

    public function destroy($id)
    {
        $this->reservationRepository->delete($id);
        return response()->json(null, 204);
    }

    public function getByHotel($hotelId)
    {
        $reservations = $this->reservationRepository->findByHotelId($hotelId);
        return ReservationResource::collection($reservations);
    }
}
