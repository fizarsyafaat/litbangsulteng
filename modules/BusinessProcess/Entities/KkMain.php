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
use BusinessProcessRoot\Models\KkMainAsetIkanTangkap as KkMainAsetIkanTangkapModel;
use BusinessProcessRoot\Models\KkMainPariwisata as KkMainPariwisataModel;
use BusinessProcessRoot\Models\KkMainKesehatan as KkMainKesehatanModel;
use BusinessProcessRoot\Models\KkMainAsetTransportasiUmum as KkMainAsetTransportasiUmumModel;
use BusinessProcessRoot\Models\KkMainLembagaPendidikan as KkMainLembagaPendidikanModel;
use BusinessProcessRoot\Models\KkMainAsetProduksi as KkMainAsetProduksiModel;
use BusinessProcessRoot\Models\KkMainPersalinan as KkMainPersalinanModel;
use BusinessProcessRoot\Models\KkMainAcceptorKb as KkMainAcceptorKbModel;
use BusinessProcessRoot\Models\KkMainCakupanImunisasi as KkMainCakupanImunisasiModel;
use BusinessProcessRoot\Models\Pendata as PendataModel;

use BusinessProcessRoot\Entities\KkMainDataPekerjaanDanOrganisasi as KkMainDataPekerjaanDanOrganisasiEntities;
use BusinessProcessRoot\Entities\KkMainLembagaPemerintahan as KkMainLembagaPemerintahanEntities;
use BusinessProcessRoot\Entities\KkMainWajibPajak as KkMainWajibPajakEntities;
use BusinessProcessRoot\Entities\KkMainAsetTanah as KkMainAsetTanahEntities;
use BusinessProcessRoot\Entities\KkMainAsetRumah as KkMainAsetRumahEntities;
use BusinessProcessRoot\Entities\KkMainAsetPerkebunan as KkMainPerkebunanEntities;
use BusinessProcessRoot\Entities\KkMainAsetTanamanPangan as KkMainTanamanPanganEntities;
use BusinessProcessRoot\Entities\KkMainAsetBuahBuahan as KkMainBuahBuahanEntities;
use BusinessProcessRoot\Entities\KkMainAsetTanamanObat as KkMainTanamanObatEntities;
use BusinessProcessRoot\Entities\KkMainAsetKehutanan as KkMainKehutananEntities;
use BusinessProcessRoot\Entities\KkMainAsetTernak as KkMainAsetTernakEntities;
use BusinessProcessRoot\Entities\KkMainAsetIkan as KkMainAsetIkanEntities;
use BusinessProcessRoot\Entities\KkMainAsetIkanTangkap as KkMainAsetIkanTangkapEntities;
use BusinessProcessRoot\Entities\KkMainPariwisata as KkMainPariwisataEntities;
use BusinessProcessRoot\Entities\KkMainKesehatan as KkMainKesehatanEntities;
use BusinessProcessRoot\Entities\KkMainAsetTransportasiUmum as KkMainAsetTransportasiUmumEntities;
use BusinessProcessRoot\Entities\KkMainLembagaPendidikan as KkMainLembagaPendidikanEntities;
use BusinessProcessRoot\Entities\KkMainAsetProduksi as KkMainAsetProduksiEntities;
use BusinessProcessRoot\Entities\KkMainPersalinan as KkMainPersalinanEntities;
use BusinessProcessRoot\Entities\KkMainAcceptorKb as KkMainAcceptorKbEntities;
use BusinessProcessRoot\Entities\KkMainCakupanImunisasi as KkMainCakupanImunisasiEntities;
use BusinessProcessRoot\Entities\Pendata as PendataEntities;

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
		try{
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
		}catch(\Exception $e){
			$kdur_ent = new KkMainDataUtamaRespondenEntities;
			return $kdur_ent;
		}
	}

	public function get_pendata(){
		try{
			$kdur_model = new PendataModel();

			$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

			return $kdur_ent[0];
	    }catch(\Exception $e){
			$kdur_ent = new PendataEntities;
			return $kdur_ent;
	    }
	}

	public function get_kk_main_data_pekerjaan(){
		try{	
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
	    }catch(\Exception $e){
			$kdur_ent = new KkMainDataPekerjaanDanOrganisasiEntities;
			return $kdur_ent;
		}
	}

	public function get_kk_main_lembaga_pemerintahan(){
		try{
			$kdur_model = new KkMainLembagaPemerintahanModel();

			$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

			foreach($kdur_ent as $ke){
				$ke->lembaga_pemerintahan_string = ucwords(strtolower($ke->get_lembaga_pemerintahan_string()));
			}

			return $kdur_ent;
	    }catch(\Exception $e){
			$kdur_ent = new KkMainLembagaPemerintahanEntities;
			return $kdur_ent;
		}
	}

	public function get_kk_main_aset_transportasi_umum(){
		try{
			$kdur_model = new KkMainAsetTransportasiUmumModel();

			$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

			foreach($kdur_ent as $ke){
				$ke->transportasi_umum_string = ucwords(strtolower($ke->get_transportasi_umum_string()));
			}

			return $kdur_ent;
	    }catch(\Exception $e){
			$kdur_ent = new KkMainAsetTransportasiUmumEntities;
			return $kdur_ent;
		}
	}

	public function get_kk_main_aset_lembaga_pendidikan(){
		try{
			$kdur_model = new KkMainLembagaPendidikanModel();

			$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

			foreach($kdur_ent as $ke){
				$ke->lembaga_pendidikan_string = ucwords(strtolower($ke->get_lembaga_pendidikan_string()));
			}

			return $kdur_ent;
	    }catch(\Exception $e){
			$kdur_ent = new KkMainLembagaPendidikanEntities;
			return $kdur_ent;
		}
	}

	public function get_kk_main_acceptorkb(){
		try{	
			$kdur_model = new KkMainAcceptorKbModel();
			$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();
			foreach($kdur_ent as $ke){
				$ke->acceptorkb_string = ucwords(strtolower($ke->get_acceptorkb_string()));
			}

			return $kdur_ent;
		}catch(\Exception $e){
			$kdur_ent = new KkMainAcceptorKbEntities;
			return $kdur_ent;
		}
	}

	public function get_kk_main_cakupan_imunisasi(){
		try{	
			$kdur_model = new KkMainCakupanImunisasiModel();

			$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

			foreach($kdur_ent as $ke){
				$ke->cakupan_imunisasi_string = ucwords(strtolower($ke->get_cakupan_imunisasi_string()));
			}

			return $kdur_ent;
	    }catch(\Exception $e){
			$kdur_ent = new KkMainCakupanImunisasiEntities;
			return $kdur_ent;
		}
	}

	

	public function get_kk_main_aset_produksi(){
		try{
			$kdur_model = new KkMainAsetProduksiModel();

			$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

			foreach($kdur_ent as $ke){
				$ke->aset_produksi_string = ucwords(strtolower($ke->get_aset_produksi_string()));
			}

			return $kdur_ent;
	    }catch(\Exception $e){
			$kdur_ent = new KkMainAsetProduksiEntities;
			return $kdur_ent;
		}
	}

	public function get_kk_main_wajib_pajak(){
		try{
			$kdur_model = new KkMainWajibPajakModel();

			$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

			foreach($kdur_ent as $ke){
				$ke->wajib_pajak_retribusi_string = ucwords(strtolower($ke->get_wajib_pajak_retribusi_string()));
			}

			return $kdur_ent;
	    }catch(\Exception $e){
			$kdur_ent = new KkMainWajibPajakEntities;
			return $kdur_ent;
		}
	}

	public function get_kk_main_aset_tanah(){
		try{
			$kdur_model = new KkMainAsetTanahModel();

			$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

			foreach($kdur_ent as $ke){
				$ke->aset_tanah_string = ucwords(strtolower($ke->get_aset_tanah_string()));
			}

			return $kdur_ent;
	    }catch(\Exception $e){
			$kdur_ent = new KkMainAsetTanahEntities;
			return $kdur_ent;
		}
	}

	public function get_kk_main_aset_rumah(){
		try{
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
	    }catch(\Exception $e){
			$kdur_ent = new KkMainAsetRumahEntities;
			return $kdur_ent;
		}
	}

	public function get_kk_main_aset_perkebunan(){
		try{
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
	    }catch(\Exception $e){
			$kdur_ent = new KkMainPerkebunanEntities;
			return $kdur_ent;
		}
	}


	public function get_kk_main_aset_tanaman_pangan(){
		try{
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
	    }catch(\Exception $e){
			$kdur_ent = new KkMainTanamanPanganEntities;
			return $kdur_ent;
		}
	}


	public function get_kk_main_aset_buah_buahan(){
		try{
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
		}catch(\Exception $e){
			$kdur_ent = new KkMainBuahBuahanEntities;
			return $kdur_ent;
		}
	}

	public function get_kk_main_aset_tanaman_obat(){
		try{
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
		}catch(\Exception $e){
			$kdur_ent = new KkMainTanamanObatEntities;
			return $kdur_ent;
		}
	}

	public function get_kk_main_aset_kehutanan(){
		try{
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
	    }catch(\Exception $e){
			$kdur_ent = new KkMainKehutananEntities;
			return $kdur_ent;
		}
	}

	public function get_kk_main_aset_ternak(){
		try{
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
	    }catch(\Exception $e){
			$kdur_ent = new KkMainAsetTernakEntities;
			return $kdur_ent;
		}
	}

	public function get_kk_main_aset_ikan(){
		try{	
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
	    }catch(\Exception $e){
			$kdur_ent = new KkMainAsetIkanEntities;
			return $kdur_ent;
		}
	}

	public function get_kk_main_aset_ikan_tangkap(){
		try{
			$kdur_model = new KkMainAsetIkanTangkapModel();

			$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

			foreach($kdur_ent as $ke){
				$ke->alat_tangkap_media_ikan_string = ucwords(strtolower($ke->get_alat_tangkap_media_ikan_string()));
				$ke->jumlah_unit_string = ucwords(strtolower($ke->get_jumlah_unit_string()));
				
			}
			return $kdur_ent;
	    }catch(\Exception $e){
			$kdur_ent = new KkMainAsetIkanTangkapEntities;
			return $kdur_ent;
		}
	}

	public function get_kk_main_pariwisata(){
		try{
			$kdur_model = new KkMainPariwisataModel();

			$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

			foreach($kdur_ent as $ke){
				$ke->jumlah_aktivitas_wisata_bulanan_string = ucwords(strtolower($ke->get_jumlah_aktivitas_wisata_bulanan_string()));
				$ke->jumlah_biaya_wisata_bulanan_string = ucwords(strtolower($ke->get_jumlah_biaya_wisata_bulanan_string()));
				$ke->lokasi_objek_wisata_string = ucwords(strtolower($ke->get_lokasi_objek_wisata_string()));
				$ke->daya_tarik_wisata_palu_string = ucwords(strtolower($ke->get_daya_tarik_wisata_palu_string()));
				$ke->pengelolaan_pariwisata_palu_string = ucwords(strtolower($ke->get_pengelolaan_pariwisata_palu_string()));
				
			}
			return $kdur_ent;
	    }catch(\Exception $e){
			$kdur_ent = new KkMainPariwisataEntities;
			return $kdur_ent;
		}
	}

	public function get_kk_main_kesehatan(){
		try{
			$kdur_model = new KkMainKesehatanModel();

			$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

			foreach($kdur_ent as $ke){
			$ke->penderita_sakit_kelainan_string = ucwords(strtolower($ke->get_penderita_sakit_kelainan_string()));
			$ke->perilaku_hidup_bersih_string = ucwords(strtolower($ke->get_perilaku_hidup_bersih_string()));
			$ke->pola_makan_string = ucwords(strtolower($ke->get_pola_makan_string()));
			$ke->kebiasaan_berobat_string = ucwords(strtolower($ke->get_kebiasaan_berobat_string()));
			$ke->jenis_penyakit_string = ucwords(strtolower($ke->get_jenis_penyakit_string()));
			}
			return $kdur_ent;
	    }catch(\Exception $e){
			$kdur_ent = new KkMainKesehatanEntities;
			return $kdur_ent;
		}
	}

	public function get_kk_main_persalinan(){
		try{
			$kdur_model = new KkMainPersalinanModel();

			$kdur_ent = $kdur_model->where("kk_id",$this->attributes['kk_id'])->findAll();

			foreach($kdur_ent as $ke){
				$ke->kualitas_ibu_hamil_string = ucwords(strtolower($ke->get_kualitas_ibu_hamil_string()));
				$ke->kualitas_bayi_string = ucwords(strtolower($ke->get_kualitas_bayi_string()));
				$ke->tempat_persalinan_string = ucwords(strtolower($ke->get_tempat_persalinan_string()));
				$ke->pertolongan_persalinan_string = ucwords(strtolower($ke->get_pertolongan_persalinan_string()));
				$ke->fasilitas_layanan_kesehatan_string = ucwords(strtolower($ke->get_fasilitas_layanan_kesehatan_string()));
				$ke->umur_balita_string = ucwords(strtolower($ke->get_umur_balita_string()));
				$ke->berat_badan_string = ucwords(strtolower($ke->get_berat_badan_string()));
				$ke->tinggi_badan_string = ucwords(strtolower($ke->get_tinggi_badan_string()));
				$ke->kondisi_saat_pengukuran_string = ucwords(strtolower($ke->get_kondisi_saat_pengukuran_string()));
				$ke->status_gizi_balita_string = ucwords(strtolower($ke->get_status_gizi_balita_string()));		
				$ke->jenis_kelamin_balita_string = ucwords(strtolower($ke->get_jenis_kelamin_balita_string()));
			}

			return $kdur_ent;
	    }catch(\Exception $e){
			$kdur_ent = new KkMainPersalinanEntities;
			return $kdur_ent;
		}
	}		

	public function get_kelurahan(){
		try{  
			$klrh_model = new KelurahanModel();

			$klrh_ent = $klrh_model->find($this->attributes['kelurahan']);

			return $klrh_ent;
	    }catch(\Exception $e){
			$kdur_ent = new KelurahanEntities;
			return $kdur_ent;
		}
	}

	public function obtain_alamat_lengkap(){
		$alamat_a =  $this->attributes['alamat'] . ", " . " RT " . $this->attributes['rt'] . " RW " . $this->attributes['rt'];
		$alamat_b = $this->get_kelurahan()->get_full_address();

		return $alamat_a . " " . $alamat_b;
	}
}
