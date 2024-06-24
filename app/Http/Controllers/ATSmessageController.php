<?php

namespace App\Http\Controllers;

use App\Models\ATSmessage;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ATSmessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::where('id', '!=', Auth::id())->get();
        return view('atsmessage.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $request->validate([
            'to_user_id' => 'required|exists:users,id',
            'priority' => 'required',
            'free_text_ats' => 'required',
            'file' => 'nullable|file',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public');
        }

        ATSmessage::create([
            'from_user_id' => Auth::id(),
            'to_user_id' => $request->input('to_user_id'),
            'filling_time' => now(),
            'priority' => $request->input('priority'),
            'free_text_ats' => $request->input('free_text_ats'),
            'file_path' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Pesan Free Text ATS berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ATSmessage  $aTSmessage
     * @return \Illuminate\Http\Response
     */
    public function show(ATSmessage $aTSmessage)
    {
        //
        return view ('ATSmessage.show', compact('usermgt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ATSmessage  $aTSmessage
     * @return \Illuminate\Http\Response
     */
    public function edit(ATSmessage $aTSmessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ATSmessage  $aTSmessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ATSmessage $aTSmessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ATSmessage  $aTSmessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ATSmessage $aTSmessage)
    {
        //
    }
}
