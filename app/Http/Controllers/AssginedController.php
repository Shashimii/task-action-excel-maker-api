<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assigned;
use Validator;

class AssginedController extends Controller
{
    public function fetchAll() {
        $assigned = Assigned::latest()->select('id', 'officer_id', 'duty_id', 'officer', 'duty', 'date', 'code', 'officerIndex', 'dutyIndex')->get();
        return response()->json($assigned);
    }

    public function storeAssigned(Request $request) {
        $validator = Validator::make($request->all(), [
            'officer_Id' => 'required',
            'duty_Id' => 'required',
            'officer' => 'required',
            'duty' => 'required',
            'date' => 'required',
            'code' => 'required',
            'officerIndex' => 'required',
            'dutyIndex' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $assigned = Assigned::create([
            'officer_id' => $request->officer_Id,
            'duty_id' => $request->duty_Id,
            'officer' => $request->officer,
            'duty' => $request->duty,
            'date' => $request->date,
            'code' => $request->code,
            'officerIndex' => $request->officerIndex,
            'dutyIndex' => $request->dutyIndex
        ]);

        return response()->json($assigned, 201);
    }
}
