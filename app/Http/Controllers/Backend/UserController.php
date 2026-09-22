<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['users'] = User::all();
        return view('admin.user.view', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique:users',
            'password' => 'required',
            'user_type' => 'required',
        ]);

        User::create($request->all());

        $notification = [
            'message' => 'User created successfully',
            'alert-type' => 'success',
        ];
        return redirect()->route('user.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.user.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'user_type' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($validatedData);

        $notification = [
            'message' => 'User updated successfully',
            'alert-type' => 'info',
        ];
        return redirect()->route('user.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
        $notification = [
            'message' => 'User deleted successfully',
            'alert-type' => 'error',
        ];
        return redirect()->route('user.index')->with($notification);
    }
}
