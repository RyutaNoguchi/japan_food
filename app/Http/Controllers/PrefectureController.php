<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prefecture;
use Illuminate\Support\Facades\DB;
use Storage;

class PrefectureController extends Controller
{
    public function index(Prefecture $prefecture){
        
        $prefectures = DB::table('prefectures')->select('code', 'name', 'color', 'hoverColor')->get();
        return view("index", ['prefectures' => $prefectures]);
    }
    
    public function store(Request $request)
    {
        $result = $request['prefecture'];
        $prefecture = DB::table('prefectures')->where('id',$result['id'])->update([
            'menu' => $result['menu'],
            'color' => '#FFC107'
        ]);
        return redirect('/');

        //s3アップロード開始
        $image = $request->file('image');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->put('/', $image, 'public');
        // アップロードした画像のフルパスを取得
        $prefecture->path = Storage::disk('s3')->url($path);
        //
        $prefecture->save();
        return redirect('/');
    }
}
