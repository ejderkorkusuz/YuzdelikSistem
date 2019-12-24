@extends('layouts.admin.amaster')
@section('title', 'Kullanıcı Ekleme Sayfası')
@section('keywords','')
@section('ustbar')
    @include('admin.topbar_admin')
@endsection
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>İş Ekleme Formu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}/admin">AnaSayfa</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/')}}/admin/isler">İşler</a></li>
                        <li class="breadcrumb-item active">Kullanıcı Ekle</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <form role="form" method="post" enctype="multipart/form-data" action="{{url('/')}}/admin/isler/save">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Patronlar</label>
                <select class="form-control select2 select2-hidden-accessible" id="patronlarAcilir" name="pat_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
                    <option value="" data-select2-id="53">Patron Seçiniz</option>
                    @foreach($pat_isim as $anahtar =>$deger )
                    <option value="{{$anahtar}}" data-select2-id="53">{{$deger}}</option>
                    @endforeach
                </select>
            </div>
            <?php
//            echo json_encode($urun_isim);
            echo "<script> var urun_adlari= ". json_encode($urun_isim) . ";\n   var secilenIndex; </script>";
            ?>
            <div class="form-group">
                <label >Ürünler</label>
                <select id="urun_secimi" class="form-control select2 select2-hidden-accessible" name="urun_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" required>
{{--                    @foreach($urun_isim as $anahtar =>$deger )--}}
{{--                        <option value="{{$anahtar}}" data-select2-id="53">{{$deger}}</option>--}}
{{--                    @endforeach--}}

{{--                    @foreach($urun_isim[0] as $anahtar )--}}
                        <option id="option" value="" data-select2-id="53"></option>
{{--                    @endforeach--}}
                </select>
            </div>
            <div class="form-group">
                <label>Müşteriler</label>
                <select class="form-control select2 select2-hidden-accessible" name="mus_id" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    @foreach($mus_isim as $anahtar =>$deger )
                        <option value="{{$anahtar}}" data-select2-id="53">{{$deger}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                                <label> İş Tutarı:  </label><label id="is_tutari"></label>
                <input type="number" class="form-control" name="is_tutari" id="is_tutar" placeholder="İş Tutarı (TL)" required>
            </div>

            <div class="form-group">
                                <label>Komisyon Oranı:  </label><label id="komisyon_orani"></label>
                <input type="number" id="komisyon_oran" class="form-control" name="is_kom_orani" placeholder="Komisyon Oranı (%)">
            </div>

            <div class="form-group">
                                <label >Komisyon Tutarı:  </label><label id="komisyon_tutari"></label>
                <input type="number" class="form-control" id="komisyon_tutar" name="is_kom_tutari" placeholder="Komisyon Tutarı (TL)">
            </div>
            <div class="form-group">
                <label >Demo Bilgileri:  </label><label id="demo_bilgileri"></label>
                <input type="text" class="form-control" id="demo_bilgiler" name="is_demo_bilgileri" placeholder="Demo Bilgileri">
            </div>
{{--            <div class="form-group">--}}
{{--                <textarea class="textarea" id="demo_bilgiler" name="is_demo_bilgileri" placeholder="İş ile ilgilei açıklamaları buraya yazabilirsiniz..."--}}
{{--                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px;"></textarea>--}}
{{--            </div>--}}
            <div class="form-group">
                <textarea class="textarea" name="is_aciklama" placeholder="İş ile ilgilei açıklamaları buraya yazabilirsiniz..."
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px;"></textarea>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">KAYDET</button>
        </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#patronlarAcilir').change(function(){
                //Selected value
                secilenIndex = $(this).val();
                // var inputValue = $(this).val();
                // document.getElementById('urun_id').innerHTML = inputValue;
                // alert(secilenIndex);
                var sel = document.getElementById('urun_secimi');
               sel.options.length = 0;
                    // var urun_isimler = ["Chinese","Indian","Turkiye"];
                    // var urun_adlari =["emlak", "veri", "dizi"];
                    <?php
//                    echo "<script>document.writeln(secilenIndex)</script>";
//                    use Illuminate\Support\Facades\DB;
//                    $patID= "document.writeln(secilenIndex);";
////                    $profile_viewer_uid = $_COOKIE['profile_viewer_uid'];
//                    $yeni = new \App\Http\Controllers\admin\IsController();
//                    $yeni->is_olustur_form();
/*
                    $gelecekler=array();
                    $gelenIdler=array();
                    $urunler = DB::select("SELECT urun_id, urun_isim FROM urunlers WHERE patron_id =?", [1]);
                    for ($a=0; $a<count($urunler); $a++){
                        array_push($gelecekler, $urunler[$a]->urun_isim);
                        array_push($gelenIdler, $urunler[$a]->urun_id);
                        }
                    $js_array = json_encode($gelecekler);
                    $js_arrayID = json_encode($gelenIdler);
                    echo "var urun_isimler = ". $js_array . ";\n";
                    echo "var urun_idler = ". $js_arrayID . ";\n";
*/
                    ?>
                {{--var urun_isimler = json_encode({{$urun_isim[1]->urun_isim}});--}}
{{--                --}}{{--document.write({{$urun_isim[1][0]->urun_isim}});--}}
                    var opt = document.createElement('option');
                    opt.innerHTML ="Ürün Seçiniz";
                    opt.value = "";
                sel.appendChild(opt);
                for(var i = 0; i < urun_adlari[secilenIndex].length; i++) {
                    var opt = document.createElement('option');
                    opt.innerHTML =urun_adlari[secilenIndex][i].urun_isim;
                    opt.value = urun_adlari[secilenIndex][i].urun_id;
                    sel.appendChild(opt);
                }
            });
            $('#urun_secimi').change(function() {
                //Selected value
                var secilenUrunId = $(this).val();
                var sira =$("select[id='urun_secimi'] option:selected").index();

                // document.getElementById('is_tutari').innerHTML ="merhaba";
                document.getElementById("is_tutar").value=urun_adlari[secilenIndex][(sira-1)].urun_fiyat;
                document.getElementById("komisyon_oran").value=urun_adlari[secilenIndex][(sira-1)].urun_kom_oran;
                document.getElementById("komisyon_tutar").value=urun_adlari[secilenIndex][(sira-1)].urun_kom_oran*urun_adlari[secilenIndex][(sira-1)].urun_fiyat/100;
                document.getElementById("demo_bilgiler").value=urun_adlari[secilenIndex][(sira-1)].urun_demo_bilgiler;
                // document.getElementById("komisyon_tutari").innerHTML=urun_adlari[secilenIndex][(sira-1)].urun_kom_oran*urun_adlari[secilenIndex][(sira-1)].urun_fiyat/100;
                // alert(sira);
                // var sel = document.getElementById('is_tutari');

            });
        });
    </script>

@endsection
