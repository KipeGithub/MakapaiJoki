<?php

namespace App\Http\Controllers;

use App\Models\FPL;
use App\Models\User;
use App\Models\flighr_routes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\DateTime;

class FPLController extends Controller
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
        $departureOptions = flighr_routes::distinct('departure_aero')->get(['departure_aero']);
        $destinationOptions = flighr_routes::distinct('destination_aero')->get(['destination_aero']);
        return view('fpl.index', compact('users', 'departureOptions', 'destinationOptions'));
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
            'message_type' => 'required',
            'number' => 'required',
            'reference_data' => 'required',
            'aircraft_id' => 'required',
            'ssr_mode' => 'required',
            'ssr_code' => 'required',
            'flight_rules' => 'required',
            'type_of_flight' => 'required',
            'number_aircraft' => 'required',
            'type_of_aircraft' => 'required',
            'wake_turb_cat' => 'required',
            'equipment_1' => 'required',
            'equipment_2' => 'required',
            'depad' => 'required',
            'time' => 'required',
            'cruising_speed' => 'nullable',
            'level' => 'nullable',
            'route' => 'required',
            'dest_ad' => 'required',
            'total_set_hh_min' => 'required',
            'altn_ad' => 'required',
            'second_altn_ad' => 'required',
            'other_fpl_i' => 'required',
        ]);

        // $filePath = null;
        // if ($request->hasFile('file')) {
        //     $filePath = $request->file('file')->store('uploads', 'public');
        // }

        $timeInput = $request->input('time');
        $dateObj = DateTime::createFromFormat('Y-m-d H:i:s', $timeInput);
        $dateFormatted = $dateObj->format('Y-m-d');

        foreach ($toUserIds as $toUserId) {
            FPL::create([
                'from_user_id' => Auth::id(),
                'to_user_id' => $toUserId,
                'filling_time' => now(),
                'priority' => $request->input('priority'),
                'message_type' => $request->input('message_type'),
                'number' => $request->input('number'),
                'reference_data' => $request->input('reference_data'),
                'aircraft_id' => $request->input('aircraft_id'),
                'ssr_mode' => $request->input('ssr_mode'),
                'ssr_code' => $request->input('ssr_code'),
                'flight_rules' => $request->input('flight_rules'),
                'type_of_flight' => $request->input('type_of_flight'),
                'number_aircraft' => $request->input('number_aircraft'),
                'type_of_aircraft' => $request->input('type_of_aircraft'),
                'wake_turb_cat' => $request->input('wake_turb_cat'),
                'equipment_1' => $request->input('equipment_1'),
                'equipment_2' => $request->input('equipment_2'),
                'depad' => $request->input('depad'),
                'time' => $dateFormatted,
                'cruising_speed' => $request->input('cruising_speed'),
                'level' => $request->input('level'),
                'route' => $request->input('route'),
                'dest_ad' => $request->input('dest_ad'),
                'total_set_hh_min' => $request->input('total_set_hh_min'),
                'altn_ad' => $request->input('altn_ad'),
                'second_altn_ad' => $request->input('second_altn_ad'),
                'other_fpl_i' => $request->input('other_fpl_i'),
            ]);
        }

        return redirect()->back()->with('success', 'Pesan FPL berhasil dikirim!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FPL  $fPL
     * @return \Illuminate\Http\Response
     */
    public function show(FPL $fPL)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FPL  $fPL
     * @return \Illuminate\Http\Response
     */
    public function edit(FPL $fPL)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FPL  $fPL
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FPL $fPL)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FPL  $fPL
     * @return \Illuminate\Http\Response
     */
    public function destroy(FPL $fPL)
    {
        //
    }
}
