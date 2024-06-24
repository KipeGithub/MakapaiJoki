<?php

namespace App\Http\Controllers;

use App\Models\Outbox;
use Illuminate\Http\Request;
use App\Models\ATSmessage;
use App\Models\FPL;
use App\Models\Meteo;
use App\Models\Notam;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class OutboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();

        $atsMessages = DB::table('a_t_smessages')
            ->join('users', 'a_t_smessages.from_user_id', '=', 'users.id')
            ->select('a_t_smessages.id', 'users.username as from_username', 'a_t_smessages.filling_time', 'a_t_smessages.updated_at', DB::raw('"ATS" as type'))
            ->where('a_t_smessages.from_user_id', $userId);

        $fplMessages = DB::table('f_p_l_s')
            ->join('users', 'f_p_l_s.from_user_id', '=', 'users.id')
            ->select('f_p_l_s.id', 'users.username as from_username', 'f_p_l_s.filling_time', 'f_p_l_s.updated_at', DB::raw('"FPL" as type'))
            ->where('f_p_l_s.from_user_id', $userId);

        $metarMessages = DB::table('meteos')
            ->join('users', 'meteos.from_user_id', '=', 'users.id')
            ->select('meteos.id', 'users.username as from_username', 'meteos.filling_time', 'meteos.updated_at', DB::raw('"METAR" as type'))
            ->where('meteos.from_user_id', $userId);

        $notamMessages = DB::table('notams')
            ->join('users', 'notams.from_user_id', '=', 'users.id')
            ->select('notams.id', 'users.username as from_username', 'notams.filling_time', 'notams.updated_at', DB::raw('"NOTAM" as type'))
            ->where('notams.from_user_id', $userId);

        $allMessages = $atsMessages
            ->union($fplMessages)
            ->union($metarMessages)
            ->union($notamMessages)
            ->orderBy('filling_time', 'desc')
            ->get();

        return view('outbox.index', ['messages' => $allMessages]);
    }

    public function showAts($id)
    {
        $message = ATSmessage::with(['fromUser', 'toUser'])->find($id);
        // $message = DB::table('notams')->find($id);

        if (!$message) {
            return redirect('/outbox')->with('error', 'Message not found');
        }
    
        // Debugging
        // dd($message);
        
        return view('inbox.show_ats', ['message' => $message]);

        
    }

    public function showFpl($id)
    {
        $message = FPL::with(['fromUser', 'toUser'])->find($id);

        if (!$message) {
            return redirect('/outbox')->with('error', 'Message not found');
        }
    
        // Debugging
        // dd($message);

        return view('inbox.show_fpl', ['message' => $message]);
    }

    public function showMetar($id)
    {
        $message = Meteo::with(['fromUser', 'toUser'])->find($id);
        // $message = DB::table('notams')->find($id);

        if (!$message) {
            return redirect('/outbox')->with('error', 'Message not found');
        }
    
        // Debugging
        // dd($message);
        
        return view('inbox.show_metar', ['message' => $message]);
    }

    public function showNotam($id)
    {
        $message = Notam::with(['fromUser', 'toUser'])->find($id);
        // $message = DB::table('notams')->find($id);

        if (!$message) {
            return redirect('/outbox')->with('error', 'Message not found');
        }
    
        // Debugging
        // dd($message);
        
        return view('inbox.show_notam', ['message' => $message]);
    }

    public function deleteMessage($type, $id)
    {
        switch ($type) {
            case 'ATS':
                DB::table('a_t_smessages')->delete($id);
                break;
            case 'FPL':
                DB::table('f_p_l_')->delete($id);
                break;
            case 'METAR':
                DB::table('meteos')->delete($id);
                break;
            case 'NOTAM':
                DB::table('notams')->delete($id);
                break;
        }
        return redirect('/outbox')->with('success', 'Message deleted successfully');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outbox  $outbox
     * @return \Illuminate\Http\Response
     */
    public function show(Outbox $outbox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outbox  $outbox
     * @return \Illuminate\Http\Response
     */
    public function edit(Outbox $outbox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outbox  $outbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outbox $outbox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outbox  $outbox
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outbox $outbox)
    {
        //
    }
}
