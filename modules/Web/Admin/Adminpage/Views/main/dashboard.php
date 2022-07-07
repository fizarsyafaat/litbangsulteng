<?php $this->extend('Admin\Template\Views\master\master_admin') ?>

<?= $this->section('main') ?>
        <div id="dashboard" class="content-wrapper" meta-id="0">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
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
			                                        Jumlah Kk Per Kecamatan (Grafik)
			                                    </h3>

			                                    <div class="card-tools">
			                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
			                                            <i class="fas fa-minus"></i>
			                                        </button>
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
			                	<div class="row">
			                		<div class="col-12">
			                			<div class="card card-primary card-outline table-responsive">
			                                <div class="card-header">
			                                   <h3 class="card-title">
			                                        <i class="far fa-chart-bar"></i>
			                                        Jumlah Kk Per Kecamatan (Table)
			                                    </h3>

			                                    <div class="card-tools">
			                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
			                                            <i class="fas fa-minus"></i>
			                                        </button>
			                                    </div>
			                                </div>
			                                <div class="card-body">
				                				<table class="table" id="jumlah-kk-kecamatan">
				                					<thead>
				                						<tr>
				                							<td>No</td>
				                							<td>Kecamatan</td>
				                							<td>Jumlah KK</td>
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
            			<div class="col-sm-6">
			                <div class="container-fluid">
			                	<div class="row">
			                        <div class="col-md-12">
			                            <!-- Bar chart -->
			                            <div class="card card-primary card-outline ">
			                                <div class="card-header">
			                                    <h3 class="card-title">
			                                        <i class="far fa-chart-bar"></i>
			                                        Jumlah Kk Per Kelurahan (Grafik)
			                                    </h3>

			                                    <div class="card-tools">
			                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
			                                            <i class="fas fa-minus"></i>
			                                        </button>
			                                    </div>
			                                </div>
			                                <div class="card-body">
			                                    <div id="bar-chart-kelurahan" style="height: 600px;"></div>
			                                </div>
			                                <!-- /.card-body-->
			                            </div>
			                            <!-- /.card -->
			                        </div>
			                	</div>
			                	<div class="row">
			                		<div class="col-12">
			                			<div class="card card-primary card-outline table-responsive">
			                                <div class="card-header">
			                                   <h3 class="card-title">
			                                        <i class="far fa-chart-bar"></i>
			                                        Jumlah Kk Per Kelurahan (Table)
			                                    </h3>

			                                    <div class="card-tools">
			                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
			                                            <i class="fas fa-minus"></i>
			                                        </button>
			                                    </div>
			                                </div>
			                                <div class="card-body">
				                				<table class="table" id="jumlah-kk-kelurahan">
				                					<thead>
				                						<tr>
				                							<td>No</td>
				                							<td>Kecamatan</td>
				                							<td>Jumlah KK</td>
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
            	</div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

		<div class="modal fade" id="kk-paging-view" data-id-kelurahan="0" meta-id="0">
			<div class="modal-dialog modal-xl">
				<div class="modal-content" method="post">
					<div class="modal-header">
						<h4 class="modal-title">Data Detail KK</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
    					<div class="row">
    						<div class="col-lg-3 col-md-4 col-sm-8 col-12 form-group">
    							<label>No KK</label>
    							<input type="text" class="form-control no_kk" name="kk">
    						</div>
    						<div class="col-lg-3 col-md-4 col-sm-8 col-12 form-group">
    							<label>Nama Kepala Keluarga</label>
    							<input type="text" class="form-control kepala-keluarga" name="kk">
    						</div>
    						<div class="col-lg-3 col-md-4 col-sm-8 col-12 form-group">
    							<label>Pekerjaan</label>
    							<select class="form-control">
    								<option value="0">Semua Pekerjaan</option>
    							</select>
    						</div>
    						<div class="col-lg-3 col-md-4 col-sm-8 col-12 form-group">
    							<label>Status Kemiskinan</label>
    							<select class="form-control">
    								<option value="0">Semua Status</option>
    							</select>
    						</div>
    						<div class="col-lg-3 col-md-4 col-sm-8 col-12 form-group">
    							<label>No KTP Kepala Keluarga</label>
    							<input type="text" class="form-control" name="kk">
    						</div>
    					</div>
    					<div class="row" style="margin-bottom: 20px;">
    						<div class="col-12">
    							<button type="button" class="btn btn-success search-kk">Cari</button>
    						</div>
    					</div>
						<div class="row">
							<div class="col-12 table-responsive">
								<table class="table" id="kk-table-kelurahan">
	                				<thead class="thead-dark">
	                					<tr>
	                						<th>No</th>
	                						<th>No KK</th>
	                						<th>Kepala Keluarga</th>
	                						<th>Alamat</th>
	                						<th>Tanggal Dikeluarkan</th>
	                					</tr>
	                				</thead>
	                				<tbody>
	                				</tbody>
	                				<tfoot>
	                					<tr>
	                						<td colspan="5">
	                							<div class="row">
	                								<div class="col-12 d-flex justify-content-center">
		                								<div class="spinner-border text-success"></div>
		                							</div>
	                							</div>
	                						</td>
	                					</tr>
	                				</tfoot>
								</table>
							</div>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-outline-dark" data-dismiss="modal">Kembali Kelurahan</button>
						<button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="kk-single-view">
			<div class="modal-dialog modal-xl">
				<div class="modal-content" method="post">
					<div class="modal-header">
						<h4 class="modal-title">Data Detail KK</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-12">
								<nav>
								    <div class="nav nav-tabs" id="nav-tab" role="tablist">
								        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Umum</a>
								        <a class="nav-item nav-link" id="nav-alamat-tab" data-toggle="tab" href="#nav-alamat" role="tab" aria-controls="nav-alamat" aria-selected="false">Alamat</a>
								        <a class="nav-item nav-link" id="nav-responden-tab" data-toggle="tab" href="#nav-responden" role="tab" aria-controls="nav-responden" aria-selected="false">Responden</a>
								        <a class="nav-item nav-link" id="nav-pekerjaan-tab" data-toggle="tab" href="#nav-pekerjaan" role="tab" aria-controls="nav-pekerjaan" aria-selected="false">Pekerjaan</a>
								        <a class="nav-item nav-link" id="nav-aset-tanah-tab" data-toggle="tab" href="#nav-aset-tanah" role="tab" aria-controls="nav-aset-tanah" aria-selected="false">Aset Tanah</a>
								        <a class="nav-item nav-link" id="nav-keadaan-rumah-tab" data-toggle="tab" href="#nav-keadaan-rumah" role="tab" aria-controls="nav-keadaan-rumah" aria-selected="false">Keadaan Rumah</a>
										<a class="nav-item nav-link" id="nav-perkebunan-tab" data-toggle="tab" href="#nav-perkebunan" role="tab" aria-controls="nav-perkebunan" aria-selected="false">Perkebunan</a>
								        <a class="nav-item nav-link" id="nav-pertanian-tab" data-toggle="tab" href="#nav-pertanian" role="tab" aria-controls="nav-pertanian" aria-selected="false">Pertanian</a>
								        <a class="nav-item nav-link" id="nav-tanaman-pangan-tab" data-toggle="tab" href="#nav-tanaman-pangan" role="tab" aria-controls="nav-tanaman-pangan" aria-selected="false">Tanaman Pangan</a>
								        <a class="nav-item nav-link" id="nav-tanaman-obat-tab" data-toggle="tab" href="#nav-tanaman-obat" role="tab" aria-controls="nav-tanaman-obat" aria-selected="false">Tanaman Obat</a>
								        <a class="nav-item nav-link" id="nav-kehutanan-tab" data-toggle="tab" href="#nav-kehutanan" role="tab" aria-controls="nav-kehutanan" aria-selected="false">Kehutanan</a> 
								        <a class="nav-item nav-link" id="nav-ternak-tab" data-toggle="tab" href="#nav-ternak" role="tab" aria-controls="nav-ternak" aria-selected="false">Ternak</a>
								        <a class="nav-item nav-link" id="nav-perikanan-tab" data-toggle="tab" href="#nav-perikanan" role="tab" aria-controls="nav-perikanan" aria-selected="false">Perikanan</a>
								        <a class="nav-item nav-link" id="nav-pariwisata-tab" data-toggle="tab" href="#nav-pariwisata" role="tab" aria-controls="nav-pariwisata" aria-selected="false">Pariwisata</a>
								        <a class="nav-item nav-link" id="nav-kesehatan-tab" data-toggle="tab" href="#nav-kesehatan" role="tab" aria-controls="nav-kesehatan" aria-selected="false">Kesehatan</a>
								        <a class="nav-item nav-link" id="nav-persalinan-tab" data-toggle="tab" href="#nav-persalinan" role="tab" aria-controls="nav-persalinan" aria-selected="false">Persalinan</a>
								        <a class="nav-item nav-link" id="nav-aset-lainnya-tab" data-toggle="tab" href="#nav-aset-lainnya" role="tab" aria-controls="nav-aset-lainnya" aria-selected="false">Aset Lainnya</a>
								        <a class="nav-item nav-link" id="nav-pendata-tab" data-toggle="tab" href="#nav-pendata" role="tab" aria-controls="nav-pendata" aria-selected="false">Pendata</a>
								    </div>
								</nav>
								<div class="tab-content" id="nav-input-Content">
								    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
								    	<div class="row">
								    		<div class="col-12">
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Kode PUM</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="kode_pum">KODE PUM</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>No KK</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="no_kk">NO KK</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Nama Kepala Keluarga</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="kepala_keluarga">KEPALA KELUARGA</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Waktu Pendataan</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-3">
								    						<p class="tanggal_pendataan">TANGGAL PENDATAAN</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Status Kemiskinan</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-3">
								    						<p class="status_kemiskinan">STATUS KEMISKINAN</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Pengguna BPJS</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-3">
								    						<p class="pengguna_bpjs">STATUS KEMISKNINAN</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Jenis Jaminan Sosial</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-3">
								    						<p class="jenis_jaminan_sosial">JENIS JAMINAN SOSIAL</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Lama Waktu (bulan)</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-3">
								    						<p class="lama_waktu">LAMA WAKTU</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Wajib Iuran</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-3">
								    						<p class="wajib_iuran">WAJIB IURAN</p>
								    					</div>
								    				</div>
								    			</div>
								    		</div>
								    	</div>
								    </div>
								    <div class="tab-pane fade" id="nav-alamat" role="tabpanel" aria-labelledby="nav-alamat-tab">
								    	<div class="row">
								    		<div class="col-12">
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Alamat</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="alamat_lengkap">ALAMAT LENGKAP</p>
								    					</div>
								    				</div>
								    			</div>
								    		</div>
								    	</div>
								    </div>
								    <div class="tab-pane fade" id="nav-aset-tanah" role="tabpanel" aria-labelledby="nav-aset-tanah-tab">
								    	<div class="row">
								    		<div class="col-12">
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Aset Tanah</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="aset_tanah">ALAMAT LENGKAP</p>
								    					</div>
								    				</div>
								    			</div>
								    		</div>
								    	</div>
								    </div>
								     <div class="tab-pane fade" id="nav-pendata" role="tabpanel" aria-labelledby="nav-pendata-tab">
								    	<div class="row">
								    		<div class="col-12">
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Nama Pendata</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="nama_pendata">Pendata 1</p>
								    					</div>
								    				</div>
								    			</div>
								    		</div>
								    	</div>
								    </div>

								      <div class="tab-pane fade" id="nav-pariwisata" role="tabpanel" aria-labelledby="nav-pariwisata-tab">
								    	<div class="row">
								    		<div class="col-12">
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Jumlah Aktivitas Wisata Bulanan</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="jumlah_aktivitas_wisata_bulanan">Wisata 1</p>
								    					</div>
								    				</div>
								    			</div>
								    				<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Jumlah Biaya Wisata Bulanan</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="jumlah_biaya_wisata_bulanan">Wisata 2</p>
								    					</div>
								    				</div>
								    			</div>
								    				<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Lokasi Objek Wisata</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="lokasi_objek_wisata">Wisata 3</p>
								    					</div>
								    				</div>
								    			</div>
								    				<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Daya Tarik Wisata Palu</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="daya_tarik_wisata_palu">Wisata 4</p>
								    					</div>
								    				</div>
								    			</div>
								    				<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Pengelolaan Pariwisata Palu</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="pengelolaan_pariwisata_palu">Wisata 5</p>
								    					</div>
								    				</div>
								    			</div>
								    		</div>
								    	</div>
								    </div>	

								       <div class="tab-pane fade" id="nav-persalinan" role="tabpanel" aria-labelledby="nav-persalinan-tab">
								    	<div class="row">
								    		<div class="col-12">
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Acceptor KB</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="acceptorkb_multi">Persalinan 1</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Kualitas Ibu Hamil</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="kualitas_ibu_hamil">Persalinan 1</p>
								    					</div>
								    				</div>
								    			</div>
								    				<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Kualitas Bayi</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="kualitas_bayi">Persalinan 2</p>
								    					</div>
								    				</div>
								    			</div>
								    				<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Tempat Persalinan</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="tempat_persalinan">Persalinan 3</p>
								    					</div>
								    				</div>
								    			</div>
								    				<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Cakupan Imunisasi </label>
								    					</div>
								    				</div>
								    					<div class="row">
								    					<div class="col-sm-6">
								    						<p class="cakupan_imunisasi_multi">Persalinan 3</p>
								    					</div>
								    				</div>
								    			</div>
								    				<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Pertolongan Persalinan</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="pertolongan_persalinan">Persalinan 4</p>
								    					</div>
								    				</div>
								    			</div>
								    				<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Fasilitas Layanan Kesehatan</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="fasilitas_layanan_kesehatan">Persalinan 5</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Jenis Kelamin Balita</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="jenis_kelamin_balita">Persalinan 6</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Umur Balita</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="umur_balita">Persalinan 6</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Berat Badan</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="berat_badan">Persalinan 7</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Tinggi Badan</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="tinggi_badan">Persalinan 8</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Kondisi Saat Pengukuran</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="kondisi_saat_pengukuran">Persalinan 9</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Status Gizi Balita</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="status_gizi_balita">Persalinan 10</p>
								    					</div>
								    				</div>
								    			</div>
								    			</div>
								    	</div>
								    </div>

								      <div class="tab-pane fade" id="nav-kesehatan" role="tabpanel" aria-labelledby="nav-kesehatan-tab">
								    	<div class="row">
								    		<div class="col-12">
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Penderita Sakit Kelainan</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="penderita_sakit_kelainan">kesehatan 1</p>
								    					</div>
								    				</div>
								    			</div>
								    				<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Perilaku Hidup Bersih</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="perilaku_hidup_bersih">kesehatan 2</p>
								    					</div>
								    				</div>
								    			</div>
								    				<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Pola Makan</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="pola_makan">kesehatan 3</p>
								    					</div>
								    				</div>
								    			</div>
								    				<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Kebiasan Berobat</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="kebiasaan_berobat">kesehatan 4</p>
								    					</div>
								    				</div>
								    			</div>
								    				<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Jenis Penyakit</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="jenis_penyakit">kesehatan 5</p>
								    					</div>
								    				</div>
								    			</div>
								    		</div>
								    	</div>
								    </div>	

								          <div class="tab-pane fade" id="nav-aset-lainnya" role="tabpanel" aria-labelledby="nav-aset-lainnya-tab">
								    	<div class="row">
								    		<div class="col-12">
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Transportasi Umum</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="col-sm-12 transportasi_umum_multi">aset lainnya 1</p>
								    					</div>
								    				</div>
								    			</div>
								    				<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Lembaga Pendidikan</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="col-sm-12 lembaga_pendidikan_multi">aset lainnya 2</p>
								    					</div>
								    				</div>
								    			</div>
								    				<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Aset Sarana Produksi</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="col-sm-12 aset_produksi_multi">kesehatan 3</p>
								    					</div>
								    				</div>
								    			</div>								    				
								    		</div>
								    	</div>
								    </div>	

								     <div class="tab-pane fade" id="nav-keadaan-rumah" role="tabpanel" aria-labelledby="nav-keadaan-rumah-tab">
								    	<div class="row">
								    		<div class="col-12">
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Sumber Air Minum</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="sumber_air_minum">LOK</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Keterangan Sumber Air Minum</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="ket_sumber_air_minum">Lok2</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Status Kepemilikan Rumah</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="status_kepemilikan_rumah">Lok3</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Sarana Mck</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="sarana_mck">Lok4</p>
								    					</div>
								    				</div>
								    			</div>

								    				<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Daya Listrik</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="daya_listrik">Lok5</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Luas Pekarangan Rumah</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="luas_pekarangan_rumah">Lok6</p>
								    					</div>
								    				</div>
								    			</div>

								    				<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Pemanfaatan Danau DKK</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="pemanfaatan_danau_dkk">Lok7</p>
								    					</div>
								    				</div>
								    			</div>
								    				<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Dinding Rumah</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="dinding_rumah">Lok8</p>
								    					</div>
								    				</div>
								    			</div>
								    				<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Atap Rumah</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="atap_rumah">Lok9</p>
								    					</div>
								    				</div>
								    			</div>
								    				<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Lantai Rumah</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="lantai_rumah">Lok10</p>
								    					</div>
								    				</div>
								    			</div>
											</div>
								    		</div>
								    	</div>

								    <div class="tab-pane fade" id="nav-perkebunan" role="tabpanel" aria-labelledby="nav-perkebunan-tab">
							    	<div class="row">
							    		<div class="col-12">
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Data Aset Perkebunan</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-12 table-responsive">
							    						<table class="table table-striped komoditas-perkebunan-table">
							    							<thead class="thead-dark">
							    								<tr>
								    								<th>Jenis Perkebunan</th>
								    								<th>Luas Panen</th>
								    								<th>Jumlah Produksi</th>
								    								<th>Hasil Pemasaran</th>
								    								<th>Jumlah Pohon</th>
								    								<th>Jenis Bibit</th>
								    								<th>Pestisida</th>
								    								<th>Pupuk Organik</th>
								    								<th>Pupuk Pabrik</th>
								    								<th>Lokasi Lahan</th>
							    								</tr>
							    							</thead>
							    							<tbody>
							    							</tbody>
							    							<tfoot>
							    								
							    							</tfoot>
							    						</table>
							    					</div>
							    				</div>
							    			</div>
							    		</div>
							    	</div>
							    </div>			

							    <div class="tab-pane fade" id="nav-pertanian" role="tabpanel" aria-labelledby="nav-pertanian-tab">
							    	<div class="row">
							    		<div class="col-12">
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Data Aset Pertanian</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-12 table-responsive">
							    						<table class="table table-striped komoditas-pertanian-table">
							    							<thead class="thead-dark">
							    								<tr>
								    								<th>Jenis Komoditas Pertanian</th>
								    								<th>Luas Panen</th>
								    								<th>Jumlah Produksi</th>
								    								<th>Hasil Pemasaran</th>
								    								<th>Jumlah Pohon</th>
								    								<th>Jenis Bibit</th>
								    								<th>Pestisida</th>
								    								<th>Pupuk Organik</th>
								    								<th>Pupuk Pabrik</th>
								    								<th>Lokasi Lahan</th>
							    								</tr>
							    							</thead>
							    							<tbody>
							    							</tbody>
							    							<tfoot>
							    								
							    							</tfoot>
							    						</table>
							    					</div>
							    				</div>
							    			</div>
							    		</div>
							    	</div>
							    </div>			
   	

							    <div class="tab-pane fade" id="nav-tanaman-pangan" role="tabpanel" aria-labelledby="nav-tanaman-pangan-tab">
							    	<div class="row">
							    		<div class="col-12">
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Data Aset Tanaman Pangan</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-12 table-responsive">
							    						<table class="table table-striped komoditas-tanaman-pangan-table">
							    							<thead class="thead-dark">
							    								<tr>
								    								<th>Jenis Komoditas Tanaman Pangan</th>
								    								<th>Luas Panen</th>
								    								<th>Jumlah Produksi</th>
								    								<th>Hasil Pemasaran</th>
								    								<th>Jumlah Pohon</th>
								    								<th>Jenis Bibit</th>
								    								<th>Pestisida</th>
								    								<th>Pupuk Organik</th>
								    								<th>Pupuk Pabrik</th>
								    								<th>Lokasi Lahan</th>
							    								</tr>
							    							</thead>
							    							<tbody>
							    							</tbody>
							    							<tfoot>
							    							
							    							</tfoot>
							    						</table>
							    					</div>
							    				</div>
							    			</div>
							    		</div>
							    	</div>
							    </div>							

							     <div class="tab-pane fade" id="nav-tanaman-obat" role="tabpanel" aria-labelledby="nav-tanaman-obat-tab">
							    	<div class="row">
							    		<div class="col-12">
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Data Aset Tanaman Obat</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-12 table-responsive">
							    						<table class="table table-striped komoditas-tanaman-obat-table">
							    							<thead class="thead-dark">
							    								<tr>
								    								<th>Jenis Komoditas Tanaman Obat</th>
								    								<th>Luas Panen</th>
								    								<th>Jumlah Produksi</th>
								    								<th>Hasil Pemasaran</th>
								    								<th>Jumlah Pohon</th>
								    								<th>Jenis Bibit</th>
								    								<th>Pestisida</th>
								    								<th>Pupuk Organik</th>
								    								<th>Pupuk Pabrik</th>
								    								<th>Lokasi Lahan</th>
							    								</tr>
							    							</thead>
							    							<tbody>
							    							</tbody>
							    							<tfoot>
							    							
							    							</tfoot>
							    						</table>
							    					</div>
							    				</div>
							    			</div>
							    		</div>
							    	</div>
							    </div>		

							    <div class="tab-pane fade" id="nav-kehutanan" role="tabpanel" aria-labelledby="nav-kehutanan-tab">
							    	<div class="row">
							    		<div class="col-12">
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Data Aset Kehutanan</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-12 table-responsive">
							    						<table class="table table-striped komoditas-kehutanan-table">
							    							<thead class="thead-dark">
							    								<tr>
								    								<th>Jenis Komoditas kehutanan</th>
								    								<th>Luas Panen</th>
								    								<th>Jumlah Produksi</th>
								    								<th>Hasil Pemasaran</th>
								    								<th>Jumlah Pohon</th>
								    								<th>Jenis Bibit</th>
								    								<th>Pestisida</th>
								    								<th>Pupuk Organik</th>
								    								<th>Pupuk Pabrik</th>
								    								<th>Lokasi Lahan</th>
							    								</tr>
							    							</thead>
							    							<tbody>
							    							</tbody>
							    							<tfoot>
							    							
							    							</tfoot>
							    						</table>
							    					</div>
							    				</div>
							    			</div>
							    		</div>
							    	</div>
							    </div>

							        <div class="tab-pane fade" id="nav-ternak" role="tabpanel" aria-labelledby="nav-ternak-tab">
							    	<div class="row">
							    		<div class="col-12">
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Data Komoditas Hewan Ternak </label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-12 table-responsive">
							    						<table class="table table-striped komoditas-ternak-table">
							    							<thead class="thead-dark">
							    								<tr>
								    								<th>Jenis Komoditas Ternak</th>
								    								<th>Luas Kandang</th>
								    								<th>Jumlah Ekor</th>
								    								<th>Jenis Hasil Ternak</th>
								    								<th>Jumlah Produksi Hasil Ternak</th>
								    								<th>Pemasaran Hasil Ternak</th>
								    								<th>Jenis Pakan Ternak</th>
								    								
							    								</tr>
							    							</thead>
							    							<tbody>
							    							</tbody>
							    							<tfoot>
							    						
							    							</tfoot>
							    						</table>
							    					</div>
							    				</div>
							    			</div>
							    		</div>
							    	</div>
							    </div>

							   <div class="tab-pane fade" id="nav-perikanan" role="tabpanel" aria-labelledby="nav-perikanan-tab">
							    	<div class="row">
							    		<div class="col-12">
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Data Komoditas Perikanan</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-12 table-responsive">
							    						<table class="table table-striped komoditas-perikanan-table">
							    							<thead class="thead-dark">
							    								<tr>
								    								<th>Jenis perikanan</th>
								    								<th>Luas Panen</th>
								    								<th>Jumlah Ikan</th>
								    								<th>Jumlah Produksi Hasil Ternak</th>
								    								<th>Jenis Bibit Perikanan</th>
								    								<th>Pemasaran Hasil Ternak</th>
								    								<th>Jenis Pakan Ikan</th>
							    								</tr>
							    							</thead>
							    							<tbody>
							    							</tbody>
							    							<tfoot>
							    								
							    							</tfoot>
							    						</table>
							    					</div>
							    				</div>
							    			</div>
							    		</div>
							    	</div>
							    	<div class="row">
							    		<div class="col-12">
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Data Perikanan Tangkap</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-lg-6 col-sm-8 col-12 table-responsive">
							    						<table class="table table-striped komoditas-perikanan-tangkap-table">
							    							<thead class="thead-dark">
							    								<tr>
								    								<th>Alat Tangkap Media Budidaya Ikan</th>
								    								<th>Jumlah Unit</th>
							    								</tr>
							    							</thead>
							    							<tbody>
							    							</tbody>
							    							<tfoot>
							    								
							    							</tfoot>
							    						</table>
							    					</div>
							    				</div>
							    			</div>
							    		</div>
							    	</div>
							    </div>

									   

								    <div class="tab-pane fade" id="nav-responden" role="tabpanel" aria-labelledby="nav-responden-tab">
								    	<div class="row">
								    		<div class="col-12">
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>NIK</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="nik">NIK</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Nama Lengkap</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="nama_lengkap">NAMA LENGKAP</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Jenis Kelamin</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="jenis_kelamin">JENIS KELAMIN</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Hubungan Dengan Kepala Keluarga</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="hubungan_dengan_keluarga">HUBUNGAN DENGAN KELUARGA</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Status Perkawinan</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="status_perkawinan">STATUS PERKAWINAN</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Agama</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="agama">AGAMA</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Golongan Darah</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="golongan_darah">GOLONGAN DARAH</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Kewarganegaraan</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="kewarganegaraan">KEWARGANEGARAAN</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Etnis Suku</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="etnis_suku">ETNIS</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Pendidikan Terakhir</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="pendidikan_terakhir">PENDIDIKAN TERAKHIR</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Status Domisili</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="status_domisili">STATUS DOMISILI</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Cacat Fisik</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="cacat_fisik">CACAT FISIK</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Cacat Mental</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="cacat_mental">CACAT MENTAL</p>
								    					</div>
								    				</div>
								    			</div>
								    		</div>
								    	</div>
								    </div>
								    <div class="tab-pane fade" id="nav-pekerjaan" role="tabpanel" aria-labelledby="nav-pekerjaan-tab">
								    	<div class="row">
								    		<div class="col-12">
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Lembaga Pemerintahan Yang Diikuti</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-12 lembaga_pemerintahan_multi">
								    						<p>LEMBAGA PEMERINTAHAN DIIKUTI MULTI</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Lembaga Kemasyarakatan Yang Diikuti</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="lembaga_kemasyarakatan">LEMBAGA KEMASYARAKATAN</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Aktivitas Ekonomi Lainnya</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="aktivitas_ekonomi_lainnya">AKTIVITAS EKONOMI LAINNYA</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Sumber Modal</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="sumber_modal">SUMBER MODAL</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Modal</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="modal_popup">MODAL</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Laba Per Bulan</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="laba_per_bulan">LABA PER BULAN</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Mata Pencaharian Pokok</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="mata_pencaharian_pokok">MATA PENCAHARIAN POKOK</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Jumlah Penghasilan Per Bulan</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-12">
									    					<p class="jumlah_penghasilan">JUMLAH PENGHASILAN PER BULAN</p>
									    				</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label>Jumlah Pengeluaran Per Bulan</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-6">
								    						<p class="jumlah_pengeluaran">JUMLAH PENGELUARAN PER BULAN</p>
								    					</div>
								    				</div>
								    			</div>
								    			<div class="form-group">
								    				<div class="row">
								    					<div class="col-12">
										    				<label class="">Kewajiban Wajib Pajak Retribusi</label>
								    					</div>
								    				</div>
								    				<div class="row">
								    					<div class="col-sm-12 wajib_pajak_retribusi_multi">
								    						<p>KEWAJIBAN WAJIB PAJAK RETRIBUSI MULTI</p>
								    					</div>
								    				</div>
								    			</div>
								    		</div>
								    	</div>
								    </div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
<?= $this->endsection('main') ?>