<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = 'Admin';
        return view('admin.index',['title'=>$title]);
    }

    public function allPersonnel(){
        $title = 'personnel';
        $dataUser = User::all();
        //dd($dataUser);
        return view('client.index',['title'=>$title, 'dataUser'=>$dataUser]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createPersonnel($id)
    {
        //
        $title = 'add_personnel';
        $dataUser = User::find($id);
        return view('form.admin.form_addUser',['title'=>$title, 'dataUser'=>$dataUser]);
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
        $title = 'personnel';
        $dataUser = User::find($id);

        return view('client.personnel',['title'=>$title, 'dataUser'=>$dataUser]);
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
