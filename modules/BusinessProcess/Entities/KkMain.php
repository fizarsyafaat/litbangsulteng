<?php

namespace BusinessProcessRoot\Entities;

use CodeIgniter\Entity;
use BusinessProcessRoot\Models\Kelurahan as KelurahanModel;
use BusinessProcessRoot\Models\KkMainDataUtamaResponden as KkMainDataUtamaRespondenModel;
use BusinessProcessRoot\Models\KkMainDataPekerjaanDanOrganisasi as KkMainDataPekerjaanDanOrganisasiModel;
use BusinessProcessRoot\Models\KkMainLembagaPemerintahan as KkMainLembagaPemerintahanModel;
use BusinessProcessRoot\Models\KkMainWajibPajak as KkMainWajibPajakModel;
use BusinessProcessRoot\Models\KkMainAsetTanah as KkMainAsetTanahModel;
use BusinessProcessRoot\Models\KkMainAsetRumah as KkMainAsetRumahModel;
use BusinessProcessRoot\Models\KkMainAsetPerkebunan as KkMainPerkebunanModel;
use BusinessProcessRoot\Models\KkMainAsetTanamanPangan as KkMainTanamanPanganModel;
use BusinessProcessRoot\Models\KkMainAsetBuahBuahan as KkMainBuahBuahanModel;
use BusinessProcessRoot\Models\KkMainAsetTanamanObat as KkMainTanamanObatModel;
use BusinessProcessRoot\Models\KkMainAsetKehutanan as KkMainKehutananModel;
use BusinessProcessRoot\Models\KkMainAsetTernak as KkMainAsetTernakModel;
use BusinessProcessRoot\Models\KkMainAsetIkan as KkMainAsetIkanModel;

class KkMain extends Entity
{
	protected $kk_id;
	protected $kode_pum;
	protected $no_kk;
	protected $alamat;
	protected $rt;
	protected $rw;
	protected $kelurahan;
	protected $kode_pos;
	protected $no_k;
	protected $tanggal_dikeluarkan ;
	protected $pihak_mengeluarkan;
	protected $kepala_keluarga;
	protected $data_collection_time;

	//GET ALL KK MAIN
	public function get_kk_main_data_responden(){
		$kdur_model = new KkMainDataUtamaRespondenModel();

		$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

		$kdur_ent[0]->status_kemiskinan_string = ucwords(strtolower($kdur_ent[0]->get_status_kemiskinan_string()));
		$kdur_ent[0]->pengguna_bpjs_string = ucwords(strtolower($kdur_ent[0]->get_pengguna_bpjs_string()));
		$kdur_ent[0]->jenis_jaminan_sosial_string = strtoupper(strtolower($kdur_ent[0]->get_jenis_jaminan_sosial_string()));
		$kdur_ent[0]->lama_waktu_string = ucwords(strtolower($kdur_ent[0]->get_lama_waktu_string()));
		$kdur_ent[0]->wajib_iuran_string = ucwords(strtolower($kdur_ent[0]->get_wajib_iuran_string()));
		$kdur_ent[0]->cacat_fisik_string = ucwords(strtolower($kdur_ent[0]->get_cacat_fisik_string()));
		$kdur_ent[0]->cacat_mental_string = ucwords(strtolower($kdur_ent[0]->get_cacat_mental_string()));
		$kdur_ent[0]->status_domisili_string = ucwords(strtolower($kdur_ent[0]->get_status_domisili_string()));
		$kdur_ent[0]->golongan_darah_string = ucwords(strtolower($kdur_ent[0]->get_golongan_darah_string()));
		$kdur_ent[0]->status_perkawinan_string = ucwords(strtolower($kdur_ent[0]->get_status_perkawinan_string()));
		$kdur_ent[0]->agama_string = ucwords(strtolower($kdur_ent[0]->get_agama_string()));
		$kdur_ent[0]->hubungan_dengan_keluarga_string = ucwords(strtolower($kdur_ent[0]->get_hubungan_dengan_kepala_keluarga_string()));
		$kdur_ent[0]->pendidikan_terakhir_string = ucwords(strtolower($kdur_ent[0]->get_pendidikan_terakhir_string()));
		$kdur_ent[0]->jenis_kelamin_responden_string = ucwords(strtolower($kdur_ent[0]->get_jenis_kelamin_responden_string()));
		$kdur_ent[0]->kewarganegaraan_string = ucwords(strtolower($kdur_ent[0]->get_kewarganegaraan_string()));

		return $kdur_ent[0];
	}

	public function get_kk_main_data_pekerjaan(){
		$kdur_model = new KkMainDataPekerjaanDanOrganisasiModel();

		$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

		$kdur_ent[0]->mata_pencaharian_pokok_string = ucwords(strtolower($kdur_ent[0]->get_mata_pencaharian_pokok_string()));
		$kdur_ent[0]->pengeluaran_per_bulan_string = ucwords(strtolower($kdur_ent[0]->get_pengeluaran_per_bulan_string()));
		$kdur_ent[0]->penghasilan_per_bulan_string = ucwords(strtolower($kdur_ent[0]->get_penghasilan_per_bulan_string()));
		$kdur_ent[0]->laba_per_bulan_string = ucwords(strtolower($kdur_ent[0]->get_laba_per_bulan_string()));
		$kdur_ent[0]->modal_string = ucwords(strtolower($kdur_ent[0]->get_modal_string()));
		$kdur_ent[0]->sumber_modal_string = ucwords(strtolower($kdur_ent[0]->get_sumber_modal_string()));
		$kdur_ent[0]->aktivitas_ekonomi_string = ucwords(strtolower($kdur_ent[0]->get_aktivitas_ekonomi_string()));
		$kdur_ent[0]->lembaga_kemasyarakatan_string = ucwords(strtolower($kdur_ent[0]->get_lembaga_kemasyarakatan_string()));

		return $kdur_ent[0];
	}

	public function get_kk_main_lembaga_pemerintahan(){
		$kdur_model = new KkMainLembagaPemerintahanModel();

		$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

		foreach($kdur_ent as $ke){
			$ke->lembaga_pemerintahan_string = ucwords(strtolower($ke->get_lembaga_pemerintahan_string()));
		}

		return $kdur_ent;
	}

	public function get_kk_main_wajib_pajak(){
		$kdur_model = new KkMainWajibPajakModel();

		$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

		foreach($kdur_ent as $ke){
			$ke->wajib_pajak_retribusi_string = ucwords(strtolower($ke->get_wajib_pajak_retribusi_string()));
		}

		return $kdur_ent;
	}

	public function get_kk_main_aset_tanah(){
		$kdur_model = new KkMainAsetTanahModel();

		$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

		foreach($kdur_ent as $ke){
			$ke->aset_tanah_string = ucwords(strtolower($ke->get_aset_tanah_string()));
		}

		return $kdur_ent;
	}

	public function get_kk_main_aset_rumah(){
		$kdur_model = new KkMainAsetRumahModel();

		$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

		foreach($kdur_ent as $ke){
			$ke->sumber_air_minum_string = ucwords(strtolower($ke->get_sumber_air_minum_string()));
			$ke->ket_sumber_air_minum_string = ucwords(strtolower($ke->get_ket_sumber_air_minum_string()));
			$ke->status_kepemilikan_rumah_string = ucwords(strtolower($ke->get_status_kepemilikan_rumah_string()));
			$ke->sarana_mck_string = ucwords(strtolower($ke->get_sarana_mck_string()));
			$ke->daya_listrik_string = ucwords(strtolower($ke->get_daya_listrik_string()));
			$ke->luas_pekarangan_rumah_string = ucwords(strtolower($ke->get_luas_pekarangan_rumah_string()));
			$ke->pemanfaatan_danau_dkk_string = ucwords(strtolower($ke->get_pemanfaatan_danau_dkk_string()));
			$ke->dinding_rumah_string = ucwords(strtolower($ke->get_dinding_rumah_string()));
			$ke->atap_rumah_string = ucwords(strtolower($ke->get_atap_rumah_string()));
			$ke->lantai_rumah_string = ucwords(strtolower($ke->get_lantai_rumah_string()));
		}

		return $kdur_ent;
	}

	public function get_kk_main_aset_perkebunan(){
		$kdur_model = new KkMainPerkebunanModel();

		$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

		foreach($kdur_ent as $ke){
			$ke->luas_panen_string = ucwords(strtolower($ke->get_luas_panen_string()));
			$ke->jenis_komoditas_string = ucwords(strtolower($ke->get_jenis_komoditas_string()));
			$ke->jumlah_produksi_string = ucwords(strtolower($ke->get_jumlah_produksi_string()));
			$ke->hasil_pemasaran_string = ucwords(strtolower($ke->get_hasil_pemasaran_string()));
			$ke->jumlah_pohon_string = ucwords(strtolower($ke->get_jumlah_pohon_string()));
			$ke->jenis_bibit_string = ucwords(strtolower($ke->get_jenis_bibit_string()));
			$ke->pestisida_string = ucwords(strtolower($ke->get_pestisida_string()));
			$ke->pupuk_organik_string = ucwords(strtolower($ke->get_pupuk_organik_string()));
			$ke->pupuk_pabrik_string = ucwords(strtolower($ke->get_pupuk_pabrik_string()));
		}

		return $kdur_ent;
	}


	public function get_kk_main_aset_tanaman_pangan(){
		$kdur_model = new KkMainTanamanPanganModel();

		$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

		foreach($kdur_ent as $ke){
			$ke->jenis_komoditas_pangan_string = ucwords(strtolower($ke->get_jenis_komoditas_pangan_string()));
			$ke->luas_panen_pangan_string = ucwords(strtolower($ke->get_luas_panen_pangan_string()));
			$ke->jumlah_produksi_pangan_string = ucwords(strtolower($ke->get_jumlah_produksi_pangan_string()));
			$ke->hasil_pemasaran_pangan_string = ucwords(strtolower($ke->get_hasil_pemasaran_pangan_string()));
			$ke->jumlah_pohon_pangan_string = ucwords(strtolower($ke->get_jumlah_pohon_pangan_string()));
			$ke->jenis_bibit_pangan_string = ucwords(strtolower($ke->get_jenis_bibit_pangan_string()));
			$ke->pestisida_pangan_string = ucwords(strtolower($ke->get_pestisida_pangan_string()));
			$ke->pupuk_organik_pangan_string = ucwords(strtolower($ke->get_pupuk_organik_pangan_string()));
			$ke->pupuk_pabrik_pangan_string = ucwords(strtolower($ke->get_pupuk_pabrik_pangan_string()));
		}
	return $kdur_ent;
	}


	public function get_kk_main_aset_buah_buahan(){
		$kdur_model = new KkMainBuahBuahanModel();

		$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

		foreach($kdur_ent as $ke){
			$ke->jenis_komoditas_buah_buahan_string = ucwords(strtolower($ke->get_jenis_komoditas_buah_buahan_string()));
			$ke->luas_panen_buah_string = ucwords(strtolower($ke->get_luas_panen_buah_string()));
			$ke->jumlah_produksi_buah_string = ucwords(strtolower($ke->get_jumlah_produksi_buah_string()));
			$ke->hasil_pemasaran_buah_string = ucwords(strtolower($ke->get_hasil_pemasaran_buah_string()));
			$ke->jumlah_pohon_buah_string = ucwords(strtolower($ke->get_jumlah_pohon_buah_string()));
			$ke->jenis_bibit_buah_string = ucwords(strtolower($ke->get_jenis_bibit_buah_string()));
			$ke->pestisida_buah_string = ucwords(strtolower($ke->get_pestisida_buah_string()));
			$ke->pupuk_organik_buah_string = ucwords(strtolower($ke->get_pupuk_organik_buah_string()));
			$ke->pupuk_pabrik_buah_string = ucwords(strtolower($ke->get_pupuk_pabrik_buah_string()));
		}
	return $kdur_ent;
	}

	public function get_kk_main_aset_tanaman_obat(){
		$kdur_model = new KkMainTanamanObatModel();

		$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

		foreach($kdur_ent as $ke){
			$ke->jenis_komoditas_tanaman_obat_string = ucwords(strtolower($ke->get_jenis_komoditas_tanaman_obat_string()));
			$ke->luas_panen_obat_string = ucwords(strtolower($ke->get_luas_panen_obat_string()));
			$ke->jumlah_produksi_obat_string = ucwords(strtolower($ke->get_jumlah_produksi_obat_string()));
			$ke->hasil_pemasaran_obat_string = ucwords(strtolower($ke->get_hasil_pemasaran_obat_string()));
			$ke->jumlah_pohon_obat_string = ucwords(strtolower($ke->get_jumlah_pohon_obat_string()));
			$ke->jenis_bibit_obat_string = ucwords(strtolower($ke->get_jenis_bibit_obat_string()));
			$ke->pestisida_obat_string = ucwords(strtolower($ke->get_pestisida_obat_string()));
			$ke->pupuk_organik_obat_string = ucwords(strtolower($ke->get_pupuk_organik_obat_string()));
			$ke->pupuk_pabrik_obat_string = ucwords(strtolower($ke->get_pupuk_pabrik_obat_string()));
		
		}
	return $kdur_ent;
	}

	public function get_kk_main_aset_kehutanan(){
		$kdur_model = new KkMainKehutananModel();

		$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

		foreach($kdur_ent as $ke){
			$ke->jenis_komoditas_kehutanan_string = ucwords(strtolower($ke->get_jenis_komoditas_kehutanan_string()));
			$ke->luas_panen_kehutangan_string = ucwords(strtolower($ke->get_luas_panen_kehutangan_string()));
			$ke->jumlah_produksi_kehutangan_string = ucwords(strtolower($ke->get_jumlah_produksi_kehutangan_string()));
			$ke->hasil_pemasaran_kehutangan_string = ucwords(strtolower($ke->get_hasil_pemasaran_kehutangan_string()));
			$ke->jumlah_pohon_kehutangan_string = ucwords(strtolower($ke->get_jumlah_pohon_kehutangan_string()));
			$ke->jenis_bibit_kehutangan_string = ucwords(strtolower($ke->get_jenis_bibit_kehutangan_string()));
			$ke->pestisida_kehutangan_string = ucwords(strtolower($ke->get_pestisida_kehutangan_string()));
			$ke->pupuk_organik_kehutangan_string = ucwords(strtolower($ke->get_pupuk_organik_kehutangan_string()));
			$ke->pupuk_pabrik_kehutangan_string = ucwords(strtolower($ke->get_pupuk_pabrik_kehutangan_string()));
		}
	return $kdur_ent;
	}

		public function get_kk_main_aset_ternak(){
		$kdur_model = new KkMainAsetTernakModel();

		$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

		foreach($kdur_ent as $ke){
			$ke->jenis_ternak_string = ucwords(strtolower($ke->get_jenis_ternak_string()));
			$ke->luas_kandang_string = ucwords(strtolower($ke->get_luas_kandang_string()));
			$ke->jumlah_ekor_string = ucwords(strtolower($ke->get_jumlah_ekor_string()));
			$ke->jenis_hasil_ternak_string = ucwords(strtolower($ke->get_jenis_hasil_ternak_string()));
			$ke->jumlah_produksi_hasil_ternak_string = ucwords(strtolower($ke->get_jumlah_produksi_hasil_ternak_string()));
			$ke->pemasaran_hasil_ternak_string = ucwords(strtolower($ke->get_pemasaran_hasil_ternak_string()));
			$ke->jenis_pakan_ternak_string = ucwords(strtolower($ke->get_jenis_pakan_ternak_string()));
		}
		return $kdur_ent;
	}

	public function get_kk_main_aset_ikan(){
		$kdur_model = new KkMainAsetIkanModel();

		$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

		foreach($kdur_ent as $ke){
			$ke->komoditas_ikan_string = ucwords(strtolower($ke->get_komoditas_ikan_string()));
			$ke->luas_panen_ikan_string = ucwords(strtolower($ke->get_luas_panen_ikan_string()));
			$ke->jumlah_produksi_ikan_string = ucwords(strtolower($ke->get_jumlah_produksi_ikan_string()));
			$ke->hasil_pemasaran_ikan_string = ucwords(strtolower($ke->get_hasil_pemasaran_ikan_string()));
			$ke->jumlah_ikan_string = ucwords(strtolower($ke->get_jumlah_ikan_string()));
			$ke->jenis_bibit_ikan_string = ucwords(strtolower($ke->get_jenis_bibit_ikan_string()));
			$ke->jenis_pakan_ikan_string = ucwords(strtolower($ke->get_jenis_pakan_ikan_string()));
		}
		return $kdur_ent;
	}

		
	public function get_kelurahan(){
		$klrh_model = new KelurahanModel();

		$klrh_ent = $klrh_model->find($this->attributes['kelurahan']);

		return $klrh_ent;
	}

	public function obtain_alamat_lengkap(){
		$alamat_a =  $this->attributes['alamat'] . ", " . " RT " . $this->attributes['rt'] . " RW " . $this->attributes['rt'];
		$alamat_b = $this->get_kelurahan()->get_full_address();

		return $alamat_a . " " . $alamat_b;
	}
}
