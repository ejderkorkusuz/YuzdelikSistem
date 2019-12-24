<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Object_;

class UserController extends Controller
{
    //
    public function uyeler()
    {
        $kullanicilar = DB::select('SELECT * FROM yoneticilers WHERE kul_aktif = ?', [1]);
//        echo "<prep>";
//echo json_encode($kullanicilar, JSON_UNESCAPED_UNICODE);
//        echo "</prep>";
//die();
        App::setLocale('tr');
//        App::setLocale('en');
        return view('admin.kullanici_listesi', ['kullanicilar' => $kullanicilar]);
//        return view('admin.kullanici_listesi');
    }
    public function uye_duzenle($id){
        echo "uye duzenleme";
    }
    public function uye_sil($id){
        echo "uye Sil ".$id;

    }
    public  function uye_detay($id){
        $pathToFile= public_path()."/userfiles/info.pdf";

        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; '.'info.pdf',
        ];
        return response()->file($pathToFile);

//        return Response::download($pathToFile, 'filename.pdf', $headers);

//    echo "uye detay ".$id;
        /*
        $ayarlar = DB::select('SELECT kullanici_ekleme_formu FROM ayarlars WHERE sirket_id = ?', [1]);
        $cozulmus=json_decode($ayarlar[0]->kullanici_ekleme_formu);
        return response()->json($ayarlar);
        return response()->json(['name' => 'Abigail', 'state' => 'CA']);
        */
    }
    public function uye_olustur_form(){
        $ayarlar = DB::select('SELECT kullanici_ekleme_formu FROM ayarlars WHERE sirket_id = ?', [1]);
        $cozulmus=json_decode($ayarlar[0]->kullanici_ekleme_formu);
        App::setLocale('tr');
        return view('admin.kullanici_ekleme_formu',['ayarlar' => $cozulmus]);
    }
    public function uye_olustur_vt(Request $request){
        if ($request->hasFile('kul_resim')){
            $file = $request -> file('kul_resim');
            $name = $file -> getClientOriginalName();
            $file -> move(public_path().'/userfiles/'.$name);
        }
//        DB::insert('INSERT INTO kullanicilars (kul_isim, kul_adi, kul_sifre, kul_turu, kul_email )  VALUES (?,?,?,?,?)', [,, $request->kul_sifre, $request->kul_turu, $request->kul_email]);

        DB::table('yoneticilers')->insert([
            [   'kul_isim' => $request->kul_isim,
                'kul_adi' => $request->kul_adi,
                'kul_sifre' => $request->kul_sifre,
                'kul_resim' => $request->kul_resim,
                'kul_turu' => $request->kul_turu,
                'kul_email' => $request->kul_email,
                'kul_tel' => $request->kul_tel
                ]
        ]);
        return redirect('admin/kullanicilar')->with('success', 'Kullanıcı Başarıyla Kaydedildi.');
    }
    public function uye_guncelle($id){
        echo "uye guncelle  ".$id;
    }
}
