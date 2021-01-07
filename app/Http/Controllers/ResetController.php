<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ResetController extends Controller
{
    public function password(Request $request)
    {
        if($request->password != $request->password_confirmation)
        {
            return back()->with('error','invalid password or confirm passoword');
        }
        else
        {
            $data = array
        (

            'password'=>bcrypt($request->password)
        );
        $i = DB::table('users')->where('email',$request->email)
        ->update($data);
        if($i)
        {
            return redirect('admin');
        }
        }

    }
}
