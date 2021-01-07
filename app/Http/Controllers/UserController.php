<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function __construct()

    {
        $this -> middleware('auth');
    }
    public function index()
    {
        $data['user'] = DB::table('users')->paginate(config('app.row'));
        return view('back.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('back.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data['name'] = $request->name;
        $data['username'] = $request->username;
        $data['email'] = $request->username;
        $data['role'] = $request->role;
        $data['password'] = bcrypt($request->password);
        if($request->photo)
        {
            $data['photo'] = $request->file('photo')
            ->store('uploads/users','custom');
        }


         $i = DB::table('users')->insert($data);
         if($i)
         {
             return redirect()->route('user.index')->with('success','Data has been saved!');
         }
         else
        {
             return redirect()->route('user.create')->with('error','Fail to save Data!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data['user'] = DB::table('users')->find($id);
       return view('back.user.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_token','_method','photo','password');
        if($request->photo)
        {
            $data['photo'] = $request->file('photo')->store('uploads/users','custom');
        }
        if($request->password)
        {
            $data['password'] = bcrypt($request->password);
        }
        $i = DB::table('users')->where('id',$id)->update($data);
        if($i)
        {
            return redirect()->route('user.index')->with('success','Data has been updated!');
        }
        else
        {
            return redirect()->route('user.edit',$id)->with('error','Fail to update data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $i = DB::table('users')->where('id',$id)->delete();

        if($i)
        {
            return redirect()->route('user.index')->with('success','Data has been removed!');
        }
        else
        {
            return redirect()->route('user.index')->with('error','Fail to remove data!');
        }
    }
    public function reset($id)
    {
      $data['user'] = DB::table('users')->find($id);
      return view('back.user.reset',$data);
    }
    public function reset_save(Request $request)
    {

        if($request->password !== $request->confirmpassword)
        {
            return back()->with('error','Invalid password or confirm password');
        }
        $i = DB::table('users')->update(['password'=>bcrypt($request->password)]);
       if($i)
       {
             Auth::logout();
           return redirect('/admin');

       }

    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

}
