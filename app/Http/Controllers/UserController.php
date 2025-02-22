<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
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
        $user->password = bcrypt($request->input('password'));
        $user->profil = $imageName;

        $user->save();

        return redirect('/connexion')->with('status','inscription bravée avec succès');
    }

    public function add_connexion (Request $request){

        //definit les differentes erreurs à afficher en cas de non respect des regles de validation.
        $messages = [

            'password.required' => 'veuillez saisir un mot de passe',
            'password.max' => 'veuillez saisir des mots de passe ayant maximun 12 caractères',

            'email.required' => 'veuillez entrer une adresse email',
            'email.regex' => 'entrer une adresse email valide',

        ];


        $request->validate([
            'email' => 'required|regex:/^[a-zA-Z]+[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            'password' => 'required|max:12',
        ], $messages);

        // cheche si un utilisateur ayant l'email entré existe
        $utilisateur = User::where('email',$request->input('email'))->first();

        //renvoi vers la page de connexion avec une erreur
        if (!$utilisateur) {
            return back()->with('connexion_echec','votre email est incorrect , veuillez mettre le bon');
        }

        //

        //verifie si le password entré est semblable à celui entré dans le champ password.
        if (! Hash::check($request->input('password'), $utilisateur->password )) {
            return back()->with('connexion_echec','votre password est incorrect , veuillez entrer un correct');
        }

        // tente de se connecter en utilisant les identifiants (email et password)
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials, $request->has('remember'))){
            $utilisateur->is_connected = true;
            $utilisateur->save();
            return redirect('/entreprise')->with('connexion_succeed','votre connexion a reussi');
        }

        else{
            return back()->with('connexion_echec', 'il y a certainement une erreur');
        }
    }

}
