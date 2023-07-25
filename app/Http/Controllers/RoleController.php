<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use Session;
use App\Http\Resources\RoleResource;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

class RoleController extends Controller
{
    public function add_role(){
        return view('role.add');
    }

    public function add_role_submit(Request $request){
         //validation
        $this->validate($request,[
            'nom' => 'required',
            'description' => 'required'
        ],[
            'nom.required' => 'Entrer le nom de role',
            'description.required' => 'Entrer la description de role',
        ]);
        //create admin
        Role::create([
           'nom' => $request->nom,
           'description' => $request->description,
        ]);
        Session::flash('success', 'Aajoute avec succes!!!');
        return redirect()->back();
    }
    public function liste_role(){
        $liste = Role::get();
        return view ('role.liste')->with('roles', $liste);
    }

    public function edit_role($id){
        
        //obtenir la depense a modifier
       $com = Role::find($id);
      
       return view('role.edit',
         [
           'com'=> $com,
          
         ]);
    }

    public function delete_role($id){
        Role::find($id)->delete();
        Session::flash('success','Suppression avec succés');
        return redirect()->back();
    }

    public function role_submit(Request $request,$id){
        //Validation
        $this->validate($request, [
            
            'nom' => 'required',
            'description' => 'required',
            
        ]);
   
    
        $dep =  Role::find($id);
        $dep->nom = $request->nom;
        $dep->description = $request->description;
       
        $dep->update();
        Session::flash('success','Modification reussie');

        return redirect()->back();
        
    }

      //api
    
      public function index()
      {
          return RoleResource::collection(Role::get());
      }
  
      public function store(StoreRoleRequest $request)
      {
          $data = $request->validated();
  
          $role = Role::create($data);
  
          return new RoleResource($role);
      }
  
      public function show(Role $role)
      {
          return new RoleResource($role);
      }
  
      public function update(UpdateRoleRequest $request, Role $role)
      {
          $data = $request->validated();
          
          $role->update($data);
          return new RoleResource($role);
      }
  
      public function destroy(Role $role)
      {
          $role->delete();
  
        
          return response('Supression avec success',204);
      }
  
}
