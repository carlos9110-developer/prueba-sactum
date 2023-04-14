<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
     
        $user = User::where('email', $request->email)->first();
     
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return "error";
        }
     
        $user->tokens()->delete();
        return $user->createToken($request->email, ['server-update'])->plainTextToken;
    }

    public function prueba(Request $request)
    {

        return "prueba";
    }

    public function prueba2(Request $request)
    {

        return "prueba2";
    }
    
    public function prueba3(Request $request)
    {   

        $date = Carbon::now();

        if ($request->user()->tokenCan('server-update')) {
             DB::table('personal_access_tokens')
                ->where('tokenable_id', $request->user()->id)
                ->update(['created_at' => $date]);
            return $request->user();
        }

        return "no tienen permisos";

       
    }

}
