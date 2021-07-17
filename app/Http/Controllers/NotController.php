<?php

namespace App\Http\Controllers;
use App\Models\Not;

use Illuminate\Http\Request;

class NotController extends Controller
{
    public function index(){
        $notlar = Not::orderby('ogrenci_no')->get()
                        ->map(function($not){
                            $not_length = ((int)($not['yazili_1'] != '')) + ((int)($not['yazili_2'] != '')) + ((int)($not['yazili_3'] != '')) + ((int)($not['performans_1'] != '')) + ((int)($not['performans_2'] != '')) + ((int)($not['proje'] != ''));
                            $not_sum = $not['yazili_1'] + $not['yazili_2'] + $not['yazili_3'] + $not['performans_1'] + $not['performans_2'] + $not['proje']; 
                            if(($not_length!=0))
                            {
                                $not_avarage = $not_sum / $not_length;
                                $not_avarage = round($not_avarage, 2); 
                            }
                            else
                            {
                                $not_avarage = 'Ortalama';
                            }
                            return [
                                'yazili_1' => $not['yazili_1'],
                                'yazili_2' => $not['yazili_2'],
                                'yazili_3' => $not['yazili_3'],
                                'performans_1' => $not['performans_1'],
                                'performans_2' => $not['performans_2'],
                                'proje' => $not['proje'],
                                'ogrenci_isim' => $not->ogrenci['isim'], 
                                'ogrenci_soyisim' => $not->ogrenci['soyisim'],
                                'ogrenci_no' => $not['ogrenci_no'],
                                'ortalama'  => $not_avarage  
                            ];  
                        });    
        return response()->json($notlar);
    }

    public function update(Request $request){
        Not::where('ogrenci_no', $request->ogrenci_no)
        ->update([
            'yazili_1' => $request->yazili_1, 
            'yazili_2' => $request->yazili_2, 
            'yazili_3' => $request->yazili_3, 
            'performans_1' => $request->performans_1, 
            'performans_2' => $request->performans_2, 
            'proje' => $request->proje
        ]);
        return response()->json("Kayıt Tamamlandı!");
    }
}
