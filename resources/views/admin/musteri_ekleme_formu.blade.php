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
                    <h1>Müşteri Ekleme</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}/admin">AnaSayfa</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/')}}/admin/kullanicilar">Kullanıcılar</a></li>
                        <li class="breadcrumb-item active">Müşteri Ekle</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <form role="form" method="post" enctype="multipart/form-data" action="{{url('/')}}/admin/musteri/save">
        @csrf
        <div class="card-body">
            <div class="form-group"  >
{{--                <label >Adı Soyadı</label>--}}
                <input type="text" id="kul_isim" class="form-control" name="kul_isim" placeholder="Adı Soyadı" required>
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
                {{--                <label type="hidden" >Kullanıcı Tel</label>--}}
                <input type="text" class="form-control" name="mus_is_tutar" placeholder="İş Tutarı (TL)">
            </div>
            <div class="form-group">
                <label>Üye Türü</label>
                <select class="form-control select2 select2-hidden-accessible" name="kul_turu" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option selected="selected" data-select2-id="3" value="kmsc">Komisyoncu</option>
                    <option data-select2-id="53" value="yntc">Yönetici</option>
                    <option data-select2-id="54" value="mstr">Müşteri</option>
                </select>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">KAYDET</button>
        </div>
    </form>
@endsection
