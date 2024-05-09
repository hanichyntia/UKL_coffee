<?php

namespace App\Http\Controllers;
use App\Models\coffee;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Response;

class CoffeeController extends Controller
{
    public function add(Request $request){
        $request->validate([
            'name'=>'required',
            'size'=>'required',
            'price'=>'required',
            'image'=>'required',
        ]);
        
        $coffee = coffee::create([
            'name'=>$request->get('name'),
            'size'=>$request->get('size'),
            'price'=>$request->get('price'),
            'image'=>$request->get('image'),
            
        ]);

        if ($coffee) {
 
            $latestCoffee = coffee::latest()->first();
            return response()->json(['status'=>true, 'message'=>'Menu ditambahkan', 'data' => $latestCoffee]);
        } else {
            return response()->json(['status'=>false, 'message'=>'Menu tidak bisa ditambahkan']);
        }
    }

    //Coffee
    public function coffee(){
        $dt_coffee = coffee::get();
        return response()->json($dt_coffee);
    }

    //update
    public function update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'size'=>'required',
            'price'=>'required',
            'image'=>'required',
        ]);

        $ubah = coffee::where('id', $id)->update([
            'name'=>$request->get('name'),
            'size'=>$request->get('size'),
            'price'=>$request->get('price'),
            'image'=>$request->get('image'),
        ]);

        if ($ubah) {
            $latestUpdate = coffee::latest()->first();
            return response()->json(['status'=>true, 'messege'=>'sukses mengubah menu', 'data'=>$latestUpdate]);
        } else {
            return response()->json(['status'=>false, 'messege'=>'gagal mengubah menu']);
        }
    }

    public function delete($id){
        $coffeeToDelete = coffee::find($id);
        $hapus = $coffeeToDelete->delete();
        
        if ($hapus) {
            return response()->json(['status'=>true, 'messege' => 'Berhasil menghapus menu', 'data'=>$coffeeToDelete]);
        } else {
            return response()->json(['status'=>false, 'messege' => 'Gagal menghapus menu']);
        }
    }

    public function coffeeId($id){
        $dt = coffee::where('id', $id)->first();
        return response()->json([
            Response()->json($dt)
        ]);
    } 
}