<?php

namespace App\Http\Controllers;
use App\Formation;
use Session;
use App\Http\Resources\FormationResource;
use App\Http\Requests\StoreFormationRequest;
use App\Http\Requests\UpdateFormationRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function add_formation(){
        return view('formation.add');
    }

    public function add_formation_submit(Request $request){
         //validation
        $this->validate($request,[
            'titre' => 'required',
            'institution' => 'required',
            'annee' => 'required'
        ],[
            'titre.required' => 'Entrer titre information',
            'institution.required' => 'Entrer institution',
            'annee.required' =>  'Entrer votre annee',
        ]);
        //create admin
        Formation::create([
           'titre' => $request->titre,
           'institution' => $request->institution,
           'annee' => $request->annee,
        ]);
        Session::flash('success', 'Ajout avec succes!!!');
        return redirect()->back();
    }
    public function liste_formation(){
        $liste = Formation::get();
        return view ('formation.liste')->with('formations', $liste);
    }

    public function edit_formation($id){
        
        //obtenir la depense a modifier
       $for = Formation::find($id);
      
       return view('formation.edit',
         [
           'for'=> $for,
          
         ]);
    }


    public function update(Request $request, $id) {
        $request->validate([
            'titre'       => 'required',
            'institution'   => 'required',
            'annee'   => 'required',
        ]);
    
        try {
            $formations = formation::find($id);
            $formations->titre = $request->get('titre');
            $formations->institution = $request->get('institution');
            $formations->annee = $request->get('annee');
    
            $autres->update();
    
            return redirect()->route('formation.index')->with('success', 'Modification formation avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la modification de l\'formation');
        }
    }

    public function delete_formation($id){
        Formation::find($id)->delete();
        Session::flash('success','Suppression avec succés');
        return redirect()->back();
    }

    public function formation_submit(Request $request,$id){
        //Validation
        $this->validate($request, [
            
            'titre' => 'required',
            'institution' => 'required',
            'annee' => 'required',
            
        ]);
   
    
       // $dep =  Formation::find($id);
        //$dep->nom = $request->nom;
        //$dep->description = $request->description;
       
        //$dep->update();
        //Session::flash('success','Modification reussie');

       // return redirect()->back();
        
    }

    //api
    
    public function index()
    {
        return FormationResource::collection(Formation::get());
    }

    public function store(StoreFormationRequest $request)
    {
        $data = $request->validated();

        $formation = Formation::create($data);

        return new FormationResource($formation);
    }

    public function show(Formation $formation)
    {
        return new FormationResource($formation);
    }

    

    public function destroy(Formation $formation)
    {
        $formation->delete();

      
        return response('Supression avec success',204);
    }
}
