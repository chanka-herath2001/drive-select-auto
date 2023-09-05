<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.index', [
            'users' => \App\Models\User::orderBy('id', 'DESC')->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.form', [
            'user' => new \App\Models\User()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:255',
            'role_id' => 'required'
        ]);

        \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'password' => Hash::make($request->password)
        ]);

        return redirect()
            ->route('user.index')
            ->with('success', 'User has been created!');
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
        // $user = \App\Models\User::findOrFail($id);

        return view('admin.user.form', [
            'user' => \App\Models\User::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role_id' => 'required'
        ]);

        $user = \App\Models\User::findOrFail($id);

        $user->update($request->all());

        return redirect()
            ->route('user.index')
            ->with('success', 'User has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = \App\Models\User::findOrFail($id);

        $user->delete();

        return redirect()
            ->route('user.index')
            ->with('success', 'User has been deleted!');
    }
}
