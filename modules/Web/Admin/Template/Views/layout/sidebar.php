            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="<?php echo route_to('user.panel.dashboard'); ?>" class="brand-link">
                   
                   <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                    <span class="brand-text font-weight-light"> POTENSI SUMBER DAYA</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="dist/img/avatar.png"  />
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">Selamat Datang Admin</a>
                        </div>
                    </div>

                    <!-- SidebarSearch Form -->
                    <div class="form-inline">
                        <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item <?php if($menu == "general"){ echo "menu-open"; }?>">
                                <a href="#" class="nav-link <?php if($menu == "general"){ echo "active"; }?>">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Umum
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo route_to('user.panel.dashboard'); ?>" class="nav-link <?php if($submenu == "overall"){ echo "active"; }?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Keseluruhan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo route_to('user.panel.cari_kk'); ?>" class="nav-link <?php if($submenu == "carikk"){ echo "active"; }?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Pencarian KK</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo route_to('user.panel.insert-data'); ?>" class="nav-link <?php if($submenu == "insert"){ echo "active"; }?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Insert Data</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Kependudukan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Potensi Daerah</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo route_to('user.panel.kobo-collect'); ?>" class="nav-link <?php if($submenu == "kobo-collect"){ echo "active"; }?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data Masuk - Kobo Collect</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>



                            <li class="nav-item <?php if($menu == "health"){ echo "menu-open"; }?>">
                                <a href="#" class="nav-link <?php if($menu == "health"){ echo "active"; }?>">
                                    <i class="nav-icon fa fa-stethoscope" aria-hidden="true"></i>

                                    <p>
                                        Kesehatan
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo route_to('user.panel.dashboard.health'); ?>" class="nav-link <?php if($submenu == "disease"){ echo "active"; }?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Grafik Kesehatan </p>
                                        </a>
                                    </li>

                                                                  
                                </ul>
                            </li>

                          

                              <li class="nav-item <?php if($menu == "pekerjaan"){ echo "menu-open"; }?>">
                                <a href="#" class="nav-link <?php if($menu == "pekerjaan"){ echo "active"; }?>">
                                  <i class="nav-icon fa fa-briefcase"></i>
                                    <p>
                                        Pekerjaan & Rumah
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo route_to('user.panel.pekerjaan.pekerjaan'); ?>" class="nav-link <?php if($submenu == "pekerjaan"){ echo "active"; }?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Grafik Pencarian Pokok</p>
                                        </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a href="<?php echo route_to('user.panel.ekonomi.ekonomi'); ?>" class="nav-link <?php if($submenu == "ekonomi"){ echo "active"; }?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Grafik Modal dan Laba</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo route_to('user.panel.rumah.rumah'); ?>" class="nav-link <?php if($submenu == "rumah"){ echo "active"; }?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Grafik Keadaan Rumah</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-leaf" aria-hidden="true"></i>
                                    <p>
                                        Kebun & Pertanian
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="pages/UI/general.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Umum</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Komoditas Utama</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Perkebunan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Pertanian</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Kehutanan</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-paw"></i>
                                    <p>
                                        Peternakan
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Galian C</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>SDA Yang Bisa Diperbaharui</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>SDA Yang Tidak Bisa Diperbaharui</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fa fa-list-alt"></i>
                                    <p>
                                        Aset Lainnya
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Berbasis Sungai</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Berbasis Pantai</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Berbasis Gunung</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo route_to('logout');?>" class="nav-link">
                                    <i class="nav-icon far fa-circle text-danger"></i>
                                    <p>Logout</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>