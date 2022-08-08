<?php $this->extend('Admin\Template\Views\master\master_admin') ?>

<?= $this->section('main') ?>
        <div id="dashboard" class="content-wrapper" meta-id="0">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Grafik Sumber Modal Dan Laba Masyarakat Kota Palu</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                        	
                             <ol class="breadcrumb float-sm-right">
                                  <li style="margin-left:10px;"> <select class="form-control all-districts-kerja">
                                                            <option value="0">Semua Kecamatan</option>
                                                            <?php foreach($kecamatan as $kc){?>
                                                                <option value="<?php echo $kc->id_kecamatan;?>"><?php echo $kc->nama_kecamatan;?></option>
                                                            <?php } ?>
                                                        </select></li>
                                <li  style="margin-left:10px;"> <select class="form-control all-subdistricts-kerja">
                                                            <option value="0">Semua Kelurahan</option>
                                                        </select> </li>
                             <li class="breadcrumb-item active" style="margin-left:10px;" style="margin-left:20px;"><button class="btn btn-primary filter-kerja">Filter Data</button></li>
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
			                                        Sumber Modal Masyarakat Kota Palu (Grafik)
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
			                        <div class="col-12" style="margin-top:100px;">
			                        	<div class="table-responsive">
			                        		<table class="table" id="jumlah-kk-sumber-modal">
			                        			<thead class="thead-dark">
			                        				<tr>
			                        					<th>No</th>
			                        					<th>Sumber Modal</th>
			                        					<th>Jumlah Data</th>
			                        				</tr>
			                        			</thead>
			                        			<tbody>
			                        			</tbody>
			                        		</table>
			                        	</div>
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
			                        <div class="col-12" style="margin-top:100px;">
			                        	<div class="table-responsive">
			                        		<table class="table" id="jumlah-kk-laba">
			                        			<thead class="thead-dark">
			                        				<tr>
			                        					<th>No</th>
			                        					<th>Rata-rata Laba</th>
			                        					<th>Jumlah Data</th>
			                        				</tr>
			                        			</thead>
			                        			<tbody>
			                        			</tbody>
			                        		</table>
			                        	</div>
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