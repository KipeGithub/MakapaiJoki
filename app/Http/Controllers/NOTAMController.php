<?php

namespace App\Http\Controllers;

use App\Models\NOTAM;
use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NOTAMController extends Controller
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
        $locations = Location::all();
        return view('notam.index', compact('users', 'locations'));
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
            'from' => 'required',
            'to' => 'required',
            'filling_time' => 'required',
            'priority' => 'required',
            'message_series_0' => 'required',
            'message_series_1' => 'required',
            'number_0' => 'required',
            'number_1' => 'required',
            'number_2' => 'required',
            'number_3' => 'required',
            'identified' => 'required',
            'fir' => 'required',
            'notam_code_0' => 'required',
            'notam_code_1' => 'required',
            'traffic' => 'required',
            'purpose' => 'required',
            'scope' => 'required',
            'lower_limit' => 'required',
            'upper_limit' => 'required',
            'coordinates' => 'required',
            'location_0' => 'required',
            'location_1' => 'nullable',
            'location_2' => 'nullable',
            'location_3' => 'nullable',
            'fYYMMDDhhmm' => 'required',
            'estperm' => 'required|integer',
            'time_schedule' => 'required',
            'text_of_notam' => 'required',
            'file' => 'nullable|file',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public');
        }

        foreach ($toUserIds as $toUserId) {
            NOTAM::create([
                'from_user_id' => Auth::id(),
                'to_user_id' => $toUserId,
                'filling_time' => now(),
                'priority' => $request->input('priority'),
                'free_text_ats' => $request->input('free_text_ats'),
                'file_path' => $filePath,
                'from' => $request->input('from'),
                'to' => $request->input('to'),
                'message_series_0' => $request->input('message_series_0'),
                'message_series_1' => $request->input('message_series_1'),
                'number_0' => $request->input('number_0'),
                'number_1' => $request->input('number_1'),
                'number_2' => $request->input('number_2'),
                'number_3' => $request->input('number_3'),
                'identified' => $request->input('identified'),
                'fir' => $request->input('fir'),
                'notam_code_0' => $request->input('notam_code_0'),
                'notam_code_1' => $request->input('notam_code_1'),
                'traffic' => $request->input('traffic'),
                'purpose' => $request->input('purpose'),
                'scope' => $request->input('scope'),
                'lower_limit' => $request->input('lower_limit'),
                'upper_limit' => $request->input('upper_limit'),
                'coordinates' => $request->input('coordinates'),
                'location_0' => $request->input('location_0'),
                'location_1' => $request->input('location_1'),
                'location_2' => $request->input('location_2'),
                'location_3' => $request->input('location_3'),
                'fYYMMDDhhmm' => $request->input('fYYMMDDhhmm'),
                'estperm' => $request->input('estperm'),
                'time_schedule' => $request->input('time_schedule'),
                'text_of_notam' => $request->input('text_of_notam')
            ]);
        }

        return redirect()->back()->with('success', 'Pesan NOTAM berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NOTAM  $nOTAM
     * @return \Illuminate\Http\Response
     */
    public function show(NOTAM $nOTAM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NOTAM  $nOTAM
     * @return \Illuminate\Http\Response
     */
    public function edit(NOTAM $nOTAM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NOTAM  $nOTAM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NOTAM $nOTAM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NOTAM  $nOTAM
     * @return \Illuminate\Http\Response
     */
    public function destroy(NOTAM $nOTAM)
    {
        //
    }
}
