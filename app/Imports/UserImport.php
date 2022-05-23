<?php

namespace App\Imports;

use App\Models\UserLogin;
use App\Models\UserDetails;
use Maatwebsite\Excel\Concerns\ToModel;
use Hash;

class UserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // return new UserLogin([
        //     'username'     => $row[1]??'',
        //     'email'    => $row[2]??'',
        //     'password' => Hash::make($row[2])??'',
        // ]);
        $user = new UserLogin;
        $user->username = $row[1]??'';
        $user->email = $row[2]??'';
        $user->password =  encrypt('pass');
        if ($user->save()) {
            $userDetail = new UserDetails;
            $userDetail->user_id = $user->id ?? '';
            $userDetail->address = $row[3]??'';
            $userDetail->city = $row[4]??'';
            $userDetail->country = $row[5]??'';;
            $userDetail->save();
        }
        return $user;
    }
}
