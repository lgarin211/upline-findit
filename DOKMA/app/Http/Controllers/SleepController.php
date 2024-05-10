<?php

namespace App\Http\Controllers;

use App\Models\SleepSchedule;
use App\Models\Bpase;
use App\Models\SleepTrack;
use App\Models\Ush;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class SleepController extends Controller
{
    public function sleepTrack(Request $request){
        // Validasi input
        // $request->validate([
        //     'start_time' => 'required|date_format:H:i',
        //     'end_time' => 'required|date_format:H:i|after:start_time',
        // ]);

        // Simpan data tidur baru ke dalam database
        // DB::create([
        //     'user_id' => session('user_id'), // Anda dapat mengganti ini dengan cara yang sesuai untuk mendapatkan ID pengguna
        //     'start_time' => $request->input('start_time'),
        //     'end_time' => $request->input('end_time'),
        // ]);
        $sleepku=SleepTrack::WHERE('ushid',session('user_id'))->get();
        foreach ($sleepku as $key => $sleep) {
            $mulai = Carbon::parse($sleep->start);
            $wakeup = Carbon::parse($sleep->wake);
            // $durasi = $mulai->diffInHours($wakeup);
            $durasi = ($mulai->diffInHours($wakeup)<=0)?24+$mulai->diffInHours($wakeup):$mulai->diffInHours($wakeup);
            // Redirect atau tampilkan pesan

            // dump($durasi);
        }
        return view('Componen.TambahDataTidur');
    }

    // addsleepTrack
    public function addsleepTrack(Request $request) {
        $newdata=[
            'ushid' => session('user_id'), // Anda dapat mengganti ini dengan cara yang sesuai untuk mendapatkan ID pengguna
            'start' => $request->input('mulai'),
            'wake' => $request->input('wakeup'),
            'tanggal' => Carbon::now(),
            'esensi'=>"-",
            'deskpoin'=>"-"
        ];
        $nw=SleepTrack::create($newdata);
        // dd($nw);
        return redirect()->route('tambah_data_tidur');
    }
}
