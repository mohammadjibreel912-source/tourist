<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    // عرض صفحة المستخدمين
    public function index()
    {
        $users = User::all();
        return view('admim.users.index', compact('users'));
    }

    // صفحة إنشاء مستخدم جديد
    public function create()
    {
        return view('admim.users.create');
    }

    // حفظ المستخدم الجديد
  public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'role' => 'required|in:user,admin',
        'password' => 'required|string|min:6|confirmed',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role, // added role
        'password' => bcrypt($request->password),
    ]);

    return redirect()->route('admin.users.index')
        ->with('success', 'User created successfully.');
}

}
