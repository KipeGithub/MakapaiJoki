<?php

namespace App\Http\Controllers;

use App\Models\maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //
        // Get disk C total space and free space
        $diskCTotalSpace = disk_total_space('C:');
        $diskCFreeSpace = disk_free_space('C:');

        // Get disk D total space and free space
        $diskDTotalSpace = disk_total_space('D:');
        $diskDFreeSpace = disk_free_space('D:');

         // Calculate disk C usage percentage
         $diskCUsagePercent = ($diskCTotalSpace - $diskCFreeSpace) / $diskCTotalSpace * 100;

         // Calculate disk D usage percentage
         $diskDUsagePercent = ($diskDTotalSpace - $diskDFreeSpace) / $diskDTotalSpace * 100;

        return view('maintenance.index', compact('diskCUsagePercent', 'diskDUsagePercent'));
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
     * @param  \App\Models\maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(maintenance $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(maintenance $maintenance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, maintenance $maintenance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(maintenance $maintenance)
    {
        //
    }
}
