<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use App\Repositories\ReservationRepository;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    protected $reservationRepository;

    public function __construct(ReservationRepository $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    public function index(Request $request)
    {
        $user = $request->user();

        $reservations = $this->reservationRepository->findByCustomerId($user->id);
        return ReservationResource::collection($reservations);
    }

    public function show($id)
    {
        $reservation = $this->reservationRepository->find($id);

        // Vérifier que l'utilisateur authentifié est bien le propriétaire de la réservation
        if ($reservation->customer_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return new ReservationResource($reservation);

    }

    public function store(ReservationRequest $request)
    {

        $validated = $request->validated();

        // on lui donne pas le droit de mettre le id du customer car c'est lui meme un customer
        $validated['customer_id'] = auth()->id();

        $reservation = $this->reservationRepository->create($validated);
        return new ReservationResource($reservation);
    }

    public function update(ReservationRequest $request, $id)
    {
        $validated = $request->validated();
        $reservation = $this->reservationRepository->find($id);

        // Vérifier que l'utilisateur authentifié est bien le propriétaire de la réservation
        if ($reservation->customer_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }



        $this->reservationRepository->update($validated, $id);
        $reservation = $this->reservationRepository->find($id);
        return new ReservationResource($reservation);
    }

    public function destroy($id)
    {
        $reservation = $this->reservationRepository->find($id);

        // Vérifier que l'utilisateur authentifié est bien le propriétaire de la réservation
        if ($reservation->customer_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $this->reservationRepository->delete($id);
        return response()->json(null, 204);
    }

    public function getByHotel($hotelId)
    {
        $reservations = $this->reservationRepository->getByHotel($hotelId);
        return ReservationResource::collection($reservations);
    }

}
