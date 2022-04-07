<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prefecture;
use Illuminate\Support\Facades\DB;
use Storage;

class PrefectureController extends Controller
{   //色#FFC107
    public function index(Prefecture $prefecture){
        
        $prefectures = DB::table('prefectures')->select('code', 'name', 'color', 'hoverColor')->get();
        return view("index", ['prefectures' => $prefectures]);
    }
    
    public function store(Request $request)
    {
        $prefecture = DB::table('prefectures')->where('id',1)->first();

        //s3アップロード開始
        $image = $request->file('image');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->put('/', $image, 'public');
        // アップロードした画像のフルパスを取得
        $prefecture->path = Storage::disk('s3')->url($path);
        dd($prefecture);
    
        $prefecture->save();
        return redirect('/');
    }
}
