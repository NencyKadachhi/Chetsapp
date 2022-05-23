<?php

namespace App\Exports;

use App\Models\UserLogin;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


class USerExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $users =  UserLogin::with('UserDetail')->get();
        return view('user_export', [
            'users' => $users
        ]);
    }
}
