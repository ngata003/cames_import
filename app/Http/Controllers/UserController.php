<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function inscription_code(Request $request){

        //dd($request->all());

        $messages = [
            'name.required' => 'veuillez remplir le champ Nom',
            'name.regex' => 'Le nom ne doit contenir que des lettres et des espaces.',
            'name.unique' => 'veuillez changer ce nom car il est déjà enregistré',

            'email.required' => 'veuillez changer votre email car il existe deja',
            'email.regex' => 'veuillez rentrer une adresse email valide ',
            'email.unique'=> 'cet email existe deja veuillez utiliser une autre',

            'contact.required' => 'veuillez rentrer un contact',
            'contact.regex' => 'veuillez rentrer un contact valide',
            'contact.unique' => 'veuillez rentrer un autre contact car celui-ci existe déjà',

            'password.required' => 'veuillez saisir un mot de passe',
            'password.max' => 'veuillez rentrer une adresse ayant au maximum 12 caractères',

            'type.required' => 'veuillez rentrer un type',
            'role.required' => 'veuillez rentrer un role',
            'residence.required' => 'veuillez rentrer une residence',

            'profil.image' => 'le fichier doit etre une image',
            'profil.mimes' => 'Formats autorisés : jpeg, jpg, png, svg, gif.',
            'profil.max' => 'L\'image ne doit pas dépasser 2MB.',


        ];

        $request->validate([
            'name'=>'required|string|max:255|unique:users,name|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'email' => 'required|email|unique:users,email|regex:/^[a-zA-Z]+[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            'contact'=>'required|unique:users,contact|regex:/^\+?[1-9]\d{6,14}$/',
            'password'=>'required|max:12',
            'type'=>'required',
            'role'=>'required',
            'residence'=>'required',
            'nom_createur'=>'nullable',
            'nom_entreprise'=>'nullable',
            'profil'=>'nullable|image|mimes:jpeg,jpg,png,svg,gif|max:2048',
        ], $messages);

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
