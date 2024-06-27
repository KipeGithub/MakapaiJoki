<?php

namespace App\Http\Controllers;

use App\Models\meteo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MeteoController extends Controller
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
        return view('meteo.index', compact('users'));
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
            'filling_time' => 'required',
            'message_id_part1' => 'required',
            'message_id_part2' => 'required',
            'message_id_part3' => 'required',
            'origin' => 'required',
            'issued' => 'required',
            'type' => 'required',
            'location' => 'required',
            'observed' => 'required',
            'free_text_metar' => 'required',
            'file' => 'nullable|file',
            'filled_by' => 'required',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public');
        }

        foreach ($toUserIds as $toUserId) {
            Meteo::create([
                'from_user_id' => Auth::id(),
                'to_user_id' => $toUserId,
                'filling_time' => now(),
                'priority' => $request->input('priority'),
                'message_id_part1' => $request->input('message_id_part1'),
                'message_id_part2' => $request->input('message_id_part2'),
                'message_id_part3' => $request->input('message_id_part3'),
                'origin' => $request->input('origin'),
                'issued' => $request->input('issued'),
                'type' => $request->input('type'),
                'location' => $request->input('location'),
                'observed' => $request->input('observed'),
                'free_text_metar' => $request->input('free_text_metar'),
                'file' => $filePath,
                'filled_by' => $request->input('filled_by'),
            ]);
        }

        return redirect()->back()->with('success', 'Pesan Free Text METAR (AS) berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\meteo  $meteo
     * @return \Illuminate\Http\Response
     */
    public function show(meteo $meteo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\meteo  $meteo
     * @return \Illuminate\Http\Response
     */
    public function edit(meteo $meteo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\meteo  $meteo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, meteo $meteo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\meteo  $meteo
     * @return \Illuminate\Http\Response
     */
    public function destroy(meteo $meteo)
    {
        //
    }
}
