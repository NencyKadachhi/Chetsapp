<?php

namespace App\Http\Controllers;

use App\Models\UserLogin;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\UserDetails;
use App\Imports\UserImport;
use Excel;
use App\Exports\USerExport;
use App\Mail\UserMail;
use Illuminate\Support\Facades\Mail;

class UserLoginController extends Controller
{
    public function UserList(Request $request)
    {
        $users = UserLogin::with('UserDetail')->paginate(10);
        return view('user_list', compact('users'));
    }
    public function userCreate()
    {
        return view('user_create');
    }
    public function userStore(UserRequest $request)
    {
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileName = time() . '.' . $extension;
        $filePath = public_path('/user_image/');
        $request->file('image')->move($filePath, $fileName);

        $user = new UserLogin;
        $user->username = $request->username ?? '';
        $user->email = $request->email ?? '';
        $user->password = encrypt($request->password ?? '');
        if ($user->save()) {
            $userDetail = new UserDetails;
            $userDetail->user_id = $user->id ?? '';
            $userDetail->user_image = $fileName ?? '';
            $userDetail->address = $request->address ?? '';
            $userDetail->city = $request->city ?? '';
            $userDetail->country = $request->country ?? '';
            if ($userDetail->save()) {
                return redirect()->route('user-list')->with('success', 'User Created Successfully');
            }
        }
    }
    public function userExport()
    {
        return Excel::download(new USerExport, 'users-collection.csv');
    }
    public function userImport(Request $request)
    {

        $excel = Excel::import(new UserImport, $request->file('file')->store('temp'));
        return redirect()->route('user-list')->with('success', 'Data has been uploaded!');
    }
    public function userStatus(Request $request)
    {
        $userDetails = UserDetails::where('user_id', $request->user)->first();
        if ($userDetails->status == "1") {
            $userDetails = UserDetails::where('user_id', $request->user)->update(['status' => "0"]);
        }
        else{
            $userDetails = UserDetails::where('user_id', $request->user)->update(['status' => "1"]);
        }
        return UserDetails::where('user_id', $request->user)->first();
    }
    public function userMail(Request $request)
    {
        $userDetail =  UserLogin::where('id', $request->user_id)->first();
        Mail::to($userDetail->email)->send(new UserMail());
    }
}
