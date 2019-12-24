{{--@section('yanmenu')--}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{url('/')}}/admin/" class="brand-link">
            <img src="{{url('/')}}/assets/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">AnaSayfa</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{url('/')}}/assets/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Isim Gelecek</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Müşteri İşlemleri
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('/')}}/admin/musteriler" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Müşterileri Görüntüle</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/')}}/admin/musteri/newclient" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Müşteri Ekle</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/')}}/admin/kullanicilar" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kullanıcıları Görüntüle</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/')}}/admin/isler" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>İşler</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/')}}/admin/isler/newbusiness" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>İş Ekle</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="pages/widgets.html" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Ayarlar
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/widgets.html" class="nav-link">
                            <i class="nav-icon far fa-comments"></i>
                            <p>
                                Mesajlar
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Charts
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="pages/charts/chartjs.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ChartJS</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/charts/flot.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Flot</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/charts/inline.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Inline</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
</aside>
{{--@endsection--}}

