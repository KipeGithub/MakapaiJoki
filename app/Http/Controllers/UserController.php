<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // $user= User::query()
        //     ->when(request('search'), function($query){
        //         $query->where('username', 'LIKE', '%' . request('search'). '%')
        //             ->orWhere('email', 'LIKE', '%' . request('search'). '%')
        //             ->orWhere('firstname', 'LIKE', '%' . request('search'). '%')
        //             ->orWhere('lastname', 'LIKE', '%' . request('search'). '%');
        //     })
        //     ->paginate();

        if($request->has('searchUser')){
            $user['user']=User::where('username', 'LIKE', '%' .$request->searchUser.'%')->paginate(5);
        }else{
            $user['user']=User::orderBy('username', 'asc')->paginate(5);
        }
        return view('usermgt.index', $user);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user['user']=User::all();
        return view('usermgt.create', $user);
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
        $request->validate([
            'username' => 'required|unique:users,username|max:255|min:2|',
            'firstname' => 'required|max:255|min:2',
            'lastname' => 'max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|max:255',
            'about'=> 'required|max:255',
            'role' => 'required'
        ]);

        User::create($request->post());
        return redirect()->route('usermgt.index')->with('success','Data user berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return view ('usermgt.show', compact('usermgt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usermgt)
    {
        //
        return view('usermgt.edit', compact('usermgt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $request->validate([
            'firstname' => ['max:100'],
            'lastname' => ['max:100'],
            'address' => ['max:100'],
            'city' => ['max:100'],
            'country' => ['max:100'],
            'postal' => ['max:100'],
            'about' => ['max:255'],
            'role' => ['required']
        ]);
        
        $id = User::find($id);
        $id->fill($request->post())->save();

        return redirect()->route('usermgt.index')->with('success','Data user berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = User::find($id);
        $id->delete();
        return redirect()->route('usermgt.index')->with('success','Data user berhasil dihapus');
    }
}
