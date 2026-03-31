<?php

namespace App\Http\Controllers;

use App\Http\Requests\Credentials;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class authController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // User::create([
        //     'name' => 'Jonathan kabongo',
        //     'email' => 'jnthnkabongo@gmail.com',
        //     'role_id' => 1,
        //     'password' => Hash::make('1234567'),

        // ]);
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function soimission_login(Credentials $request){
        $credentials = $request->validated();
        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard')->with('success', 'Connexion réussie');
        }
        return redirect()->back()->with('error', 'Identifiants invalides');
    }

    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
