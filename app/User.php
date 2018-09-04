<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;



class User extends Model
{
    public static function login(Request $request)
    {
        // Check username
        $user = self::where([
            ['username', '=', $request->input('username')],
            ])->firstOrFail();
            // Check password
            if(Hash::check($request->input('password'), $user->password)) {

                // Create random token for the connected user
                $user->token = str_random(30);

                // Generate expiration date for token
                $user->token_expiration = Carbon::now()->addHour();
                $user->save();

                // Return token for future use
                return response()->json(['status' => 'success', 'content' => [
                    'token' => $user->token,
                ]]);;
            }

            return 'error';
    }
}
