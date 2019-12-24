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
                <h1>Kullanıcı Listesi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/')}}/admin">AnaSayfa</a></li>
                    <li class="breadcrumb-item active">Kullanıcılar</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">

                <a class="btn btn-app"  href="{{url('/')}}/admin/kullanici/save">
                    <i class="fas fa-plus"></i> {{__('kullanici_islemleri.yeni_kullanici')}}
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
                        <th style="width: 1%">
                            Id
                        </th>
                        <th style="width: 20%">
                            {{__('kullanici_islemleri.kullanici_resim')}}
                        </th>
                        <th style="width: 20%">
                            {{__('kullanici_islemleri.kullanici_isim')}}
                        </th>
                        <th style="width: 30%">
                            {{__('kullanici_islemleri.kullanici_tel')}}
                        </th>
                        <th>
                            {{__('kullanici_islemleri.kullanici_email')}}
                        </th>
                        <th style="width: 8%" class="text-center">
                            Durum
                        </th>
                        <th style="width: 20%">
                            Düzenle
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                @foreach($kullanicilar as $rs)
                      <tr>
                        <td>
                            {{$rs->kul_id}}
                        </td>
                        <td>
                            <a>
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="{{url('/')}}/assets/admin/dist/img/avatar.png">
                                </li>
                            </a>
                            <br>
                            <small>
                                {{$rs->kul_resim}}
                            </small>
                        </td>
                        <td>
                            {{$rs->kul_isim}}
                        </td>
                        <td>
                            {{$rs->kul_tel}}
                        </td>
                        <td>
                            {{$rs->kul_email}}
                        </td>
                        <td>
                            {{$rs->kul_aktif}}
                        </td>
{{--                        <td>--}}
{{--                            <ul class="list-inline">--}}

{{--                                <li class="list-inline-item">--}}
{{--                                    <img alt="Avatar" class="table-avatar" src="{{url('/')}}/assets/admin/dist/img/avatar2.png">--}}
{{--                                </li>--}}
{{--                                <li class="list-inline-item">--}}
{{--                                    <img alt="Avatar" class="table-avatar" src="{{url('/')}}/assets/admin/dist/img/avatar3.png">--}}
{{--                                </li>--}}
{{--                                <li class="list-inline-item">--}}
{{--                                    <img alt="Avatar" class="table-avatar" src="{{url('/')}}/assets/admin/dist/img/avatar04.png">--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </td>--}}
{{--                        <td class="project_progress">--}}
{{--                            <div class="progress progress-sm">--}}
{{--                                <div class="progress-bar bg-green" role="progressbar" aria-volumenow="57" aria-volumemin="0" aria-volumemax="100" style="width: 57%">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <small>--}}
{{--                                57% Complete--}}
{{--                            </small>--}}
{{--                        </td>--}}
{{--                        <td class="project-state">--}}
{{--                            <span class="badge badge-success">Success</span>--}}
{{--                        </td>--}}
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" href="{{url('/')}}/admin/kullanici/show/{{$rs->kul_id}}">
                                <i class="fas fa-folder">
                                </i>
                                Detay
                            </a>
                            <a class="btn btn-info btn-sm" href="{{url('/')}}/admin/kullanici/edit/{{$rs->kul_id}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Duzenle
                            </a>
                            <a class="btn btn-danger btn-sm" href="{{url('/')}}/admin/kullanici/delete/{{$rs->kul_id}}">
                                <i class="fas fa-trash">
                                </i>
                                Sil
                            </a>
                        </td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
@endsection
