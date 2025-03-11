<?php

namespace App\Http\Middleware;

use App\Repositories\Contracts\ReservationRepositoryInterface;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReservationLimitMiddleware
{
    protected $reservationRepository;

    public function __construct(ReservationRepositoryInterface $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    public function handle(Request $request, Closure $next): Response
    {
        // Limité à 4 mail
        $email = $request->input('email');
        $reservations = $this->reservationRepository->findByEmail($email);

        if ($reservations->count() >= 4) {
            return response()->json([
                'message' => 'You have reached the maximum number of reservations (4) allowed per user.'
            ], 429);
        }

        return $next($request);
    }
}
