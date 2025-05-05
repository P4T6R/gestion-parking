<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VehicleOut; // Assurez-vous que ce modèle existe et est correctement importé.
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('admins.create');
    }

    public function index()
    {
        $users = User::all();
        $title = "Liste des utilisateurs";

        // Vous devez définir $someId ou ajuster la logique pour obtenir les données de vehicleOut.
        // $vehicleOut = VehicleOut::with('vehicleIn.vehicle')->find($someId);

        // Retirez la ligne de retour redondante et assurez-vous que la variable $vehicleOut est correctement définie si vous l'utilisez.
        return view('admins.table', compact('users', 'title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Hash the password before saving
        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès!!'); // Assurez-vous que la route est 'users.index' et non 'user.index'.
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admins.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admins.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            // Ajoutez une règle de validation pour le mot de passe s'il est présent.
            'password' => 'sometimes|min:6',
        ]);

        // Update the password only if it's provided
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        }

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès!!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès!!');
    }

    
}