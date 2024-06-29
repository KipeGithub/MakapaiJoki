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
        if (in_array('all', $request->to_user_id)) {
            $toUserIds = User::pluck('id')->toArray();
        } else {
            $toUserIds = $request->to_user_id;
        }

        $request->merge(['to_user_id' => $toUserIds]);
        $request->validate([
            'to_user_id' => 'required|array',
            'to_user_id.*' => 'exists:users,id',
            'priority' => 'required',
            'free_text_ats' => 'required',
            'file' => 'nullable|file',
            'filld_by' => 'required',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public');
        }

        foreach ($toUserIds as $toUserId) {
            ATSmessage::create([
                'from_user_id' => Auth::id(),
                'to_user_id' => $toUserId,
                'filling_time' => now(),
                'priority' => $request->input('priority'),
                'free_text_ats' => $request->input('free_text_ats'),
                'file_path' => $filePath,
                'filld_by' => $request->input('filled-by-input'),
            ]);
        }

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
        return view('ATSmessage.show', compact('usermgt'));
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
