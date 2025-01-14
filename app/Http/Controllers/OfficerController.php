<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Officer;

class OfficerController extends Controller
{
    public function fetchAll() {
        $duties = Officer::latest()->select('id', 'name')->get();
        return response()->json($duties);
    }
}
