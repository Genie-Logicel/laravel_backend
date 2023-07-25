<?php

namespace App\Http\Controllers;

use App\Etude;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EtudesController extends Controller
{
    public function index() {
        $etudes = Etude::orderBy('id','desc')->paginate(5);
        return view('etude.liste', compact('etudes'));
    }
    
    public function create() {
        return view('etude.create');
    }
    public function store(Request $request) {
        $request->validate([
            'domaine'       => 'required',
            'niveau'        => 'required',
            'institution'   => 'required',
        ]);
    
        try {
            Etude::create($request->post());
            return redirect()->route('etude.index')->with('success', 'Insértion étude avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'insertion de l\'étude.');
        }
    }

    public function show($id) {
        $etudes = Etude::findOrFail($id);
        return view('etude.show',compact('etudes'));
    }

    public function edit($id) {
        $etudes = Etude::findOrFail($id);
        return view('etude.edit',compact('etudes'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'domaine'       => 'required',
            'niveau'        => 'required',
            'institution'   => 'required',
        ]);
    
        try {
            $etudes = Etude::findOrFail($id);
            $etudes->domaine = $request->get('domaine');
            $etudes->niveau = $request->get('niveau');
            $etudes->institution = $request->get('institution');
    
            $etudes->update();
    
            return redirect()->route('etude.index')->with('success', 'Modification étude avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la modification de l\'étude.');
        }
    }
    
    public function destroy($id){
        try {
            $etude = Etude::findOrFail($id);
            $etude->delete();
            return redirect()->route('etude.index')->with('success', 'Suppression étude avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression de l\'étude.');
        }
    }
}
