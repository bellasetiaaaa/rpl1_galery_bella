<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ public function proseslogin(Request $request)
     {
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        $data = $request->only(['username','password']);
        if(Auth::attempt($data)) {
            return redirect('/galery');
        }else{
            return redirect('/');
        }
     }
    public function saveRegister(Request $request)
    {
        $data = $request->validate(
            [
                'username'=>'required',
                'name'=>'required',
                'email'=>'required',
                'password'=>'required',
            ]
        );
        $simpan =[
            'username'=>$data['username'],
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>bcrypt($data['password'])
        ];
        $data = User::create($simpan);
        return redirect('/');
        
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function logout()
    {
        Auth::logout('/logout');
        session()->flush();
        return redirect('/');
    }
}
