<?php $this->extend('Admin\Template\Views\master\master_admin') ?>

<?= $this->section('main') ?>
        <div id="dashboard" class="content-wrapper" meta-id="0">
            <!-- Content Header (Page header) -->
            <div class="content-header"> 
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Grafik Peternakan Masyarakat di Kota Palu</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                             <ol class="breadcrumb float-sm-right">
                                  <li style="margin-left:10px;"> <select class="form-control all-districts-ternak">
                                                            <option value="0">Semua Kecamatan</option>
                                                            <?php foreach($kecamatan as $kc){?>
                                                                <option value="<?php echo $kc->id_kecamatan;?>"><?php echo $kc->nama_kecamatan;?></option>
                                                            <?php } ?>
                                                        </select></li>
                                <li  style="margin-left:10px;"> <select class="form-control all-subdistricts-ternak">
                                                            <option value="0">Semua Kelurahan</option>
                                                        </select> </li>
                             <li class="breadcrumb-item active" style="margin-left:10px;" style="margin-left:20px;"><button class="btn btn-primary filter-ternak">Filter Data</button></li>
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
                                            Peternakan Masyarakat di Kota Palu (Grafik)
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
			                	</div>
			                	
			                </div>
            			
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

		
		
<?= $this->endsection('main') ?>