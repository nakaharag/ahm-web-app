<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        ///$users = User::all();
       $users = User::with('company')->get();
       // $users = $this->user->with('salutation')->all();
        return response()->json(
            [
                'status' => 'success',
                'users' => $users->toArray()
            ], 200);
    }

    public function show(Request $request, $id)
    {
        $user = User::find($id);
        return response()->json(
            [
                'status' => 'success',
                'user' => $user->toArray()
            ], 200);
    }

    public function delete(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if($user)
            $user->delete();
        else
            return response()->json(error);
        return response()->json(null); 
    }
    public function find(Request $request, $email)
    {
        $user = User::where('email', $email)->first();

        return response()->json(
            [
                'status' => 'success',
                'user' => $user->toArray()
            ], 200);
    }
}
