<?php

namespace App\Repositories;

use App\Models\Hotel;
use App\Repositories\Contracts\HotelRepositoryInterface;

class HotelRepository implements HotelRepositoryInterface
{
    protected $model;

    public function __construct(Hotel $hotel)
    {
        $this->model = $hotel;
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

    public function getByName(string $name)
    {
        return $this->model->where('name', 'like', "%{$name}%")->get();
    }
}
