<?php

namespace App\Http\Controllers;

use App\Mail\SendPassword;
use App\Models\Entreprise;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Mail;
use Session;
use Str;

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

        //verifie si le password entré est semblable à celui entré dans le champ password.
        if (! Hash::check($request->input('password'), $utilisateur->password )) {
            return back()->with('connexion_echec','votre password est incorrect , veuillez entrer un correct');
        }

        // tente de se connecter en utilisant les identifiants (email et password)
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials, $request->has('remember'))){
            $utilisateur->is_connected = true;
            $utilisateur->save();

            if($utilisateur->type == 'admin' && $utilisateur->role == 'admin'){

                if ($utilisateur -> entreprise_created) {
                    $entreprise = Entreprise::where('nom_gestionnaire',$utilisateur->name)->first();
                    Session::put('entreprise_active',$entreprise);
                    return redirect('/profil')->with('status','connexion reussie');
                }
                else{
                    return redirect('/entreprise')->with('connexion_succeed','votre connexion a reussi');
                }

            }

            elseif($utilisateur->type == 'gestionnaire'){

                $entreprise = Entreprise::where('nom_entreprise',$utilisateur->nom_entreprise)->first();

                Session::put('entreprise_active',$entreprise);

                return redirect('/profil');
            }


        }

        else{
            return back()->with('connexion_echec', 'il y a certainement une erreur');
        }
    }

    public function add_gestionnaires (Request $request){

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
        ];


        $request->validate([
            'name' => 'required|string|max:255|unique:users,name|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'email' => 'required|email|unique:users,email|regex:/^[a-zA-Z]+[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            'contact' => 'required|unique:users,contact|regex:/^\+?[1-9]\d{6,14}$/',
            'type' => 'required',
            'residence' =>'required',
            'role' => 'required',
            'profil' => 'nullable|image|mimes:jpeg,jpg,png,svg,gif|max:2048',
        ], $messages);

        $passwordFirst = Str::random(10);

        $password = bcrypt($passwordFirst);

        if ($request->hasFile('profil')) {
            $imageFile = $request->file('profil');
            $profilName = time().'.'. $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('assets/images'),$profilName);
        }

        $gestionnaires = new User();

        $user = Auth::user();
        $nom_createur = $user->name;

        $entreprise = Session::get('entreprise_active');
        $nom_entreprise = $entreprise->nom_entreprise;

        $gestionnaires->name = $request->input('name');
        $gestionnaires->email = $request->input('email');
        $gestionnaires->contact = $request->input('contact');
        $gestionnaires->residence = $request->input('residence');
        $gestionnaires->type = $request->input('type');
        $gestionnaires->role = $request->input('role');
        $gestionnaires->profil = $profilName;
        $gestionnaires->password = $password;
        $gestionnaires->nom_createur = $nom_createur;
        $gestionnaires->nom_entreprise = $nom_entreprise;

        $gestionnaires->save();

        Mail::to($gestionnaires->email)->send(mailable: new SendPassword(
            $gestionnaires->name,
            $gestionnaires->email,
            $passwordFirst
        ));

        return back()->with('gestionnaire_added','gestionnaire ajouté avec succès');
    }


    public function update_gestionnaires(Request $request , $id){
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contact = $request->input('contact');
        $user->role = $request->input('role');
        $user->residence = $request->input('residence');

        if ($request->hasFile('profil')) {
            if ($user->profil) {
                $oldImagePath = public_path('assets/images/' . $user->profil);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $profil = $request->file('profil');
            $userImage = time() . '.' . $profil->getClientOriginalExtension();
            $profil->move(public_path('/assets/images'), $userImage);

            $user->profil = $userImage;
        }


        $user->save();

        return back()->with('gestionnaire_updated','gestionnaire modifié avec succès');
    }

    public function delete_gestionnaires($id){
        $gestionnaires = User::find($id);

        $gestionnaires->delete();

        return back()->with('gestionnaires_deleted','gestionnaire supprimé avec succès');
    }


    public function affichage_vue(){
        $user = Auth::user();

        $entreprise_active = Session::get('entreprise_active');

        $gestionnaires = User::where('nom_createur', $user->name)->where('nom_entreprise',$entreprise_active->nom_entreprise)->paginate(4);

        return view('gestionnaires.gestionnaires', compact('gestionnaires') );
    }

    public function research_gestionnaires(){

        $entreprise = Session::get('entreprise_active');

        $nom_entreprise = $entreprise->nom_entreprise;

        $research = $_GET['nom_gestionnaire'];

        $gestionnaires = User::where('name','LIKE','%'.$research.'%')->orWhere('email', 'LIKE','%'.$research.'%')->where('nom_entreprise',$nom_entreprise)->get();

        return view('gestionnaires.result_research',compact('gestionnaires'));
    }

    public function update_profil(Request $request)
    {
        $user = Auth::user();
        $messages = [
            'name.required' => 'veuillez entrer un nom dans le champ nom ',
            'name.regex' => 'veuillez renseigner uniquement une chaine de caracteres constituée de lettres uniquement',
            'contact.required' => 'veuillez entrer un contact dans le champ contact',
            'contact.regex' => 'veuillez entrer un contact valide et normal',
            'residence.required' => 'veuillez entrer une residence dans le champ residence',
        ];

        $request->validate([
            'name' => 'required|string|max:255|regex:/^[a-zA-ZÀ-ÿ\s-]+$/',
            'email' => 'required|email|regex:/^[a-zA-Z]+[a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/',
            'contact' => 'required|regex:/^\+?[1-9]\d{6,14}$/',
            'residence' => 'required',
            'image_changee' => 'nullable|image|mimes:jpeg,jpg,png,svg,gif|max:2048',
            'password' => 'nullable|String|max:12|confirmed',
        ], $messages);

        $identifiant = $request->input('identifiant');
        $infos = User::find($identifiant);

        if ($user->type == 'admin') {
            $ancienNom = $infos->name;
            $nouveauNom = $request->input('name');

            // Vérifiez si le nouveau nom existe déjà dans la table users
            $utilisateurExist = User::where('name', $nouveauNom)->exists();

            if (!$utilisateurExist) {
                // Si le nom n'existe pas, vous pouvez procéder à la mise à jour des entreprises
                Entreprise::where('nom_gestionnaire', $ancienNom)->update(['nom_gestionnaire' => $nouveauNom]);
                User::where('nom_createur', $ancienNom)->update(['nom_createur' => $nouveauNom]);

                $infos->name = $nouveauNom;
                $infos->contact = $request->input('contact');
                $infos->email = $request->input('email');
                $infos->residence = $request->input('residence');
                $infos->password = bcrypt($request->input('password'));

                if ($request->hasFile('image_changee')) {
                    if ($infos->profil) {
                        $oldImagePath = public_path('assets/images/' . $infos->profil);
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                    }

                    $uploadedFile = $request->file('image_changee'); // NE PAS ÉCRASER $infos
                    $userImage = time() . '.' . $uploadedFile->getClientOriginalExtension();
                    $uploadedFile->move(public_path('/assets/images'), $userImage);

                    $infos->profil = $userImage; // Met à jour le champ "profil" correctement
                }

                $infos->save();
                return back()->with('status', 'modifications enregistrées avec succès');
            } else {
                // Le nom existe déjà dans la table users, afficher une erreur
                return back()->withErrors(['name' => 'Ce nom existe déjà dans le système.']);
            }
        } else {
            // Pour un utilisateur normal, on met à jour ses informations sans toucher aux entreprises
            $infos->name = $request->input('name');
            $infos->contact = $request->input('contact');
            $infos->email = $request->input('email');
            $infos->residence = $request->input('residence');
            $infos->password = bcrypt($request->input('password'));

            if ($request->hasFile('image_changee')) {
                if ($infos->profil) {
                    $oldImagePath = public_path('assets/images/' . $infos->profil);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $uploadedFile = $request->file('image_changee');
                $userImage = time() . '.' . $uploadedFile->getClientOriginalExtension();
                $uploadedFile->move(public_path('/assets/images'), $userImage);

                $infos->profil = $userImage;
            }

            $infos->save();
            return back()->with('status', 'modifications enregistrées avec succès');
        }
    }


    public function deconnexion(){
        $user = Auth::user();
        $user->is_connected= 0;
        $user->save();

        Auth::logout();

        return redirect('/connexion');
    }

}
