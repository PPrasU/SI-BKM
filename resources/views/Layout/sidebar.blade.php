<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('img/Logo BKM nobg.png') }}" alt="Logo SI-BKM Tanjungrejo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SI-BKM Tanjungrejo</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
    
                {{-- Sidebar Beranda --}}
                <li class="nav-item">
                    <a href="/home" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p style="font-size: 14px">Beranda</p>
                    </a>
                </li>
    
                <li class="nav-header">Utama</li>

                <li class="nav-item {{ Request::is('Admin/Pinjam*') || Request::is('Admin/Simpan*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('Admin/Pinjam*') || Request::is('Admin/Simpan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-credit-card"></i>
                        <p style="font-size: 14px">Simpan Pinjam<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/Admin/Simpan"
                            class="nav-link {{ 
                                Request::is('Admin/Simpan') || 
                                Request::is('Admin/Simpan/Input-Data') || 
                                Request::is('Admin/Simpan/Edit-Data/*') ? 'active' : '' 
                            }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p style="font-size: 14px">Daftar Simpan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Admin/Pinjam"
                            class="nav-link {{ 
                                Request::is('Admin/Pinjam') || 
                                Request::is('Admin/Pinjam/Input-Data') || 
                                Request::is('Admin/Pinjam/Edit-Data/*') ? 'active' : '' 
                            }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p style="font-size: 14px">Daftar Peminjam</p>
                            </a>
                        </li>
                    </ul>
                </li>
    
                <li class="nav-header">Lainnya</li>
    
                {{-- Sidebar Aspirasi --}}
                <li class="nav-item">
                    <a href="/Admin/Aspirasi-Rembuk-Warga" 
                        class="nav-link {{ 
                            Request::is('Admin/Aspirasi-Rembuk-Warga') || 
                            Request::is('Admin/Aspirasi-Rembuk-Warga/Input-Data') || 
                            Request::is('Admin/Aspirasi-Rembuk-Warga/Edit-Data/*') ? 'active' : '' 
                        }}">
                        <i class="nav-icon fas fa-comment"></i>
                        <p style="font-size: 14px">Aspirasi (Rembuk Warga)</p>
                    </a>
                </li>
    
                {{-- Sidebar Pembangunan --}}
                <li class="nav-item {{ Request::is('Admin/Pembangunan*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('Admin/Pembangunan*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p style="font-size: 14px">
                            Pembangunan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/Admin/Pembangunan/Pemkot"
                                class="nav-link {{ 
                                    Request::is('Admin/Pembangunan/Pemkot') || 
                                    Request::is('Admin/Pembangunan/Pemkot/Input-Data') || 
                                    Request::is('Admin/Pembangunan/Pemkot/Edit-Data/*') ? 'active' : '' 
                                }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p style="font-size: 14px">PEMKOT</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Admin/Pembangunan/Pokir"
                                class="nav-link {{ 
                                    Request::is('Admin/Pembangunan/Pokir') || 
                                    Request::is('Admin/Pembangunan/Pokir/Input-Data') || 
                                    Request::is('Admin/Pembangunan/Pokir/Edit-Data/*') ? 'active' : '' 
                                }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p style="font-size: 14px">POKIR</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Admin/Pembangunan/Dinas-Terkait" 
                                class="nav-link {{ 
                                    Request::is('Admin/Pembangunan/Dinas-Terkait') || 
                                    Request::is('Admin/Pembangunan/Dinas-Terkait/Input-Data') || 
                                    Request::is('Admin/Pembangunan/Dinas-Terkait/Edit-Data/*') ? 'active' : '' 
                                }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p style="font-size: 14px">Dinas Terkait</p>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('Admin/Pembangunan/Lembaga-*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ Request::is('Admin/Pembangunan/Lembaga-*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p style="font-size: 14px">Lembaga <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/Admin/Pembangunan/Lembaga-Negeri" 
                                        class="nav-link {{ 
                                            Request::is('Admin/Pembangunan/Lembaga-Negeri') || 
                                            Request::is('Admin/Pembangunan/Lembaga-Negeri/Input-Data') || 
                                            Request::is('Admin/Pembangunan/Lembaga-Negeri/Edit-Data/*') ? 'active' : '' 
                                        }}">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p style="font-size: 14px">Lembaga Negeri</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/Admin/Pembangunan/Lembaga-Swasta"
                                        class="nav-link {{ 
                                            Request::is('Admin/Pembangunan/Lembaga-Swasta') || 
                                            Request::is('Admin/Pembangunan/Lembaga-Swasta/Input-Data') || 
                                            Request::is('Admin/Pembangunan/Lembaga-Swasta/Edit-Data/*') ? 'active' : '' 
                                        }}">
                                        <i class="nav-icon fas fa-circle"></i>
                                        <p style="font-size: 14px">Lembaga Swasta</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
    
                {{-- Sidebar Abdimas --}}
                <li class="nav-item">
                    <a href="/Admin/Abdimas-Fisik-NonFisik"
                        class="nav-link {{ 
                            Request::is('Admin/Abdimas-Fisik-NonFisik') || 
                            Request::is('Admin/Abdimas-Fisik-NonFisik/Input-Data') || 
                            Request::is('Admin/Abdimas-Fisik-NonFisik/Edit-Data/*') ? 'active' : '' 
                        }}">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p style="font-size: 14px">Abdimas Fisik dan Non Fisik</p>
                    </a>
                </li>
    
                {{-- Sidebar Perawatan --}}
                <li class="nav-item">
                    <a href="/Admin/Perawatan" 
                        class="nav-link {{ 
                            Request::is('Admin/Perawatan') || 
                            Request::is('Admin/Perawatan/Input-Data') || 
                            Request::is('Admin/Perawatan/Edit-Data/*') ? 'active' : '' 
                        }}">
                        <i class="nav-icon fas fa-medkit"></i>
                        <p style="font-size: 14px">Perawatan</p>
                    </a>
                </li>
    
                {{-- Sidebar Penguatan SDM --}}
                <li class="nav-item">
                    <a href="/Admin/Penguatan-SDM" 
                    class="nav-link {{ 
                        Request::is('Admin/Penguatan-SDM') || 
                        Request::is('Admin/Penguatan-SDM/Input-Data') || 
                        Request::is('Admin/Penguatan-SDM/Edit-Data/*') ? 'active' : '' 
                    }}">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p style="font-size: 14px">Penguatan SDM</p>
                    </a>
                </li>
    
                {{-- Sidebar Penguatan UMKM --}}
                <li class="nav-item">
                    <a href="/Admin/Penguatan-UMKM"
                    class="nav-link {{ 
                        Request::is('Admin/Penguatan-UMKM') || 
                        Request::is('Admin/Penguatan-UMKM/Input-Data') || 
                        Request::is('Admin/Penguatan-UMKM/Edit-Data/*') ? 'active' : '' 
                    }}">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p style="font-size: 14px">Penguatan UMKM</p>
                    </a>
                </li>
    
                {{-- Sidebar Abdimas LPPM --}}
                <li class="nav-item">
                    <a href="/Admin/Abdimas-LPPM"
                    class="nav-link {{ 
                        Request::is('Admin/Abdimas-LPPM') || 
                        Request::is('Admin/Abdimas-LPPM/Input-Data') || 
                        Request::is('Admin/Abdimas-LPPM/Edit-Data/*') ? 'active' : '' 
                    }}">
                        <i class="nav-icon fas fa-university"></i>
                        <p style="font-size: 14px">Abdimas LPPM</p>
                    </a>
                </li>
    
                {{-- Sidebar MOU --}}
                <li class="nav-item {{ Request::is('Admin/MOU*') || Request::is('Admin/MOU-Kampus') || Request::is('Admin/MOU-Negeri') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('Admin/MOU*') || Request::is('Admin/MOU-Kampus') || Request::is('Admin/MOU-Negeri') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comments"></i>
                        <p style="font-size: 14px">MOU<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/Admin/MOU/Daftar-LPPM-Kampus"
                            class="nav-link {{ 
                                Request::is('Admin/MOU/Daftar-LPPM-Kampus') || 
                                Request::is('Admin/MOU/Daftar-LPPM-Kampus/Input-Data') || 
                                Request::is('Admin/MOU/Daftar-LPPM-Kampus/Edit-Data/*') ? 'active' : '' 
                            }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p style="font-size: 14px">Daftar LPPM Tersedia</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Admin/MOU-Negeri"
                            class="nav-link {{ 
                                Request::is('Admin/MOU-Negeri') || 
                                Request::is('Admin/MOU-Negeri/Input-Data') || 
                                Request::is('Admin/MOU-Negeri/Edit-Data/*') ? 'active' : '' 
                            }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p style="font-size: 14px">MOU Dengan Negeri</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/Admin/MOU-Kampus" 
                            class="nav-link {{ 
                                Request::is('Admin/MOU-Kampus') || 
                                Request::is('Admin/MOU-Kampus/Input-Data') || 
                                Request::is('Admin/MOU-Kampus/Edit-Data/*') ? 'active' : '' 
                            }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p style="font-size: 14px">MOU Dengan Kampus</p>
                            </a>
                        </li>
                    </ul>
                </li>
    
                {{-- Sidebar Wisata / Studi Banding --}}
                <li class="nav-item">
                    <a href="/Admin/Wisata" 
                    class="nav-link {{ 
                        Request::is('Admin/Wisata') || 
                        Request::is('Admin/Wisata/Input-Data') || 
                        Request::is('Admin/Wisata/Edit-Data/*') ? 'active' : '' 
                    }}">
                        <i class="nav-icon fas fa-suitcase"></i>
                        <p style="font-size: 14px">Wisata / Studi Banding</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>

    <div class="sidebar-custom">
        <a class="btn btn-secondary hide-on-collapse pos-right" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
    <!-- /.sidebar -->
</aside>
