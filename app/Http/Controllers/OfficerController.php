<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Officer;

class OfficerController extends Controller
{
    public function fetchAll() {
        $officer = Officer::latest()->select('id', 'name')->get();
        return response()->json($officer);
    }
        
    public function editOfficer(Request $request, $id)
    {
        $officer = Officer::find($id);

        if (!$officer) {
            return response()->json(['message' => 'Officer not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'string|max:255',
        ]);

        $officer->name = $validatedData['name'];
        $officer->save();

        return response()->json(['message' => 'Officer updated successfully'], 204);
    }

    

    public function deleteOfficer($id) {

        $officer = Officer::find($id);

        if (!$officer) {
            return response()->json(['error' => 'Officer not found'], 404);
        }

        $officer->assignedDuties()->delete();
        $officer->delete();

        return response()->json(null, 204);

    }
}
