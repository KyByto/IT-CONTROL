<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotelRequest;
use App\Http\Resources\HotelResource;
use App\Repositories\HotelRepository;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    protected $hotelRepository;

    public function __construct(HotelRepository $hotelRepository)
    {

        $this->hotelRepository = $hotelRepository;
    }

    public function index()
    {
        $hotels = $this->hotelRepository->all();
        return HotelResource::collection($hotels);
    }

    public function show($id)
    {
        $hotel = $this->hotelRepository->find($id);
        return new HotelResource($hotel);
    }

    public function store(HotelRequest $request)
    {


        $hotel = $this->hotelRepository->create($request->all());
        return new HotelResource($hotel);
    }

    public function update(HotelRequest $request, $id)
    {


        $this->hotelRepository->update($request->all(), $id);
        $hotel = $this->hotelRepository->find($id);
        return new HotelResource($hotel);
    }

    public function destroy($id)
    {
        $this->hotelRepository->delete($id);
        return response()->json(null, 204);
    }
}
