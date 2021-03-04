<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BoardingHouseCollection;
use App\Models\BoardingHouse;
use Illuminate\Http\Request;

class BoardingHouseController extends Controller
{
    public function index()
    {
        return new BoardingHouseCollection(BoardingHouse::paginate(10));
    }
}
