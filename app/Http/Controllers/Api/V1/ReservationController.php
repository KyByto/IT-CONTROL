<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReservationResource;
use App\Repositories\ReservationRepository;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    protected $reservationRepository;

    public function __construct(ReservationRepository $reservationRepository)
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
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ]);

        $reservation = $this->reservationRepository->create($validated);
        return new ReservationResource($reservation);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'hotel_id' => 'sometimes|required|exists:hotels,id',
            'customer_id' => 'sometimes|required|exists:customers,id',
            'check_in' => 'sometimes|required|date|after_or_equal:today',
            'check_out' => 'sometimes|required|date|after:check_in',
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
