@extends('layouts.admin.amaster')

@section('title', 'Yönetici İşlemleri Sayfası')
@section('keywords', 'yonetici islemleri')
@section('description', 'Sadece Yöneticiler Girebilir.')

@section('ustbar')
    @include('admin.topbar_admin')
@endsection

{{--@section('yanmenu')--}}
{{--@include('layouts.admin.sidebar_admin')--}}
{{--@endsection--}}

@section('content')
@include('admin.content_admin')
@endsection
