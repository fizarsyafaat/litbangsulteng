<?php $this->extend('Admin\Template\Views\master\master_admin') ?>

<?= $this->section('main') ?>
        <div id="insert-data" class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Insert Data</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Insert Data</li>
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
                	<form id="submit-form-id" class="row" method="post" action="<?php echo route_to('user.panel.post.insert-data'); ?>">
				        <input type="hidden" class="csrf-header-master" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                		<div class="col-12 button-submit-wrapper">
                			<button type="button" class="submit-form btn btn-success">Submit</button>
                		</div>
                		<div class="col-lg-12">
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
									    				<input type="text" class="form-control" name="kode_pum">
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
									    				<input type="text" class="form-control" name="no_kk">
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
									    				<input type="text" class="form-control" name="kepala_keluarga">
							    					</div>
							    				</div>
							    			</div>
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Tanggal Pendataan</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-3">
							    						<input type="date" class="form-control" name="tanggal_pendataan"> 
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
							    						<input type="time" step="1" class="form-control" name="waktu_pendataan"> 
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
							    						<select class="form-control" name="status_kemiskinan">
							    							<?php foreach($status_kemiskinan as $sk){?>
							    							<option value="<?php echo $sk->status_kemiskinan_id;?>"><?php echo $sk->nama_status_kemiskinan; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="pengguna_bpjs">
							    							<option value="1">Ya</option>
							    							<option value="0">Tidak</option>
							    						</select>
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
							    						<select class="form-control" name="jenis_jaminan_sosial">
							    							<?php foreach($jenis_jaminan_sosial as $jjs){?>
							    							<option value="<?php echo $jjs->jenis_jaminan_sosial_id;?>"><?php echo $jjs->nama_jenis_jaminan_sosial; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="lama_waktu">
							    							<?php foreach($lama_waktu as $lw){?>
							    							<option value="<?php echo $lw->lama_waktu_id;?>"><?php echo $lw->nama_lama_waktu; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="wajib_iuran">
							    							<?php foreach($wajib_iuran as $wi){?>
							    							<option value="<?php echo $wi->wajib_iuran_id;?>"><?php echo $wi->nama_wajib_iuran; ?></option>
							    							<?php } ?>
							    						</select>
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
									    				<textarea  class="form-control" name="alamat"></textarea>
							    					</div>
							    				</div>
							    			</div>
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>RT</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-3">
							    						<input class="form-control" type="number" name="rt">
							    					</div>
							    				</div>
							    			</div>
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>RW</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-3">
							    						<input class="form-control" type="number" name="rw">
							    					</div>
							    				</div>
							    			</div>
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Provinsi</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-6">
							    						<select class="form-control" name="province">
							    							<option value="1">Sulawesi Tengah</option>
							    						</select>
							    					</div>
							    				</div>
							    			</div>
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Kota</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-6">
							    						<select class="form-control" name="province">
							    							<option value="1">Palu</option>
							    						</select>
							    					</div>
							    				</div>
							    			</div>
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Kecamatan</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-6">
							    						<select class="form-control kecamatan-mdw" name="kecamatan">
							    							<?php foreach($kecamatan as $kc){ ?>
							    							<option value="<?php echo $kc->id_kecamatan; ?>"><?php echo $kc->nama_kecamatan; ?></option>
							    							<?php } ?>
							    						</select>
							    					</div>
							    				</div>
							    			</div>
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Kelurahan</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-6">
							    						<select class="form-control kelurahan-mdw" name="kelurahan">
							    							<option></option>
							    						</select>
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
									    				<input type="text" class="form-control" name="nik_responden">
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
									    				<input type="text" class="form-control" name="nama_lengkap">
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
							    						<select class="form-control" name="jenis_kelamin_responden">
							    							<option value="1">Laki-laki</option>
							    							<option value="2">Prempuan</option>
							    						</select>
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
							    						<select class="form-control" name="hubungan_dengan_kepala_keluarga">
							    							<?php foreach($hubungan_dengan_kepala_keluarga as $hdkk){?>
							    							<option value="<?php echo $hdkk->hubungan_dengan_kepala_keluarga_id;?>"><?php echo $hdkk->nama_hubungan_dengan_kepala_keluarga; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="status_perkawinan">
							    							<?php foreach($status_perkawinan as $skwn){?>
							    							<option value="<?php echo $skwn->status_perkawinan_id;?>"><?php echo $skwn->nama_status_perkawinan; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="agama">
							    							<?php foreach($agama as $agma){?>
							    							<option value="<?php echo $agma->agama_id;?>"><?php echo $agma->nama_agama; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="golongan_darah">
							    							<?php foreach($golongan_darah as $gd){?>
							    							<option value="<?php echo $gd->golongan_darah_id;?>"><?php echo $gd->nama_golongan_darah; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="kewarganegaraan">
							    							<option value="1">Warga Negara Indonesia</option>
							    							<option value="2">Warga Negara Asing</option>
							    						</select>
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
							    						<input type="text" class="form-control" name="etnis_suku">
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
							    						<select class="form-control" name="pendidikan_terakhir">
							    							<?php foreach($pendidikan_terakhir as $pt){?>
							    							<option value="<?php echo $pt->pendidikan_terakhir_id;?>"><?php echo $pt->nama_pendidikan_terakhir; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="status_domisili">
							    							<?php foreach($status_domisili as $sd){?>
							    							<option value="<?php echo $sd->status_domisili_id;?>"><?php echo $sd->nama_status_domisili; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="cacat_fisik">
							    							<?php foreach($cacat_fisik as $ct){?>
							    							<option value="<?php echo $ct->cacat_fisik_id;?>"><?php echo $ct->nama_cacat_fisik; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="cacat_mental">
							    							<?php foreach($cacat_mental as $cm){?>
							    							<option value="<?php echo $cm->cacat_mental_id;?>"><?php echo $cm->nama_cacat_mental; ?></option>
							    							<?php } ?>
							    						</select>
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
							    					<div class="col-sm-12">
							    						<?php foreach($lembaga_pemerintahan as $kwpr){?>
														<div class="form-check">
															<input name="lembaga_pemerintahan[]" class="form-check-input" type="checkbox" value="<?php echo $kwpr->lembaga_pemerintahan_id; ?>" id="lembaga-pemerintahan<?php echo $kwpr->lembaga_pemerintahan_id; ?>">
															<label class="form-check-label" for="lembaga-pemerintahan<?php echo $kwpr->lembaga_pemerintahan_id; ?>">
																<?php echo $kwpr->nama_lembaga_pemerintahan; ?>
															</label>
														</div>
														<?php } ?>
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
							    						<select class="form-control" name="lembaga_kemasyarakatan">
							    							<?php foreach($lembaga_kemasyarakatan as $at){?>
							    							<option value="<?php echo $at->lembaga_kemasyarakatan_id;?>"><?php echo $at->nama_lembaga_kemasyarakatan; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="aktivitas_ekonomi_lainnya">
							    							<?php foreach($mata_pencaharian_pokok as $mpp){?>
							    							<option value="<?php echo $mpp->mata_pencaharian_pokok_id;?>"><?php echo $mpp->nama_mata_pencaharian_pokok; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="sumber_modal">
							    							<?php foreach($sumber_modal as $at){?>
							    							<option value="<?php echo $at->sumber_modal_id;?>"><?php echo $at->nama_sumber_modal; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="modal">
							    							<?php foreach($modal as $at){?>
							    							<option value="<?php echo $at->modal_id;?>"><?php echo $at->nama_modal; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="laba_per_bulan">
							    							<?php foreach($laba_per_bulan as $at){?>
							    							<option value="<?php echo $at->laba_per_bulan_id;?>"><?php echo $at->nama_laba_per_bulan; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="mata_pencaharian_pokok">
							    							<?php foreach($mata_pencaharian_pokok as $mpp){?>
							    							<option value="<?php echo $mpp->mata_pencaharian_pokok_id;?>"><?php echo $mpp->nama_mata_pencaharian_pokok; ?></option>
							    							<?php } ?>
							    						</select>
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
							    					<div class="col-sm-6">
							    						<select class="form-control" name="penghasilan_per_bulan">
							    							<?php foreach($uang_per_bulan as $at){?>
							    							<option value="<?php echo $at->uang_per_bulan_id;?>"><?php echo $at->nama_uang_per_bulan; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="pengeluaran_per_bulan">
							    							<?php foreach($uang_per_bulan as $at){?>
							    							<option value="<?php echo $at->uang_per_bulan_id;?>"><?php echo $at->nama_uang_per_bulan; ?></option>
							    							<?php } ?>
							    						</select>
							    					</div>
							    				</div>
							    			</div>
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Kewajiban Wajib Pajak Retribusi</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-12">
							    						<?php foreach($kewajiban_wajib_pajak_retribusi as $kwpr){?>
														<div class="form-check">
															<input name="wajib_pajak_retribusi[]" class="form-check-input" type="checkbox" value="<?php echo $kwpr->kewajiban_wajib_pajak_retribusi_id; ?>" id="wajib-pajak<?php echo $kwpr->kewajiban_wajib_pajak_retribusi_id; ?>">
															<label class="form-check-label" for="wajib-pajak<?php echo $kwpr->kewajiban_wajib_pajak_retribusi_id; ?>">
																<?php echo $kwpr->nama_wajib_pajak_retribusi; ?>
															</label>
														</div>
														<?php } ?>
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
							    						<select class="form-control" name="aset_tanah">
							    							<?php foreach($aset_tanah as $at){?>
							    							<option value="<?php echo $at->aset_tanah_id;?>"><?php echo $at->nama_aset_tanah; ?></option>
							    							<?php } ?>
							    						</select>
							    					</div>
							    				</div>
							    			</div>
							    		</div>
							    	</div>
							    </div>
							    <div class="tab-pane fade" id="nav-house" role="tabpanel" aria-labelledby="nav-house-tab">
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
							    						<select class="form-control" name="sumber_air_minum">
							    							<?php foreach($sumber_air_minum as $at){?>
							    							<option value="<?php echo $at->sumber_air_minum_id;?>"><?php echo $at->nama_sumber_air_minum; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="keterangan_sumber_air_minum">
							    							<?php foreach($keterangan as $at){?>
							    							<option value="<?php echo $at->keterangan_sumber_air_minum_id;?>"><?php echo $at->nama_keterangan_sumber_air_minum; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="status_kepemilikan_rumah">
							    							<?php foreach($status_kepemilikan_rumah as $at){?>
							    							<option value="<?php echo $at->status_kepemilikan_rumah_id;?>"><?php echo $at->nama_status_kepemilikan_rumah; ?></option>
							    							<?php } ?>
							    						</select>
							    					</div>
							    				</div>
							    			</div>
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Sarana MCK</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-6">
							    						<select class="form-control" name="sarana_mck">
							    							<?php foreach($sarana_mck as $at){?>
							    							<option value="<?php echo $at->sarana_mck_id;?>"><?php echo $at->nama_sarana_mck; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="daya_listrik">
							    							<?php foreach($daya_listrik as $at){?>
							    							<option value="<?php echo $at->daya_listrik_id;?>"><?php echo $at->nama_daya_listrik; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="luas_pekarangan_rumah">
							    							<?php foreach($luas_pekarangan_rumah as $at){?>
							    							<option value="<?php echo $at->luas_pekarangan_rumah_id;?>"><?php echo $at->nama_luas_pekarangan_rumah; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="dinding_rumah">
							    							<?php foreach($dinding_rumah as $at){?>
							    							<option value="<?php echo $at->dinding_rumah_id;?>"><?php echo $at->nama_dinding_rumah; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="lantai_rumah">
							    							<?php foreach($lantai_rumah as $at){?>
							    							<option value="<?php echo $at->lantai_rumah_id;?>"><?php echo $at->nama_lantai_rumah; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="atap_rumah">
							    							<?php foreach($atap_rumah as $at){?>
							    							<option value="<?php echo $at->atap_rumah_id;?>"><?php echo $at->nama_atap_rumah; ?></option>
							    							<?php } ?>
							    						</select>
							    					</div>
							    				</div>
							    			</div>
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Pemanfaatan Danau/Waduk</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-6">
							    						<select class="form-control" name="pemanfaatan_danau_dkk">
							    							<?php foreach($pemanfaatan_danau_dkk as $at){?>
							    							<option value="<?php echo $at->pemanfaatan_danau_dkk_id;?>"><?php echo $at->nama_pemanfaatan_danau_dkk; ?></option>
							    							<?php } ?>
							    						</select>
							    					</div>
							    				</div>
							    			</div>
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Aset Lainnya</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-12">
							    						<?php foreach($aset_lainnya as $al){?>
														<div class="form-check">
															<input name="aset_lainnya[]" class="form-check-input" type="checkbox" value="<?php echo $al->aset_lainnya_id; ?>" id="aset-lainnya-cb<?php echo $al->aset_lainnya_id; ?>">
															<label class="form-check-label" for="aset-lainnya-cb<?php echo $al->aset_lainnya_id; ?>">
																<?php echo $al->nama_aset_lainnya; ?>
															</label>
														</div>
														<?php } ?>
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
									    				<label>Perkebunan</label>
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
							    								<tr>
							    									<td colspan="9"><button type="button" class="btn btn-success tambah-baris-perkebunan">+ Tambah Baris</button></td>
							    								</tr>
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
									    				<label>Pertanian</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-12 table-responsive">
							    						<table class="table table-striped komoditas-pertanian-table">
							    							<thead class="thead-dark">
							    								<tr>
								    								<th>Jenis Pertanian</th>
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
							    								<tr>
							    									<td colspan="9"><button type="button" class="btn btn-success tambah-baris-pertanian">+ Tambah Baris</button></td>
							    								</tr>
							    							</tfoot>
							    						</table>
							    					</div>
							    				</div>
							    			</div>
							    		</div>
							    	</div>
							    </div>
							    <div class="tab-pane fade" id="nav-tanaman-obat" role="tabpanel" aria-labelledby="nav-tanaman-obat">
							    	<div class="row">
							    		<div class="col-12">
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Tanaman Obat</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-12 table-responsive">
							    						<table class="table table-striped komoditas-tanaman-obat-table">
							    							<thead class="thead-dark">
							    								<tr>
								    								<th>Jenis Tanaman Obat</th>
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
							    								<tr>
							    									<td colspan="9"><button type="button" class="btn btn-success tambah-baris-tanaman-obat">+ Tambah Baris</button></td>
							    								</tr>
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
									    				<label>Tanaman Pangan</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-12 table-responsive">
							    						<table class="table table-striped komoditas-tanaman-pangan-table">
							    							<thead class="thead-dark">
							    								<tr>
								    								<th>Jenis Tanaman Pangan</th>
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
							    								<tr>
							    									<td colspan="9"><button type="button" class="btn btn-success tambah-baris-tanaman-pangan">+ Tambah Baris</button></td>
							    								</tr>
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
									    				<label>Ternak</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-12 table-responsive">
							    						<table class="table table-striped komoditas-ternak-table">
							    							<thead class="thead-dark">
							    								<tr>
								    								<th>Jenis Ternak</th>
								    								<th>Luas Kandang</th>
								    								<th>Jumlah Ekor</th>
								    								<th>Jenis Komoditas Hasil Ternak</th>
								    								<th>Jumlah Produksi Hasil Ternak</th>
								    								<th>Pemasaran Hasil Ternak</th>
								    								<th>Jenis Pakan Ternak</th>
							    								</tr>
							    							</thead>
							    							<tbody>
							    							</tbody>
							    							<tfoot>
							    								<tr>
							    									<td colspan="9"><button type="button" class="btn btn-success tambah-baris-ternak">+ Tambah Baris</button></td>
							    								</tr>
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
									    				<label>Perikanan</label>
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
							    								<tr>
							    									<td colspan="9"><button type="button" class="btn btn-success tambah-baris-perikanan">+ Tambah Baris</button></td>
							    								</tr>
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
									    				<label>Perikanan Tangkap</label>
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
							    								<tr>
							    									<td colspan="9"><button type="button" class="btn btn-success tambah-baris-perikanan-tangkap">+ Tambah Baris</button></td>
							    								</tr>
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
									    				<label>Kehutanan</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-12 table-responsive">
							    						<table class="table table-striped komoditas-kehutanan-table">
							    							<thead class="thead-dark">
							    								<tr>
								    								<th>Jenis Kehutanan</th>
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
							    								<tr>
							    									<td colspan="9"><button type="button" class="btn btn-success tambah-baris-kehutanan">+ Tambah Baris</button></td>
							    								</tr>
							    							</tfoot>
							    						</table>
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
							    						<select class="form-control" name="jumlah_aktivitas_wisata_bulanan">
							    							<?php foreach($jumlah_aktivitas_wisata_bulanan as $at){?>
							    							<option value="<?php echo $at->jumlah_aktivitas_wisata_bulanan_id;?>"><?php echo $at->nama_jumlah_aktivitas_wisata_bulanan; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="jumlah_biaya_wisata_bulanan">
							    							<?php foreach($jumlah_biaya_wisata_bulanan as $at){?>
							    							<option value="<?php echo $at->jumlah_biaya_wisata_bulanan_id;?>"><?php echo $at->nama_jumlah_biaya_wisata_bulanan; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="lokasi_objek_wisata">
							    							<?php foreach($lokasi_objek_wisata as $at){?>
							    							<option value="<?php echo $at->lokasi_objek_wisata_id;?>"><?php echo $at->nama_lokasi_objek_wisata; ?></option>
							    							<?php } ?>
							    						</select>
							    					</div>
							    				</div>
							    			</div>
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Daya Tarik Wisata Kota Palu</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-6">
							    						<select class="form-control" name="daya_tarik_wisata_kota_palu">
							    							<?php foreach($rating_nilai as $at){?>
							    							<option value="<?php echo $at->rating_nilai_id;?>"><?php echo $at->nama_rating_nilai; ?></option>
							    							<?php } ?>
							    						</select>
							    					</div>
							    				</div>
							    			</div>
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Pengelolaan Wisata Kota Palu</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-6">
							    						<select class="form-control" name="pengelolaan_wisata_kota_palu">
							    							<?php foreach($rating_nilai as $at){?>
							    							<option value="<?php echo $at->rating_nilai_id;?>"><?php echo $at->nama_rating_nilai; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="penderita_sakit_kelainan">
							    							<?php foreach($penderita_sakit_kelainan as $at){?>
							    							<option value="<?php echo $at->penderita_sakit_kelainan_id;?>"><?php echo $at->nama_penderita_sakit_kelainan; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="perilaku_hidup_bersih">
							    							<?php foreach($perilaku_hidup_bersih as $at){?>
							    							<option value="<?php echo $at->perilaku_hidup_bersih_id;?>"><?php echo $at->nama_perilaku_hidup_bersih; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="pola_makan">
							    							<?php foreach($pola_makan as $at){?>
							    							<option value="<?php echo $at->pola_makan_id;?>"><?php echo $at->nama_pola_makan; ?></option>
							    							<?php } ?>
							    						</select>
							    					</div>
							    				</div>
							    			</div>
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Kebiasaan Berobat</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-6">
							    						<select class="form-control" name="kebiasaan_berobat">
							    							<?php foreach($kebiasaan_berobat as $at){?>
							    							<option value="<?php echo $at->kebiasaan_berobat_id;?>"><?php echo $at->nama_kebiasaan_berobat; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="jenis_penyakit">
							    							<?php foreach($jenis_penyakit as $at){?>
							    							<option value="<?php echo $at->jenis_penyakit_id;?>"><?php echo $at->nama_jenis_penyakit; ?></option>
							    							<?php } ?>
							    						</select>
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
									    				<label>Akseptor KB</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-12">
							    						<?php foreach($akseptor_kb as $al){?>
														<div class="form-check">
															<input name="akseptor_kb[]" class="form-check-input" type="checkbox" value="<?php echo $al->acceptor_kb_id; ?>" id="acceptr_kb<?php echo $al->acceptor_kb_id; ?>">
															<label class="form-check-label" for="acceptr_kb<?php echo $al->acceptor_kb_id; ?>">
																<?php echo $al->nama_acceptor_kb; ?>
															</label>
														</div>
														<?php } ?>
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
							    						<select class="form-control" name="kualitas_ibu_hamil">
							    							<?php foreach($kualitas_ibu_hamil as $at){?>
							    							<option value="<?php echo $at->kualitas_ibu_hamil_id;?>"><?php echo $at->nama_kualitas_ibu_hamil; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="kualitas_bayi">
							    							<?php foreach($kualitas_bayi as $at){?>
							    							<option value="<?php echo $at->kualitas_bayi_id;?>"><?php echo $at->nama_kualitas_bayi; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="tempat_persalinan">
							    							<?php foreach($tempat_persalinan as $at){?>
							    							<option value="<?php echo $at->tempat_persalinan_id;?>"><?php echo $at->nama_tempat_persalinan; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="pertolongan_persalinan">
							    							<?php foreach($pertolongan_persalinan as $at){?>
							    							<option value="<?php echo $at->pertolongan_persalinan_id;?>"><?php echo $at->nama_pertolongan_persalinan; ?></option>
							    							<?php } ?>
							    						</select>
							    					</div>
							    				</div>
							    			</div>
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Cakupan Imunisasi</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-12">
							    						<?php foreach($cakupan_imunisasi as $al){?>
														<div class="form-check">
															<input name="cakupan_imunisasi[]" class="form-check-input" type="checkbox" value="<?php echo $al->cakupan_imunisasi_id; ?>" id="cakupan_imunisasi<?php echo $al->cakupan_imunisasi_id; ?>">
															<label class="form-check-label" for="cakupan_imunisasi<?php echo $al->cakupan_imunisasi_id; ?>">
																<?php echo $al->nama_cakupan_imunisasi; ?>
															</label>
														</div>
														<?php } ?>
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
							    						<select class="form-control" name="jenis_kelamin_balita">
							    							<option value="1">Laki-laki</option>
							    							<option value="2">Perempuan</option>
							    						</select>
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
							    						<select class="form-control" name="umur_balita">
							    							<?php foreach($umur_balita as $at){?>
							    							<option value="<?php echo $at->umur_balita_id;?>"><?php echo $at->nama_umur_balita; ?></option>
							    							<?php } ?>
							    						</select>
							    					</div>
							    				</div>
							    			</div>
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Tinggi Badan Balita</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-6">
							    						<select class="form-control" name="tinggi_badan">
							    							<?php foreach($tinggi_badan as $at){?>
							    							<option value="<?php echo $at->tinggi_badan_id;?>"><?php echo $at->nama_tinggi_badan; ?></option>
							    							<?php } ?>
							    						</select>
							    					</div>
							    				</div>
							    			</div>
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Berat Badan Bayi</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-6">
							    						<select class="form-control" name="berat_badan">
							    							<?php foreach($berat_badan as $at){?>
							    							<option value="<?php echo $at->berat_badan_id;?>"><?php echo $at->nama_berat_badan; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="kondisi_saat_pengukuran">
							    							<?php foreach($kondisi_saat_pengukuran as $at){?>
							    							<option value="<?php echo $at->kondisi_saat_pengukuran_id;?>"><?php echo $at->nama_kondisi_saat_pengukuran; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="status_gizi_balita">
							    							<?php foreach($status_gizi_balita as $at){?>
							    							<option value="<?php echo $at->status_gizi_balita_id;?>"><?php echo $at->nama_status_gizi_balita; ?></option>
							    							<?php } ?>
							    						</select>
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
							    						<select class="form-control" name="fasilitas_layanan_kesehatan">
							    							<?php foreach($fasilitas_layanan_kesehatan as $at){?>
							    							<option value="<?php echo $at->fasilitas_layanan_kesehatan_id;?>"><?php echo $at->nama_fasilitas_layanan_kesehatan; ?></option>
							    							<?php } ?>
							    						</select>
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
									    				<label>Aset Transportasi Umum</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-12">
							    						<?php foreach($aset_transportasi_umum as $al){?>
														<div class="form-check">
															<input name="aset_transportasi_umum[]" class="form-check-input" type="checkbox" value="<?php echo $al->aset_transportasi_umum_id; ?>" id="transportasi_umum<?php echo $al->aset_transportasi_umum_id; ?>">
															<label class="form-check-label" for="transportasi_umum<?php echo $al->aset_transportasi_umum_id; ?>">
																<?php echo $al->nama_aset_transportasi_umum; ?>
															</label>
														</div>
														<?php } ?>
							    					</div>
							    				</div>
							    			</div>
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Aset Lembaga Pendidikan</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-12">
							    						<?php foreach($lembaga_pendidikan as $al){?>
														<div class="form-check">
															<input name="lembaga_pendidikan[]" class="form-check-input" type="checkbox" value="<?php echo $al->lembaga_pendidikan_id; ?>" id="lembaga_pendidikan<?php echo $al->lembaga_pendidikan_id; ?>">
															<label class="form-check-label" for="lembaga_pendidikan<?php echo $al->lembaga_pendidikan_id; ?>">
																<?php echo $al->nama_lembaga_pendidikan; ?>
															</label>
														</div>
														<?php } ?>
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
							    					<div class="col-sm-12">
							    						<?php foreach($aset_sarana_produksi as $al){?>
														<div class="form-check">
															<input name="aset_sarana_produksi[]" class="form-check-input" type="checkbox" value="<?php echo $al->aset_sarana_produksi_id; ?>" id="aset_sarana_produksi<?php echo $al->aset_sarana_produksi_id; ?>">
															<label class="form-check-label" for="aset_sarana_produksi<?php echo $al->aset_sarana_produksi_id; ?>">
																<?php echo $al->nama_aset_sarana_produksi; ?>
															</label>
														</div>
														<?php } ?>
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
							    					<div class="col-sm-12">
							    						<input type="text" class="form-control" name="nama_pendata">
							    					</div>
							    				</div>
							    			</div>
							    		</div>
							    		<div class="col-12">
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Pekerjaan</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-12">
							    						<input type="text" class="form-control" name="pekerjaan_pendata">
							    					</div>
							    				</div>
							    			</div>
							    		</div>
							    		<div class="col-12">
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Jabatan</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-12">
							    						<input type="text" class="form-control" name="jabatan_pendata">
							    					</div>
							    				</div>
							    			</div>
							    		</div>
							    		<div class="col-12">
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>Sumber Data</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-12">
							    						<input type="text" class="form-control" name="sumber_data">
							    					</div>
							    				</div>
							    			</div>
							    		</div>
							    		<div class="col-12">
							    			<div class="form-group">
							    				<div class="row">
							    					<div class="col-12">
									    				<label>No Handphone</label>
							    					</div>
							    				</div>
							    				<div class="row">
							    					<div class="col-sm-12">
							    						<input type="text" class="form-control" name="nomor_handphone_pendata">
							    					</div>
							    				</div>
							    			</div>
							    		</div>
							    	</div>
							    </div>
							</div>

                		</div>
                	</form>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
<?= $this->endsection('main') ?>