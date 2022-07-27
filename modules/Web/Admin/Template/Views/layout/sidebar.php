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

                            <li class="nav-item <?php if($menu == "kebun"){ echo "menu-open"; }?>">
                                <a href="#" class="nav-link <?php if($menu == "kebun"){ echo "active"; }?>">
                                    <i class="nav-icon fa fa-leaf" aria-hidden="true"></i>
                                    <p>
                                        Kebun & Pertanian
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo route_to('user.panel.kebun.kebun'); ?>" class="nav-link <?php if($submenu == "kebun"){ echo "active"; }?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Grafik Perkebunan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo route_to('user.panel.tani.tani'); ?>" class="nav-link <?php if($submenu == "tani"){ echo "active"; }?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Grafik Pertanian</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo route_to('user.panel.panganobat.panganobat'); ?>" class="nav-link <?php if($submenu == "panganobat"){ echo "active"; }?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Grafik Tanaman Pangan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo route_to('user.panel.obat.obat'); ?>" class="nav-link <?php if($submenu == "obat"){ echo "active"; }?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Grafik Tanaman Obat</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo route_to('user.panel.hutan.hutan'); ?>" class="nav-link <?php if($submenu == "hutan"){ echo "active"; }?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Grafik Kehutanan</p>
                                        </a>
                                    </li>
                                  
                                </ul>
                            </li>
                            <li class="nav-item <?php if($menu == "peternak"){ echo "menu-open"; }?>">
                                <a href="#" class="nav-link <?php if($menu == "peternak"){ echo "active"; }?>">
                                    <i class="nav-icon fa fa-paw"></i>
                                    <p>
                                        Peternakan
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo route_to('user.panel.peternak.peternak'); ?>" class="nav-link <?php if($submenu == "peternak"){ echo "active"; }?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Grafik Peternakan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo route_to('user.panel.ikan.ikan'); ?>" class="nav-link <?php if($submenu == "ikan"){ echo "active"; }?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Grafik Perikanan</p>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li class="nav-item <?php if($menu == "transportasi"){ echo "menu-open"; }?>">
                                <a href="#" class="nav-link <?php if($menu == "transportasi"){ echo "active"; }?>">
                                    <i class="nav-icon fa fa-list-alt"></i>
                                    <p>
                                        Aset Lainnya
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo route_to('user.panel.transportasi.transportasi'); ?>" class="nav-link <?php if($submenu == "transportasi"){ echo "active"; }?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Aset Transportasi Umum</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo route_to('user.panel.pendidikan.pendidikan'); ?>" class="nav-link <?php if($submenu == "pendidikan"){ echo "active"; }?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Aset Lembaga Pendidkan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo route_to('user.panel.produksi.produksi'); ?>" class="nav-link <?php if($submenu == "produksi"){ echo "active"; }?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Aset Sarana Produksi</p>
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