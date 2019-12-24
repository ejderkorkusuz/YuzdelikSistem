<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class IsController extends Controller
{
    public function isler()
    {
        $isler = DB::select('SELECT is_id,
yoneticilers.kul_isim as patron_isim,
musterilers.kul_isim as musteri_isim,
urunlers.urun_isim as urun_isim,
is_kabul_tarih, is_teslim_vadesi, is_teslim_tarihi, is_durum,
is_sozlesmesi_musteri, is_sozlesmesi_araci, is_aciklama
FROM islers
JOIN yoneticilers  ON islers.patron_id= yoneticilers.kul_id
JOIN musterilers ON islers.musteri_id= musterilers.kul_id
JOIN urunlers ON islers.urun_id=urunlers.urun_id
WHERE is_durum = ?', [1]);

        App::setLocale('tr');
//        App::setLocale('en');
        return view('admin.is_listesi', compact('isler'));
    }

    public function is_olustur_form(){
        $ayarlar = DB::select('SELECT kullanici_ekleme_formu FROM ayarlars WHERE sirket_id = ?', [1]);
        $cozulmusAyaralar=json_decode($ayarlar[0]->kullanici_ekleme_formu);
        $baglantilar = DB::select('SELECT kul_musteriler, kul_patronlar FROM komisyonculars WHERE kul_id = ?', [3]);
        $pat_idleri[]=explode('-',$baglantilar[0]->kul_patronlar);
        $pat_isim=array();
        $urun_isim=array();
        for ($a=0; $a<count($pat_idleri[0]);$a++) {
            $patronlar = DB::select('SELECT kul_id, kul_isim FROM yoneticilers WHERE kul_id = ?', [$pat_idleri[0][$a]]);
            $pat_isim+=array($patronlar[0]->kul_id=>$patronlar[0]->kul_isim);

            $urun_isim[$patronlar[0]->kul_id] = DB::select('SELECT urun_id, urun_isim, urun_fiyat, urun_kom_oran, urun_demo_bilgiler FROM urunlers WHERE patron_id = ?', [$pat_idleri[0][$a]]);
//            $urun_isim+=array($urunler[0]->urun_id=>$urunler[0]->urun_isim);
        }

        $mus_idleri[]=explode('-',$baglantilar[0]->kul_musteriler);
        $mus_isim=array();
        for ($a=0; $a<count($mus_idleri[0]);$a++) {
            $musteriler = DB::select('SELECT kul_id, kul_isim FROM musterilers WHERE kul_id = ?', [$mus_idleri[0][$a]]);
            $mus_isim+=array($musteriler[0]->kul_id=>$musteriler[0]->kul_isim);
        }
//        $gelecekler=array();
//        $urunler = DB::select('SELECT urun_id, urun_isim FROM urunlers WHERE patron_id = ?', [2]);
//
////                    print_r($urunler);
//        for ($a=0; $a<count($urunler); $a++){
//            array_push($gelecekler, $urunler[$a]->urun_isim);
//
////                     alert(urun_isim);
////                                    print_r($urunler[$a]->urun_isim);
//            //                    } .$urunler[$a]->urun_id.
//        }
//        print_r($gelecekler);
////                    $php_array = array('abc','def','ghi');
//        $js_array = json_encode($gelecekler);
////        echo "var cuisines = ". $js_array . ";\n";
//
//        die();
        App::setLocale('tr');
        return view('admin.is_ekleme_formu',compact( 'cozulmusAyaralar', 'pat_isim', 'mus_isim', 'urun_isim'));
    }

    public function is_olustur_vt(Request $request){
        DB::table('islers')->insert([
            [   'patron_id' => $request->pat_id,
                'musteri_id' => $request->mus_id,
                'urun_id' => $request->urun_id,
                'komisyoncu_id' => 3,
                'is_tutari' => $request->is_tutari,
                'is_komisyon_orani' => $request->is_kom_orani,
                'is_komisyon_tutari' => $request->is_kom_tutari,
                'is_aciklama' => $request->is_aciklama
            ]
        ]);
        return redirect('admin/isler')->with('success', 'İş Başarıyla Kaydedildi.');
    }
    public function sozlesme_yukle_vt(Request $request, $IsId)
    {
        if ($request->hasFile('sozlesme_resim')){
            $files = $request -> file('sozlesme_resim');
            $name = $files -> getClientOriginalName();
//            $uzanti =  explode(".", $name);
//            $uzanti =  end($uzanti);
            $gecerli= request()->validate(['sozlesme_resim' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', ]);

            $imageName = time().'.'.request()->sozlesme_resim->getClientOriginalExtension();
            $uzanti=request()->sozlesme_resim->getClientOriginalExtension();
            if ($gecerli) {
                echo "Resim yüklenebilir";
                echo "Your file is uploaded.". $uzanti;
                    foreach ($files as $file) {
                        $file->store('users/' . $this->user->id . '/messages');
                $affected = DB::table('islers')
                    ->where('is_id', $IsId)
                    ->update(['is_sozlesmesi_musteri' => $request->$name]);
                $files->move(public_path() . '/userfiles/', $name);
                    }
            }
            else {
                echo "Resim formatında degil";
                echo "Invalid File Type. Only pdf files allowed.". $uzanti; die();
            }
        }
        return redirect()->back()->with('success', 'File uploaded successfully.');
    }
    public function sozlesme_yukle_form($is_id){

        return view('admin.sozlesme_yukleme_formu',compact('is_id'));
    }
}
