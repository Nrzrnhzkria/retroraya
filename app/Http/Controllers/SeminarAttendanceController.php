<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SeminarQR;
use App\Models\SeminarAttendance;

class SeminarAttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function attendance()
    {
        $seminars = SeminarQR::orderBy('seminar_date', 'desc')->paginate(15);

        return view('admin.seminars.attendance.view', compact('seminars'));
    }
    
    public function view($seminar_id)
    {
        $seminar = SeminarQR::where('id', $seminar_id)->first();
        $attendance = SeminarAttendance::where('seminar_id', $seminar_id)->paginate(15);
        $totalattendance = SeminarAttendance::where('seminar_id', $seminar_id)->count();
        $participants = User::orderBy('id', 'desc')->get();
        $count = 1;

        return view('admin.seminars.attendance.participant', compact('seminar', 'attendance', 'totalattendance', 'participants', 'count'));
    }
    
}
