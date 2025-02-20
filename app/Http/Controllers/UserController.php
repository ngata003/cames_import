<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function inscription_code(Request $request){

        //dd($request->all());

        $request->validate([
            'name'=>'required|string|max:255|unique:users,name|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'email'=>'required|email|unique:users,email|regex:/^(?!\d+$)[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            'contact'=>'required|unique:users,contact|regex:/^\+?[1-9]\d{6,14}$/',
            'password'=>'required|max:12',
            'type'=>'required',
            'role'=>'required',
            'residence'=>'required',
            'nom_createur'=>'nullable',
            'nom_entreprise'=>'nullable',
            'profil'=>'nullable|image|mimes:jpeg,jpg,png,svg,gif|max:2048',
        ]);

        if ($request->hasFile('profil')) {
            $imageFile = $request->file('profil');
            $imageName = time().'.'. $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('assets/images'),$imageName);
        }


        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contact = $request->input('contact');
        $user->residence = $request->input('residence');
        $user->type = $request->input('type');
        $user->role = $request->input('role');
        $user->nom_createur = $request->input('nom_createur');
        $user->nom_entreprise = $request->input('nom_entreprise');
        $user->password = bcrypt($request->input('nom_entreprise'));
        $user->profil = $imageName;

        $user->save();

        return redirect('/connexion')->with('status','inscription bravée avec succès');
    }

}
