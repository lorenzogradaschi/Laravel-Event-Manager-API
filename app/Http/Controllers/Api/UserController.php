<?php

namespace App\Http\Controllers\Api;

use http\Client\Curl\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')->get();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request): RedirectResponse
    {
        //first I take the resource as input
        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $password = bcrypt($request->input('password')); // Encrypt the password
        $dateOfBirth = $request->input('dateOfBirth');

        //then I pass them as object and I create it with the directive Model::create as array
        //associative array in laravel

        $user = User::create([
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
            'password' => $password,
            'date_of_birth' => $dateOfBirth,
        ]);

        return redirect('/users');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //I look from the table users with the specified id and i assign it to a variable
        $user = DB::table('users')->where('id', $id)->first();
        if ($user) {
            //I return the User with the id found if found
            return response()->json($user);
        }
        // I respond not found if he doesnt exists
        return response()->json(['message' => 'User not found'], 404);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //I create a user object, I am looking to find the id of it
        $user = User::find($id);
        if ($user) {
            //If It's found I take the input of the new attributes
            $user->update($request->only(['name', 'surname', 'email', 'password', 'dateOfBirth']));
            return redirect('/users');
        }
        return redirect('/users')->withErrors(['message' => 'User not found']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['message' => 'User deleted successfully']);
        }
        return response()->json(['message' => 'User not found'], 404);
    }
}
