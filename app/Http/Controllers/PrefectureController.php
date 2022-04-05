<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prefecture;
use Illuminate\Support\Facades\DB;

class PrefectureController extends Controller
{   //色#FFC107
    public function index(Prefecture $prefecture){
        
        $prefectures = DB::table('prefectures')->select('code', 'name', 'color', 'hoverColor')->get();
        return view("index", ['prefectures' => $prefectures]);
    }
}
