<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    public function dashboard(){
        return view('pages.dashboard');
    }

    public function liste_utilisateurs(){
        return view('pages.liste-utilisateurs');
    }
    
    public function liste_archives(){
        return view('pages.liste-archives');
    }

    public function liste_documents(){
        return view('pages.liste-documents');
    }

    public function liste_services(){
        return view('pages.liste-services');
    }

    public function liste_roles(){
        return view('pages.liste-roles');
    }

    public function liste_categories(){
        return view('pages.liste-categories');
    }

    public function parametres(){
        return view('pages.parametres');
    }

    public function statistiques(){
        return view('pages.statistiques');
    }

    public function historique(){
        return view('pages.historiques');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
