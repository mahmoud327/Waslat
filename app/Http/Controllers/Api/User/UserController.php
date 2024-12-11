<?php
namespace App\Http\Controllers\Api\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{

    public function profileInfo()
    {
        $user = Auth::user();
        return responseSuccess(new UserResource($user));
    }
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:users,name,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:255|unique:users,phone,' . $user->id,
            'acount_type' => 'nullable|integer',
            'city_id' => 'nullable|integer',
            'state_id' => 'nullable|integer',
            'password' => 'nullable|string|min:6|confirmed',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Profile image validation
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'account_type' => $request->account_type,
            'city_id' => $request->city_id,
            'state_id' => $request->state_id,
        ]);
        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
            $user->save();
        }
        if ($request->hasFile('profile_image')) {
            // Delete old profile image if it exists
            if ($user->hasMedia('profile')) {
                $user->getFirstMedia('profile')->delete();
            }
            $user->addMediaFromRequest('profile_image')->toMediaCollection('profile');
        }
        return  responseSuccess(UserResource::make($user));
    }


}
