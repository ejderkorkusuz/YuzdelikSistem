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
                    <h1>Kullanıcı Ekleme</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}/admin">AnaSayfa</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/')}}/admin/kullanicilar">Kullanıcılar</a></li>
                        <li class="breadcrumb-item active">Kullanıcı Ekle</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <form role="form" method="post" enctype="multipart/form-data" action="{{url('/')}}/admin/kullanici/newuser">
        @csrf
        <div class="card-body">
            <div class="form-group"  >
{{--                <label >Adı Soyadı</label>--}}
                <input type="text" id="kul_isim" class="form-control" name="kul_isim" placeholder="Ad Soyad" required>
            </div>
            <div class="form-group">
{{--                <label >Kullanıcı Adı</label>--}}
                <input type="text" id="kul_adi" class="form-control" name="kul_adi" placeholder="Kullanıcı Adı" required>
            </div>
            <div class="form-group">
{{--                <label> Şifre</label>--}}
                <input type="password" class="form-control" name="kul_sifre"  placeholder="Şifre" required>
            </div>
            <div class="form-group">
{{--                <label>{{$ayarlar->kul_email}}</label>--}}
                <input type="{{$ayarlar->kul_email}}" id="kul_email" class="form-control" name="kul_email" placeholder="E Mail">
            </div>

            <div class="form-group">
{{--                <label type="hidden" >Kullanıcı Tel</label>--}}
                <input type="{{$ayarlar->kul_tel}}" class="form-control" name="kul_tel" placeholder="Telefon No">
            </div>

            <div class="form-group">
                <label>{{__('kullanici_islemleri.kul_turu_txt')}}</label>
                <select class="form-control select2 select2-hidden-accessible" name="kul_turu" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option value="yntc" selected="selected" data-select2-id="52">{{__('kullanici_islemleri.yonetici_txt')}}</option>
                    <option value="kmsc" data-select2-id="53">{{__('kullanici_islemleri.komisyoncu_txt')}}</option>
                    <option value="mstr" data-select2-id="54">{{__('kullanici_islemleri.musteri_txt')}}</option>
                </select>
            </div>

            <div class="form-group">
{{--                <label for="exampleInputFile">Dosya Girdisi</label>--}}
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="kul_resim">
                        <label class="custom-file-label" for="exampleInputFile">Profil Resmi Seç</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" id="">Yükle</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">KAYDET</button>
        </div>
    </form>
@endsection
