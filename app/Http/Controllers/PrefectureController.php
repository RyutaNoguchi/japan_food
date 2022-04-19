<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prefecture;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Storage;

class PrefectureController extends Controller
{
    public function index(){
        
        $prefectures = DB::table('prefectures')->select('code', 'name', 'color', 'hoverColor', 'menu')->get();
        return view("index", ['prefectures' => $prefectures]);
    }
    
    public function show(Prefecture $prefecture){
        
        if ($prefecture->color == "'#FFC107'"){
            $prefecture = null;
            $images = null;
        } else {
           $images = $prefecture->images; 
        }
        $prefectures = DB::table('prefectures')->select('code', 'name', 'color', 'hoverColor', 'menu')->get();
        return view("index", [
            'prefectures' => $prefectures,
            'prefecture' => $prefecture,
            'images' => $images,
        ]);
    }
    
    public function store(Request $request)
    {
        $result = $request['prefecture'];
        $prefecture = DB::table('prefectures')->where('id',$result['id'])->update([
            'menu' => $result['menu'],
            'color' => '#FFC107'
        ]);

        $images = $request->file('image');
        foreach($images as $item){
            $image = new Image();
            $path = Storage::disk('s3')->put('/', $item, 'public');
            $image->path = Storage::disk('s3')->url($path);
            $image->prefecture_id = $result['id'];
            $image->save();
        }
        return redirect('/');
    }
}
