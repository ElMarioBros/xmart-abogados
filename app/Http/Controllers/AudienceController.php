<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LegalCase;

class AudienceController extends Controller
{
    public function store(String $id, Request $request)
    {
        $case = LegalCase::find($id);

        $case->audience()->create([
            'date' => $request->date
        ]);

        return redirect()->route('legalcase.show', $id)->with('success', 'Nueva audiencia registrada con éxito. ');
    }
}
