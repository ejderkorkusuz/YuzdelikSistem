@extends('layouts.admin.amaster')
@section('title','Kullanıcı Listesi')
@section('keywords', 'kullanıcı listesi')
@section('ustbar')
    @include('admin.topbar_admin')
@endsection
@section ('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>İş Listesi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}/admin">AnaSayfa</a></li>
                    <li class="breadcrumb-item active">İşler</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">

                <a class="btn btn-app"  href="{{url('/')}}/admin/isler/newbusiness">
                    <i class="fas fa-plus"></i> Yeni İş
                </a>
{{--                <button  onclick="!window.open('{{url('/')}}/admin/kullanici/save', '_blank', 'toolbar=no,scrollbars=yes,resizable=yes,top=100,left=500,width=10%,height=10%')">Deneme</button>--}}

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th class="text-center">
                           İş Id
                        </th>
                        <th class="text-center">
                            İşi Yapan
                        </th>
                        <th class="text-center">
                           İşi Yapılan
                        </th>
                        <th class="text-center">
                            Yapılan İş
                        </th>
                        <th class="text-center">
                            Sözleşme Tarihi
                        </th>
                        <th class="text-center">
                            İş Vadesi
                        </th>
                        <th class="text-center">
                            Teslim Tarihi
                        </th>
                        <th class="text-center">
                            Durum
                        </th>
                        <th class="text-center">
                            Sözleşme
                        </th>
                        <th class="text-center">
                            Açıklama
                        </th>
                        <th class="text-center">
                            Butonlar
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                @foreach($isler as $rs)
                      <tr>
                        <td>
                            {{$rs->is_id}}
                        </td>
                        <td>
                            <a>
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="{{url('/')}}/assets/admin/dist/img/avatar.png">
                                </li>
                            </a>
                            <br>
                            <small>
                                {{$rs->patron_isim}}
                            </small>
                        </td>
                        <td class="text-center">
                            {{$rs->musteri_isim}}
                        </td>
                          <td class="text-center">
                            {{$rs->urun_isim}}
                        </td>
                        <td class="text-center">
                            {{ date('d.m.Y', strtotime($rs->is_kabul_tarih))}}
                        </td>
                        <td class="text-center">
                            {{$rs->is_teslim_vadesi}}
                        </td>
                        <td class="text-center">
                            {{$rs->is_teslim_tarihi}}
                        </td>
                        <td class="text-center">
                            {{$rs->is_durum}}
                        </td>
                        <td>
                            {{$rs->is_sozlesmesi_musteri}}
                        </td>
                        <td>
                            {{$rs->is_aciklama}}
                        </td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" onclick="window.open('../userfiles/info.pdf')" >
{{--                                href="{{url('/')}}/admin/kullanici/show/{{$rs->is_id}}--}}
                                <i class="fas fa-folder">
                                </i>
                                Detay
                            </a>
                            <a class="btn btn-info btn-sm" href="{{url('/')}}/admin/kullanici/edit/{{$rs->is_id}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Duzenle
                            </a>
                            <a class="btn btn-info btn-sm" onclick="return !window.open('{{url('/')}}/admin/isler/uploadagreement/{{$rs->is_id}}', 'Sözleşme Yükle', 'width=500,height=500', 'top=100,left=200')" >
                                <i class="fas fa-file-alt">
                                </i>
                                Sözleşme Yükle
                            </a>
                            <a class="btn btn-danger btn-sm" >
                                <i class="fas fa-trash">
                                </i>
                                Sil
                            </a>
                        </td>
                    </tr>
                @endforeach
                    </tbody>
{{--                    <tbody>--}}
{{--                    <tr>--}}
{{--                        <td>--}}
{{--                            <embed src="../userfiles/info.pdf" width="1000" height="800" frameborder="0" allowfullscreen>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    </tbody>--}}
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
@endsection
