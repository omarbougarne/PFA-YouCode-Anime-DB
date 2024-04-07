<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
{
    $users = User::withTrashed()->get();
    return view('admin.dashboard', compact('users'));
}
    public function delete($id)
{
    $user = User::find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'User not found.');
    }

    $user->delete();


    $users = User::all();


    return view('admin.dashboard', compact('users'));
}
public function restore($id)
{
    $user = User::withTrashed()->find($id);

    if (!$user) {
        return redirect()->back()->with('error', 'User not found.');
    }

    $user->restore();
    return redirect()->back()->with('success', 'User restored successfully.');
}

}
