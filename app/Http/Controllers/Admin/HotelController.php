<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquents\HotelRepository;
use App\Repositories\Eloquents\OwnerRepository;

class HotelController extends Controller
{
    protected $hotelRepository;
    protected $ownerRepository;

    public function __construct(HotelRepository $hotelRepository, OwnerRepository $ownerRepository)
    {
    	$this->hotelRepository = $hotelRepository;
    	$this->ownerRepository = $ownerRepository;
    }

    public function showListHotels()
    {
    	$hotels = $this->hotelRepository->all();
    	return view('admin.hotel.list', compact('hotels'));
    }
}
