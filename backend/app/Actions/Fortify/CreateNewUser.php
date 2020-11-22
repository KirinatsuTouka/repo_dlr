<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        // 入力された値をコード値に変換
        // switch ($input['access_auth']){
        //     case "User":
        //         $auth_code = "0";
        //     break;
        //     case "Manager":
        //         $auth_code = "1";
        //     break;
        //     case "Admin":
        //         $auth_code = "9";
        //     break;
        // }

        return User::create([
            'name' => $input['name'],
            //'email' => $input['email'],
            'email' => "xxx@zzz.com",
            'password' => Hash::make($input['password']),
            'access_auth' => "0",
        ]);
    }
}
