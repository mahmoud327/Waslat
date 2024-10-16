<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::whereType(1)->latest()->get();
        return view('admins.index', compact('admins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|min:6', // Ensure password confirmation
        ]);
        $request['type']=1;
        $admin = User::create($request->all());
        $admin->assignRole($request['roles']);

        return back()->with('message', __('lang.data_saved'));
    }
    public function destroy($id)
    {
        $admin = User::findOrFail($id)->delete();
        return back()->with('message', __('lang.data_deleted'));
    }
    public function update(Request $request, $id)
    {

        $admin = User::findOrFail($id);    $request->validate([
            'name' => 'required|unique:users,name,'.$admin->id,
            'email' => 'required|email|unique:users,email,'.$admin->id,
            'phone' => 'required|unique:users,phone,'.$admin->id,
        ]);
        $admin = User::findOrFail($id);
        $admin->assignRole($request['roles']);

        $admin->update($request->all());

        return back()->with('message', __('lang.data_saved'));
    }

}
