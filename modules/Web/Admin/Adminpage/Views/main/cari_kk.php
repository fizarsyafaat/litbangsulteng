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
                		<div class="col-lg-12">
                			<div class="card card-default">
                				<div class="card-header">
                					<h3 class="card-title">Cari Data Masyarakat</h3>
                				</div>

                				<div class="card-body">
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
                				</div>

                				<div class="card-footer">
                					<div class="row">
                						<div class="col-12">
                							<button type="button" class="btn btn-success search-kk">Cari</button>
                						</div>
                					</div>
                				</div>
                			</div>
                		</div>
                	</div>
                	<div class="row">
                		<div class="col-12 table-responsive">
                			<table id="kk-table" class="table table-striped">
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
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

		<div class="modal fade" id="kk-view">
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
								        <a class="nav-item nav-link" id="nav-house-tab" data-toggle="tab" href="#nav-house" role="tab" aria-controls="nav-house" aria-selected="false">Keadaan Rumah</a>
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