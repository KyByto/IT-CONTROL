<?php

namespace App\Repositories\Contracts;

interface HotelRepositoryInterface extends RepositoryInterface
{
   public function getByName(string $name);
}
