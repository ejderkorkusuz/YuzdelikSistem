<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class MusteriController extends Controller
{
    public function musteriler()
    {
        $kullanicilar = DB::select('SELECT * FROM musterilers WHERE  kul_aktif = ?', [1]);
        App::setLocale('tr');
        return view('admin.musteri_listesi', ['kullanicilar' => $kullanicilar]);
    }
    public function musteri_olustur_form(){
        $ayarlar = DB::select('SELECT kullanici_ekleme_formu FROM ayarlars WHERE sirket_id = ?', [1]);
        $cozulmus=json_decode($ayarlar[0]->kullanici_ekleme_formu);

        return view('admin.musteri_ekleme_formu',['ayarlar' => $cozulmus]);
    }
    public function musteri_olustur_vt(Request $request){
        $komisyoncuID=3;
       $musteriEkle= DB::table('musterilers')->insert([
            [   'kul_isim' => $request->kul_isim,
                'kul_adi' => $request->kul_adi,
                'kul_sifre' => $request->kul_sifre,
                'kul_resim' => $request->kul_resim,
                'kul_turu' => $request->kul_turu,
                'kul_email' => $request->kul_email,
                'kul_tel' => $request->kul_tel,
                'ekleyen_id'=>$komisyoncuID
            ]
        ]);
//        $eklenenMusteriID = DB::table('musterilers')->insertGetId(
//            [ 'kul_id' => 'kul_id' ]
//        );
        $eklenenMusteriID= DB::select("SELECT kul_id FROM musterilers  WHERE ekleyen_id=? ORDER BY kul_id DESC LIMIT  1", [$komisyoncuID]);
        $eklenecekMusID=$eklenenMusteriID[0]->kul_id;
        $eklenecekMusID2="-".$eklenecekMusID;
//        print_r($eklenecekMusID);
       if (1>0) {
//           DB::table ('komisyonculars')
//               ->where('kul_id', $komisyoncuID)
//               ->update(['kul_musteriler' => IF('kul_musteriler'='',$eklenecekMusID, CONCAT(kul_musteriler, $eklenecekMusID2))]);
           DB::update('UPDATE komisyonculars SET kul_musteriler=IF(kul_musteriler="",?, CONCAT(kul_musteriler,?)) WHERE kul_id=?', [$eklenecekMusID,  $eklenecekMusID2, $komisyoncuID]);
            }
        return redirect('admin/musteriler')->with('success', 'Müşteri Başarıyla Kaydedildi.');
    }
}
