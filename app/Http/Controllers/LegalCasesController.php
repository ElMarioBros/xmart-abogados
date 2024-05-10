<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LegalCase;
use App\Http\Requests\StoreLegalCaseRequest;
use App\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class LegalCasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $legalCases = auth()->user()->role == Role::IS_ADMIN 
                    ? LegalCase::all() 
                    : auth()->user()->legalCase()->get();

        return view('dashboard', ['legalCases' => $legalCases]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-case');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLegalCaseRequest $request)
    {
        $legal_case = Auth()->user()->legalCase()->create([
            'project_name' => $request->project_name,
            'form_type' => $request->form_type,
            'client_name' => $request->client_name,
            'defendant_name' => $request->defendant_name,
            'client_type' => $request->client_type,
            'defendant_type' => $request->defendant_type,
            'payer_name' => $request->payer_name,
            'client_email' => $request->client_email,
            'defendant_email' => $request->defendant_email,
            'payer_email' => $request->payer_email,
            'client_phone' => $request->client_phone,
            'defendant_phone' => $request->defendant_phone,
            'payer_phone' => $request->payer_phone,
            'client_address' => $request->client_address,
            'defendant_address' => $request->defendant_address,
            'payer_address' => $request->payer_address,
            'file_number' => $request->file_number,
            'file_number_type' => $request->file_number_type,
            'authority_criminal' => $request->authority_criminal,
            'authority_federal' => $request->authority_federal,
            'observations' => $request->observations,
            'law_firm_validation' => $request->law_firm_validation,
            'client_emotional_state' => $request->client_emotional_state,
            'drawer_number' => $request->drawer_number,
            'honorarium' => $request->honorarium,
            'honorarium_currency' => $request->honorarium_currency,
        ]);

        return redirect()->route('legalcase.show', $legal_case->id)->with('success', 'Caso registrado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $case = LegalCase::find($id);
        $payments = $case->payment()->orderBy('id', 'desc')->get();
        $audiences = $case->audience()->orderBy('id', 'desc')->get();

        $totalValue = $payments->sum('value');
        $remaining_payment = $case->honorarium - $totalValue;

        return view('view-case', ['case' => $case, 'payments' => $payments, 'audiences' => $audiences, 'remaining_payment' => $remaining_payment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function uploadPicturesShow(string $target, string $id): View
    {
        return view('upload-photo', ['id' => $id, 'target' => $target]);
    }

    public function uploadPicturesStore(string $target, string $id, Request $request): RedirectResponse
    {
        $case = LegalCase::find($id);

        $request->validate([
            'file' => 'required|image|max:2048',
        ]);

        //$image = $request->file('file')->store('public/cases');
        $imageCloud = $request->file('file')->storeOnCloudinary('xmart-casos-legales');

        if ($target == 'client') {
            $case->client_photo = $imageCloud->getPath();
        }

        if ($target == 'payer') {
            $case->payer_photo = $imageCloud->getPath();
        }

        $case->save();

        return redirect()->route('legalcase.show', $id)->with('success', 'Cambios aplicados con éxito. ');
    }


    public function updateSatisfactionLevel(String $id, Request $request)
    {
        $case = LegalCase::find($id);
        $case->satisfaction_level = $request->satisfaction_level;
        $case->save();

        return redirect()->route('legalcase.show', $id)->with('success', 'Cambios aplicados con éxito. ');
    }
}
