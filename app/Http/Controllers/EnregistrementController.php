<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EnregistrementController extends Controller
{
    /**
     * Affiche le formulaire d'enregistrement
     *
     * @return View
     */
    public function create()
    {
        return view('auth.enregistrement.create');
    }

    /**
     * Traite l'enregistrement
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        // Valider
        $valides = $request->validate([
            "prenom" => "required",
            "nom" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8",
            "avatar" => "nullable|mimes:png,jpg,jpeg",
            "confirmation_password" => "required|same:password"
        ], [
            "prenom.required" => "Le prénom est requis",
            "nom.required" => "Le nom est requis",
            "email.required" => "Le courriel est requis",
            "email.email" => "Le courriel doit avoir un format valide",
            "email.unique" => "Ce courriel ne peut pas être utilisé",
            "avatar.mimes" => "L'avatar doit avoir une des extensions suivantes: PNG, JPG, JPEG",
            "password.required" => "Le mot de passe est requis",
            "password.min" => "Le mot de passe doit avoir une longueur de :min caractères",
            "confirmation_password.required" => "La confirmation du mot de passe est requise",
            "confirmation_password.same" => "Le mot de passe n'a pu être confirmé"
        ]);

        // Sauvegarder
        $user = new User();
        $user->prenom = $valides["prenom"];
        $user->nom = $valides["nom"];
        $user->email = $valides["email"];
        $user->password = Hash::make($valides["password"]);

        // Traiter le téléversement
        if ($request->hasFile('avatar')) {
            // Déplacer
            Storage::putFile("public/uploads", $request->avatar);
            // Sauvegarder le "bon" chemin qui sera inséré dans la BDD et utilisé par le navigateur
            $user->avatar = "/storage/uploads/" . $request->avatar->hashName();
        }

        $user->save();

        // Connecter l'utilisateur tout de suite
        Auth::login($user);

        // Rediriger
        return redirect()
            ->route('messages.index')
            ->with('succes', 'Votre compte a été créé');
    }
}
