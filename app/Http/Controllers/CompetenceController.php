<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Competence;
use Session;
use App\Http\Resources\CompetenceResource;
use App\Http\Requests\StoreCompetenceRequest;
use App\Http\Requests\UpdateCompetenceRequest;
class CompetenceController extends Controller
{
    public function add_competence(){
        return view('competence.add');
    }

    public function add_competence_submit(Request $request){
         //validation
        $this->validate($request,[
            'nom' => 'required',
            'description' => 'required'
        ],[
            'nom.required' => 'Entrer le nom de competence',
            'description.required' => 'Entrer la description de competence',
        ]);
        //create admin
        Competence::create([
           'nom' => $request->nom,
           'description' => $request->description,
        ]);
        Session::flash('success', 'Aajoute avec succes!!!');
        return redirect()->back();
    }
    public function liste_competence(){
        $liste = Competence::get();
        return view ('competence.liste')->with('competences', $liste);
    }

    public function edit_competence($id){
        
        //obtenir la depense a modifier
       $com = Competence::find($id);
      
       return view('competence.edit',
         [
           'com'=> $com,
          
         ]);
    }

    public function delete_competence($id){
        Competence::find($id)->delete();
        Session::flash('success','Suppression avec succés');
        return redirect()->back();
    }

    public function competence_submit(Request $request,$id){
        //Validation
        $this->validate($request, [
            
            'nom' => 'required',
            'description' => 'required',
            
        ]);
   
    
        $dep =  Competence::find($id);
        $dep->nom = $request->nom;
        $dep->description = $request->description;
       
        $dep->update();
        Session::flash('success','Modification reussie');

        return redirect()->back();
        
    }

    //api
    
    public function index()
    {
        return CompetenceResource::collection(Competence::get());
    }

    public function store(StoreCompetenceRequest $request)
    {
        $data = $request->validated();

        $competence = Competence::create($data);

        return new CompetenceResource($competence);
    }

    public function show(Competence $competence)
    {
        return new CompetenceResource($competence);
    }

    public function update(UpdateCompetenceRequest $request, Competence $competence)
    {
        $data = $request->validated();
        
        $competence->update($data);
        return new competenceResource($competence);
    }

    public function destroy(Competence $competence)
    {
        $competence->delete();

      
        return response('Supression avec success',204);
    }


}
