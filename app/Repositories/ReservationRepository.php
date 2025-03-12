<?php

namespace App\Repositories;

use App\Models\Reservation;
use App\Repositories\Contracts\ReservationRepositoryInterface;

class ReservationRepository implements ReservationRepositoryInterface
{
    protected $model;

    public function __construct(Reservation $reservation)
    {
        $this->model = $reservation;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $record = $this->find($id);
        return $record->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getByHotel(int $hotel_id)
    {
        return $this->model->where('hotel_id', $hotel_id)->get();
    }
    public function findByEmail( $email)
    {
        return $this->model->where('email', $email)->get();
    }

    public function findByCustomerId($customerId)
    {
        return $this->model->where('customer_id', $customerId)->get();
    }

}
