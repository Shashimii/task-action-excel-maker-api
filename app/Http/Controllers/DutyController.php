<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Duty;

class DutyController extends Controller
{
    public function fetchAll() {
        $duties = Duty::latest()->select('id', 'duty')->get();
        return response()->json($duties);
    }
}
