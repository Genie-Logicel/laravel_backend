<?php

namespace App\Http\Controllers;

use App\AutreCompetence;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AutreCompetencesController extends Controller
{

    public function index() {
        $autres = AutreCompetence::orderBy('id','desc')->paginate(5);
        return view('autrecompetence.liste', compact('autres'));
    }
    
    public function create() {
        return view('autrecompetence.create');
    }
    public function store(Request $request) {
        $request->validate([
            'nom'           => 'required',
            'description'   => 'required',
        ]);
    
        try {
            AutreCompetence::create($request->post());
            return redirect()->route('autre-competence.index')->with('success', 'Insértion autre compétence avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'insertion de l\'autre compétence');
        }
    }

    public function show($id) {
        $autres = AutreCompetence::findOrFail($id);
        return view('autrecompetence.show',compact('autres'));
    }

    public function edit($id) {
        $autres = AutreCompetence::findOrFail($id);
        return view('autrecompetence.edit',compact('autres'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nom'       => 'required',
            'description'   => 'required',
        ]);
    
        try {
            $autres = AutreCompetence::findOrFail($id);
            $autres->nom = $request->get('nom');
            $autres->description = $request->get('description');
    
            $autres->update();
    
            return redirect()->route('autre-competence.index')->with('success', 'Modification autre compétence avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la modification de l\'autre compétence');
        }
    }
    
    public function destroy($id){
        try {
            $autre = AutreCompetence::findOrFail($id);
            $autre->delete();
            return redirect()->route('autre-competence.index')->with('success', 'Suppression autre compétence avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression de l\'autre compétence');
        }
    }
}