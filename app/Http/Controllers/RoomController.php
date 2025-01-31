<?php

namespace App\Http\Controllers;

use App\Models\Booking;


class RoomController extends Controller
{
    public function index()
    {
        // ดึงข้อมูลการจองพร้อมข้อมูลของลูกค้า, ห้อง, และประเภทห้อง
        $bookings = Booking::with(['customer', 'room.roomType'])
            ->get()
            ->map(function ($booking) {
                return [
                    'customer_name' => $booking->customer->name,
                    'customer_phone' => $booking->customer->phone,
                    'room_status' => $booking->room->status,
                    'room_number' => $booking->room->room_number,
                    'room_type' => $booking->room->roomType->type_name,
                    'check_in_date' => $booking->check_in_date,
                    'check_out_date' => $booking->check_out_date,
                ];
            });

        return inertia('Rooms/Index', ['bookings' => $bookings]); // ส่งข้อมูลไปยัง React
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
