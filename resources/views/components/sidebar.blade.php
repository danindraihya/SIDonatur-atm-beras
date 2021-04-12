<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <i class="fas fa-mosque fa-lg"></i>
        <!-- <img src="{{ asset('img/books.png') }}" class="brand-image" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">SIDonatur - ATM Beras</span>
    </a>
      
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dasbor</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('jenis_donatur.index') }}" class="nav-link {{ Request::is('jenis-donatur') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Jenis Donatur</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('donatur.index') }}" class="nav-link {{ Request::is('donatur') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Donatur</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('donasi_uang.index') }}" class="nav-link {{ Request::is('donasi-uang') ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon fas fa-wallet"></i>
                        <p>Donasi Uang</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('donasi_beras.index') }}" class="nav-link {{ Request::is('donasi-beras') ? 'active' : '' }}" class="nav-link">
                        <i class="nav-icon fas fa-utensils"></i>
                        <p>Donasi Beras</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon far fa-chart-bar"></i>
                        <p>Laporan</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
