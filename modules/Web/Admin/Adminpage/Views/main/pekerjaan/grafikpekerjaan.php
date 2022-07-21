<?php $this->extend('Admin\Template\Views\master\master_admin') ?>

<?= $this->section('main') ?>
        <div id="dashboard" class="content-wrapper" meta-id="0">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Grafik Pekerjaan Di Kota Palu</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Pekerjaan</a></li>
                                <li class="breadcrumb-item active">Grafik Pekerjaan</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
            	<div class="container-fluid">
            		<div class="row">
            			  <div class="col-12">
                                <!-- interactive chart -->
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="far fa-chart-bar"></i>
                                            Grafik Pencarian Pokok di Kota Palu (Grafik)
                                        </h3>
                                        <div class="card-tools">
                                            Grafik Bar
                                           
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="bar-chart" style="height: 600px;"></div>
                                    </div>
                                    <!-- /.card-body-->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

            		</div>
            	</div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

		
		
<?= $this->endsection('main') ?>