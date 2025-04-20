<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        // Set validation
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'name' => 'required',
            'password' => 'required|min:5|confirmed',
            'level_id' => 'required',
            'profile_picture' => 'required|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        // If validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = $file->hashName();
            $file->move(public_path('uploads/profile'), $filename);
            $profilePicturePath = 'uploads/profile/' . $filename;
        } else {
            $profilePicturePath = null;
        }

        try {
            $user = UserModel::create([
                'username' => $request->username,
                'name' => $request->name,
                'password' => bcrypt($request->password),
                'level_id' => $request->level_id,
                'profile_picture' => $profilePicturePath,
            ]);

            return response()->json([
                'success' => true,
                'user' => $user,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
