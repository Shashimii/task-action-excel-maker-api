<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Duty;
use Validator;

class DutyController extends Controller
{
    public function fetchAll() {
        $duties = Duty::latest()->select('id', 'duty')->get();
        return response()->json($duties);
    }

    public function storeDuty(Request $request) {
        $validator = Validator::make($request->all(), [
            'duty' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $duty = Duty::create([
            'duty' => $request->duty
        ]);

        return response()->json($duty, 201);
    }
    
    public function editDuty(Request $request, $id)
    {
        $duty = Duty::find($id);

        if (!$duty) {
            return response()->json(['message' => 'Duty not found'], 404);
        }

        $validatedData = $request->validate([
            'duty' => 'string|max:255',
        ]);

        $duty->duty = $validatedData['duty'];
        $duty->save();

        return response()->json(['message' => 'Duty updated successfully'], 204);
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
