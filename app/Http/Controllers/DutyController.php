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

    public function deleteDuty($id) {
        
        $duty = Duty::find($id);

        if (!$duty) {
            return response()->json(['error' => 'Duty not found'], 404);
        }

        $duty->assignedDuties()->delete();
        $duty->delete();

        return response()->json(null, 204);
    }
}
