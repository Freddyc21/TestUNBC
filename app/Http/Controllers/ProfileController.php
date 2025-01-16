<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function dashboard(): View
    {
        $users = User::all();
        return view('profile.dashboard', compact('users'));
    }


    public function editar($id)
    {
        $user = User::findOrFail($id);
        return view('profile.editar', compact('user')); 
    
    }

    public function editpost(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->Nombre = $request->Nombre;
        $user->Apellido = $request->Apellido;
        $user->Nrodetelefono = $request->Nrodetelefono;
        $user->Correo = $request->Correo;
        $user->save();
        return Redirect::route('profile.dashboard')->with('status', 'profile-updated');

    
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete(); 
        return Redirect::route('profile.dashboard');
    }
}
