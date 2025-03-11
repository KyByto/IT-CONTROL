<?php

namespace App\Repositories\Contracts;

interface ReservationRepositoryInterface extends RepositoryInterface
{
   public function  getByHotel(int $hotel_id);

   public function findByEmail(string $email);
}
