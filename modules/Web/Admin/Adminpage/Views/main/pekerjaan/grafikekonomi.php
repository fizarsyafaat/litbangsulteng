<?php $this->extend('Admin\Template\Views\master\master_admin') ?>

<?= $this->section('main') ?>
        <div id="dashboard" class="content-wrapper" meta-id="0">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Grafik Modal Dan Laba Masyarakat Kota Palu</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Modal & Laba</a></li>
                                <li class="breadcrumb-item active">Grafik</li>
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
            			<div class="col-sm-6">
			                <div class="container-fluid">
			                	<div class="row">
			                        <div class="col-md-12">
			                            <!-- Bar chart -->
			                            <div class="card card-primary card-outline ">
			                                <div class="card-header">
			                                    <h3 class="card-title">
			                                        <i class="far fa-chart-bar"></i>
			                                        Rata-Rata Modal Masyarakat Kota Palu (Grafik)
			                                    </h3>

			                                    <div class="card-tools">
			                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
			                                            <i class="fas fa-minus"></i>
			                                        </button>
			                                    </div>
			                                </div>
			                                <div class="card-body">
			                                    <div id="bar-chart2" style="height: 600px;"></div>
			                                </div>
			                                <!-- /.card-body-->
			                            </div>
			                            <!-- /.card -->
			                        </div>
			                	</div>
			                	
			                </div>
            			</div>

            			<div class="col-sm-6">
			                <div class="container-fluid">
			                	<div class="row">
			                        <div class="col-md-12">
			                            <!-- Bar chart -->
			                            <div class="card card-primary card-outline ">
			                                <div class="card-header">
			                                    <h3 class="card-title">
			                                        <i class="far fa-chart-bar"></i>
			                                        Rata-Rata Laba Masyarakat Kota Palu (Grafik)
			                                    </h3>

			                                    <div class="card-tools">
			                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
			                                            <i class="fas fa-minus"></i>
			                                        </button>
			                                    </div>
			                                </div>
			                                <div class="card-body">
			                                    <div id="bar-chart3" style="height: 600px;"></div>
			                                </div>
			                                <!-- /.card-body-->
			                            </div>
			                            <!-- /.card -->
			                        </div>
			                	</div>
			                	
			                </div>
            			</div>
            		</div>
            	</div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

		
		
<?= $this->endsection('main') ?>