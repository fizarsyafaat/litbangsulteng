<?php

//modules\Home\Homepage\Controllers\ViewCont;

namespace AdminpageFuncCont\HTTP;

use AdminTemplateFuncCont\DefaultAdminFuncController;
use BusinessProcessRoot\Models\User as UserModel;

use BusinessProcessRoot\Entities\KkMain as KkMainEntities;
use BusinessProcessRoot\Entities\KkMainAsetPerkebunan as KkMainPerkebunanEntities;
use BusinessProcessRoot\Entities\KkMainAsetBuahBuahan as KkMainBuahBuahanEntities;
use BusinessProcessRoot\Entities\KkMainAsetTanamanObat as KkMainTanamanObatEntities;
use BusinessProcessRoot\Entities\KkMainAsetTanamanPangan as KkMainTanamanPanganEntities;
use BusinessProcessRoot\Entities\KkMainAsetKehutanan as KkMainKehutananEntities;

use BusinessProcessRoot\Entities\KkMainAcceptorKb as KkMainAcceptorKbEntities;

use BusinessProcessRoot\Entities\KkMainAsetTambang as KkMainAsetTambangEntities;
use BusinessProcessRoot\Entities\KkMainAsetProduksi as KkMainAsetProduksiEntities;
use BusinessProcessRoot\Entities\KkMainAsetTanah as KkMainAsetTanahEntities;
use BusinessProcessRoot\Entities\KkMainAsetTernak as KkMainAsetTernakEntities;

use BusinessProcessRoot\Entities\KkMainCakupanImunisasi as KkMainCakupanImunisasiEntities;
use BusinessProcessRoot\Entities\KkMainDataPekerjaanDanOrganisasi as KkMainDataPekerjaanDanOrganisasiEntities;
use BusinessProcessRoot\Entities\KkMainDataUtamaResponden as KkMainDataUtamaRespondenEntities;
use BusinessProcessRoot\Entities\KkMainKesehatan as KkMainKesehatanEntities;
use BusinessProcessRoot\Entities\KkMainAsetTransportasiUmum as KkMainAsetTransportasiUmumEntities;
use BusinessProcessRoot\Entities\KkMainLembagaPemerintahan as KkMainLembagaPemerintahanEntities;
use BusinessProcessRoot\Entities\KkMainLembagaPendidikan as KkMainLembagaPendidikanEntities;

use BusinessProcessRoot\Entities\KkMainPariwisata as KkMainPariwisataEntities;
use BusinessProcessRoot\Entities\KkMainPersalinan as KkMainPersalinanEntities;
use BusinessProcessRoot\Entities\KkMainSumberModal as KkMainSumberModalEntities;
use BusinessProcessRoot\Entities\KkMainWajibPajak as KkMainWajibPajakEntities;


use BusinessProcessRoot\Entities\Pendata as PendataEntities;

use BusinessProcessRoot\Entities\KkMainAsetIkan as KkMainAsetIkanEntities;
use BusinessProcessRoot\Entities\KkMainAsetIkanTangkap as KkMainAsetIkanTangkapEntities;

use BusinessProcessRoot\Entities\KkMainAsetRumah as KkMainAsetRumahEntities;
use BusinessProcessRoot\Entities\KkMainAsetLainnya as KkMainAsetLainnyaEntities;

use BusinessProcessRoot\Models\KkMain as KkMainModel;
use BusinessProcessRoot\Models\KkMainAsetPerkebunan as KkMainPerkebunanModel;
use BusinessProcessRoot\Models\KkMainAsetBuahBuahan as KkMainBuahBuahanModel;
use BusinessProcessRoot\Models\KkMainAsetTanamanObat as KkMainTanamanObatModel;
use BusinessProcessRoot\Models\KkMainAsetTanamanPangan as KkMainTanamanPanganModel;
use BusinessProcessRoot\Models\KkMainAsetKehutanan as KkMainKehutananModel;

use BusinessProcessRoot\Models\KkMainAcceptorKb as KkMainAcceptorKbModel;

use BusinessProcessRoot\Models\KkMainAsetTambang as KkMainAsetTambangModel;
use BusinessProcessRoot\Models\KkMainAsetProduksi as KkMainAsetProduksiModel;
use BusinessProcessRoot\Models\KkMainAsetTanah as KkMainAsetTanahModel;
use BusinessProcessRoot\Models\KkMainAsetTernak as KkMainAsetTernakModel;

use BusinessProcessRoot\Models\KkMainCakupanImunisasi as KkMainCakupanImunisasiModel;
use BusinessProcessRoot\Models\KkMainDataPekerjaanDanOrganisasi as KkMainDataPekerjaanDanOrganisasiModel;
use BusinessProcessRoot\Models\KkMainDataUtamaResponden as KkMainDataUtamaRespondenModel;
use BusinessProcessRoot\Models\KkMainKesehatan as KkMainKesehatanModel;
use BusinessProcessRoot\Models\KkMainAsetTransportasiUmum as KkMainAsetTransportasiUmumModel;
use BusinessProcessRoot\Models\KkMainLembagaPemerintahan as KkMainLembagaPemerintahanModel;
use BusinessProcessRoot\Models\KkMainLembagaPendidikan as KkMainLembagaPendidikanModel;

use BusinessProcessRoot\Models\KkMainPariwisata as KkMainPariwisataModel;
use BusinessProcessRoot\Models\KkMainPersalinan as KkMainPersalinanModel;
use BusinessProcessRoot\Models\KkMainSumberModal as KkMainSumberModalModel;
use BusinessProcessRoot\Models\KkMainWajibPajak as KkMainWajibPajakModel;

use BusinessProcessRoot\Models\Pendata as PendataModel;
use BusinessProcessRoot\Models\Kelurahan as KelurahanModel;

use BusinessProcessRoot\Models\KkMainAsetIkan as KkMainAsetIkanModel;
use BusinessProcessRoot\Models\KkMainAsetIkanTangkap as KkMainAsetIkanTangkapModel;

use BusinessProcessRoot\Models\KkMainAsetRumah as KkMainAsetRumahModel;
use BusinessProcessRoot\Models\KkMainAsetLainnya as KkMainAsetLainnyaModel;

//INSERT DATA

class Dashboard extends DefaultAdminFuncController{
	
	public function __construct(){
		parent::__construct();
	}

	public function insert_data(){
		$request = $this->request;
		
		$kk_main_model = new KkMainModel();
		$kk_main_perkebunan_model = new KkMainPerkebunanModel();
		$kk_main_buah_buahan_model = new KkMainBuahBuahanModel();
		$kk_main_tanaman_obat_model = new KkMainTanamanObatModel();
		$kk_main_tanaman_pangan_model = new KkMainTanamanPanganModel();
		$kk_main_kehutanan_model = new KkMainKehutananModel();
		$kk_main_aset_rumah_model = new KkMainAsetRumahModel();
		$kk_main_aset_lainnya_model = new KkMainAsetLainnyaModel();
		$kk_main_aset_ikan_model = new KkMainAsetIkanModel();
		$kk_main_aset_ikan_tangkap_model = new KkMainAsetIkanTangkapModel();
		$pendata_model = new PendataModel();
		$kk_main_acceptr_kb_model = new KkMainAcceptorKbModel();
		$kk_main_aset_tambang_model = new KkMainAsetTambangModel();
		$kk_main_aset_produksi_model = new KkMainAsetProduksiModel();
		$kk_main_aset_tanah_model = new KkMainAsetTanahModel();
		$kk_main_aset_ternak_model = new KkMainAsetTernakModel();
		$kk_main_cakupan_imunisasi_model = new KkMainCakupanImunisasiModel();
		$kk_main_data_pekerjaan_dan_organisasi_model = new KkMainDataPekerjaanDanOrganisasiModel();
		$kk_main_data_utama_responden_model = new KkMainDataUtamaRespondenModel();
		$kk_main_kesehatan_model = new KkMainKesehatanModel();
		$kk_main_aset_transportasi_umum_model = new KkMainAsetTransportasiUmumModel();
		$kk_main_lembaga_pemerintahan_model = new KkMainLembagaPemerintahanModel();
		$kk_main_lembaga_pendidikan_model = new KkMainLembagaPendidikanModel();
		$kk_main_pariwisata_model = new KkMainPariwisataModel();
		$kk_main_persalinan_model = new KkMainPersalinanModel();
		$kk_main_sumber_modal_model = new KkMainSumberModalModel();
		$kk_main_wajib_pajak_model = new KkMainWajibPajakModel();

		$kk_main_ent = new KkMainEntities();

		$kk_main_ent->alamat = $request->getPost('alamat');
		$kk_main_ent->kode_pum = $request->getPost('kode_pum');

/* 
		$kk_main_ent->no_kk = $request->getPost('no_kk') . (rand(10,100000000));;
*/ 

// 
		$kk_main_ent->no_kk = $request->getPost('no_kk');
// 

		$kk_main_ent->rt = $request->getPost('rt');
		$kk_main_ent->rw = $request->getPost('rw');
//

/*
		$klmodel = new KelurahanModel();
		$kelurahan = $klmodel->where('id_kelurahan >', 1)
		    ->orderBy('rand()')
		    ->first();

		$kk_main_ent->kelurahan = $kelurahan->id_kelurahan;
*/

		$kk_main_ent->kelurahan = $request->getPost('kelurahan');

		$kk_main_ent->kode_pos = "0";
		$kk_main_ent->data_collection_time = $request->getPost('tanggal_pendataan') . " " . $request->getPost('waktu_pendataan');

/*
		$kk_main_ent->kepala_keluarga = $request->getPost('kepala_keluarga') . rand(10,10000000);
*/ 
		$kk_main_ent->kepala_keluarga = $request->getPost('kepala_keluarga');

		$kk_main_model->save($kk_main_ent);

		//get_kk_main_id
		$main_id = $kk_main_model->getInsertID();

		/*ASET TANAMAN{ */

			//perkebunan
			$komoditas_perkebunan = $request->getPost('komoditas_perkebunan');

			foreach($komoditas_perkebunan as $kp => $value){
				$kmpe = new KkMainPerkebunanEntities();
				if($value != 1){
					$kmpe->kk_id = $main_id;
					$kmpe->jenis_komoditas = $request->getPost('komoditas_perkebunan')[$kp];
					$kmpe->luas_panen = $request->getPost('luas_lahan_perkebunan')[$kp];
					$kmpe->jumlah_produksi = $request->getPost('produksi_perkebunan')[$kp];
					$kmpe->jumlah_pohon = $request->getPost('pohon_perkebunan')[$kp];
					$kmpe->jenis_bibit = $request->getPost('bibit_perkebunan')[$kp];
					$kmpe->pestisida = $request->getPost('pestisida_perkebunan')[$kp];
					$kmpe->pupuk_organik = $request->getPost('pupuk_organik_perkebunan')[$kp];
					$kmpe->pupuk_pabrik = $request->getPost('pupuk_pabrik_perkebunan')[$kp];
					$kmpe->lokasi = $request->getPost('lokasi_lahan_perkebunan')[$kp];
					$kmpe->hasil_pemasaran = $request->getPost('hasil_pemasaran_perkebunan')[$kp];

					$kk_main_perkebunan_model->save($kmpe);
				}
			}

			//kehutanan
			$komoditas_kehutanan = $request->getPost('komoditas_kehutanan');

			foreach($komoditas_kehutanan as $kp => $value){
				$kmpe = new KkMainKehutananEntities();
				if($value != 1){
					$kmpe->kk_id = $main_id;
					$kmpe->jenis_komoditas = $request->getPost('komoditas_kehutanan')[$kp];
					$kmpe->luas_panen = $request->getPost('luas_lahan_kehutanan')[$kp];
					$kmpe->jumlah_produksi = $request->getPost('produksi_kehutanan')[$kp];
					$kmpe->jumlah_pohon = $request->getPost('pohon_kehutanan')[$kp];
					$kmpe->jenis_bibit = $request->getPost('bibit_kehutanan')[$kp];
					$kmpe->pestisida = $request->getPost('pestisida_kehutanan')[$kp];
					$kmpe->pupuk_organik = $request->getPost('pupuk_organik_kehutanan')[$kp];
					$kmpe->pupuk_pabrik = $request->getPost('pupuk_pabrik_kehutanan')[$kp];
					$kmpe->lokasi = $request->getPost('lokasi_lahan_kehutanan')[$kp];
					$kmpe->hasil_pemasaran = $request->getPost('hasil_pemasaran_kehutanan')[$kp];

					$kk_main_kehutanan_model->save($kmpe);
				}
			}

			//buah_buahan
			$komoditas_buah_buahan = $request->getPost('komoditas_buah_buahan');

			foreach($komoditas_buah_buahan as $kp => $value){
				$kmpe = new KkMainBuahBuahanEntities();
				if($value != 1){
					$kmpe->kk_id = $main_id;
					$kmpe->jenis_komoditas = $request->getPost('komoditas_buah_buahan')[$kp];
					$kmpe->luas_panen = $request->getPost('luas_lahan_buah_buahan')[$kp];
					$kmpe->jumlah_produksi = $request->getPost('produksi_buah_buahan')[$kp];
					$kmpe->jumlah_pohon = $request->getPost('pohon_buah_buahan')[$kp];
					$kmpe->jenis_bibit = $request->getPost('bibit_buah_buahan')[$kp];
					$kmpe->pestisida = $request->getPost('pestisida_buah_buahan')[$kp];
					$kmpe->pupuk_organik = $request->getPost('pupuk_organik_buah_buahan')[$kp];
					$kmpe->pupuk_pabrik = $request->getPost('pupuk_pabrik_buah_buahan')[$kp];
					$kmpe->lokasi = $request->getPost('lokasi_lahan_buah_buahan')[$kp];
					$kmpe->hasil_pemasaran = $request->getPost('hasil_pemasaran_buah_buahan')[$kp];

					$kk_main_buah_buahan_model->save($kmpe);
				}
			}

			//tanaman_pangan
			$komoditas_tanaman_pangan = $request->getPost('komoditas_tanaman_pangan');

			foreach($komoditas_tanaman_pangan as $kp => $value){
				$kmpe = new KkMainTanamanPanganEntities();
				if($value != 1){
					$kmpe->kk_id = $main_id;
					$kmpe->jenis_komoditas = $request->getPost('komoditas_tanaman_pangan')[$kp];
					$kmpe->luas_panen = $request->getPost('luas_lahan_tanaman_pangan')[$kp];
					$kmpe->jumlah_produksi = $request->getPost('produksi_tanaman_pangan')[$kp];
					$kmpe->jumlah_pohon = $request->getPost('pohon_tanaman_pangan')[$kp];
					$kmpe->jenis_bibit = $request->getPost('bibit_tanaman_pangan')[$kp];
					$kmpe->pestisida = $request->getPost('pestisida_tanaman_pangan')[$kp];
					$kmpe->pupuk_organik = $request->getPost('pupuk_organik_tanaman_pangan')[$kp];
					$kmpe->pupuk_pabrik = $request->getPost('pupuk_pabrik_tanaman_pangan')[$kp];
					$kmpe->lokasi = $request->getPost('lokasi_lahan_tanaman_pangan')[$kp];
					$kmpe->hasil_pemasaran = $request->getPost('hasil_pemasaran_tanaman_pangan')[$kp];

					$kk_main_tanaman_pangan_model->save($kmpe);
				}
			}

			//tanaman_obat
			$komoditas_tanaman_obat = $request->getPost('komoditas_tanaman_obat');

			foreach($komoditas_tanaman_obat as $kp => $value){
				echo $kp;
				$kmpe = new KkMainTanamanObatEntities();
				if($value != 1){
					$kmpe->kk_id = $main_id;
					$kmpe->jenis_komoditas = $request->getPost('komoditas_tanaman_obat')[$kp];
					$kmpe->luas_panen = $request->getPost('luas_lahan_tanaman_obat')[$kp];
					$kmpe->jumlah_produksi = $request->getPost('produksi_tanaman_obat')[$kp];
					$kmpe->jumlah_pohon = $request->getPost('pohon_tanaman_obat')[$kp];
					$kmpe->jenis_bibit = $request->getPost('bibit_tanaman_obat')[$kp];
					$kmpe->pestisida = $request->getPost('pestisida_tanaman_obat')[$kp];
					$kmpe->pupuk_organik = $request->getPost('pupuk_organik_tanaman_obat')[$kp];
					$kmpe->pupuk_pabrik = $request->getPost('pupuk_pabrik_tanaman_obat')[$kp];
					$kmpe->lokasi = $request->getPost('lokasi_lahan_tanaman_obat')[$kp];
					$kmpe->hasil_pemasaran = $request->getPost('hasil_pemasaran_tanaman_obat')[$kp];

					$kk_main_tanaman_obat_model->save($kmpe);
				}
			}
		/* } */

		/*KEADAAN RUMAH{ */
			$kk_main_aset_ent = new KkMainAsetRumahEntities();
			$kk_main_aset_ent->kk_id = $main_id;
			$kk_main_aset_ent->sumber_air_minum = $request->getPost('sumber_air_minum');
			$kk_main_aset_ent->ket_sumber_air_minum = $request->getPost('keterangan_sumber_air_minum');
			$kk_main_aset_ent->status_kepemilikan_rumah = $request->getPost('status_kepemilikan_rumah');
			$kk_main_aset_ent->sarana_mck = $request->getPost('sarana_mck');
			$kk_main_aset_ent->daya_listrik = $request->getPost('daya_listrik');
			$kk_main_aset_ent->luas_pekarangan_rumah = $request->getPost('luas_pekarangan_rumah');
			$kk_main_aset_ent->dinding_rumah = $request->getPost('dinding_rumah');
			$kk_main_aset_ent->lantai_rumah = $request->getPost('lantai_rumah');
			$kk_main_aset_ent->atap_rumah = $request->getPost('atap_rumah');
			$kk_main_aset_ent->pemanfaatan_danau_dkk = $request->getPost('pemanfaatan_danau_dkk');

			$kk_main_aset_rumah_model->save($kk_main_aset_ent);
		/*} */

		/*ASET LAINNYA{ */
			$al = $request->getPost('aset_lainnya');

			if(isset($al)){
				$data_aset_lainnya = array();

				foreach($al as $l){
					$data_aset_lainnya[] = array(
						'kk_id' => $main_id,
						'aset_lainnya_id' => $l
					);
				}

				if(sizeof($data_aset_lainnya)>=1){
					$kk_main_aset_lainnya_model->insertBatch($data_aset_lainnya);
				}
			}
		/*} */

		/*PERIKANAN {*/
			$komoditas_perikanan = $request->getPost('komoditas_perikanan');

			foreach($komoditas_perikanan as $kp => $value){
				$kmpe = new KkMainAsetIkanEntities();
				if($value != 1){
					$kmpe->kk_id = $main_id;
					$kmpe->jenis_komoditas = $request->getPost('komoditas_perikanan')[$kp];
					$kmpe->luas_panen = $request->getPost('luas_panen_ikan')[$kp];
					$kmpe->jumlah_ikan = $request->getPost('jumlah_ekor_ikan')[$kp];
					$kmpe->jumlah_produksi = $request->getPost('produksi_ikan')[$kp];
					$kmpe->jenis_bibit_ikan = $request->getPost('bibit_ikan')[$kp];
					$kmpe->hasil_pemasaran = $request->getPost('hasil_pemasaran_ikan')[$kp];
					$kmpe->jenis_pakan = $request->getPost('pakan_ikan')[$kp];

					$kk_main_aset_ikan_model->save($kmpe);
				}
			}
		/* }*/

		/*PERIKANAN TANGKAP{*/
			$komoditas_perikanan_tangkap = $request->getPost('alat_tangkap');

			foreach($komoditas_perikanan_tangkap as $kp => $value){
				$kmpe = new KkMainAsetIkanTangkapEntities();
				if($value != 1){
					$kmpe->kk_id = $main_id;
					$kmpe->alat_tangkap =$request->getPost('alat_tangkap')[$kp];
					$kmpe->jumlah_unit = $request->getPost('jumlah_unit_alat_tangkap')[$kp];

					$kk_main_aset_ikan_tangkap_model->save($kmpe);
				}
			}
		/* }*/

		/*PENDATA{*/
			$pendata_ent = new PendataEntities();
			$pendata_ent->kk_id = $main_id;
			$pendata_ent->nama = htmlspecialchars(strip_tags($request->getPost('nama_pendata')));
			$pendata_ent->pekerjaan = htmlspecialchars(strip_tags($request->getPost('pekerjaan_pendata')));
			$pendata_ent->sumber_data = htmlspecialchars(strip_tags($request->getPost('sumber_data')));
			$pendata_ent->no_handphone = htmlspecialchars(strip_tags($request->getPost('nomor_handphone_pendata')));
			$pendata_ent->jabatan = htmlspecialchars(strip_tags($request->getPost('jabatan_pendata')));

			$pendata_model->save($pendata_ent);
		/*}*/

		// TRANSPORTASI UMUM{
			$al = $request->getPost('aset_transportasi_umum');

			if(isset($al)){
				$data_aset_lainnya = array();

				foreach($al as $l){
					$data_aset_lainnya[] = array(
						'kk_id' => $main_id,
						'aset_transportasi' => $l
					);
				}

				if(sizeof($data_aset_lainnya)>=1){
					$kk_main_aset_transportasi_umum_model->insertBatch($data_aset_lainnya);
				}
			}			
		// }

		// LEMBAGA PENDIDIKAN{
			$al = $request->getPost('lembaga_pendidikan');

			if(isset($al)){
				$data_aset_lainnya = array();

				foreach($al as $l){
					$data_aset_lainnya[] = array(
						'kk_id' => $main_id,
						'lembaga_pendidikan' => $l
					);
				}

				if(sizeof($data_aset_lainnya)>=1){
					$kk_main_lembaga_pendidikan_model->insertBatch($data_aset_lainnya);
				}
			}			
		// }

		// Aset Sarana Produksi{
			$al = $request->getPost('aset_sarana_produksi');

			if(isset($al)){
				$data_aset_lainnya = array();

				foreach($al as $l){
					$data_aset_lainnya[] = array(
						'kk_id' => $main_id,
						'aset_produksi' => $l
					);
				}

				if(sizeof($data_aset_lainnya)>=1){
					$kk_main_aset_produksi_model->insertBatch($data_aset_lainnya);
				}
			}			
		// }

		//KESEHATAN{
			$kk_main_kesehatan_ent = new KkMainKesehatanEntities();

			$kk_main_kesehatan_ent->kk_id = $main_id;
			$kk_main_kesehatan_ent->penderita_sakit_kelainan = $request->getPost('penderita_sakit_kelainan');
			$kk_main_kesehatan_ent->perilaku_hidup_bersih = $request->getPost('perilaku_hidup_bersih');
			$kk_main_kesehatan_ent->pola_makan = $request->getPost('pola_makan');
			$kk_main_kesehatan_ent->kebiasaan_berobat = $request->getPost('kebiasaan_berobat');
			$kk_main_kesehatan_ent->jenis_penyakit = $request->getPost('jenis_penyakit');

			$kk_main_kesehatan_model->save($kk_main_kesehatan_ent);
		// }

		//TANAH{
			$kk_main_aset_tanah_ent = new KkMainAsetTanahEntities();

			$kk_main_aset_tanah_ent->kk_id = $main_id;
			$kk_main_aset_tanah_ent->aset_tanah_id = $request->getPost('aset_tanah');

			$kk_main_aset_tanah_model->save($kk_main_aset_tanah_ent);
		//}

		//ASET TERNAK{
			$komoditas_ternak = $request->getPost('komoditas_ternak');

			foreach($komoditas_ternak as $kp => $value){
				$kmpe = new KkMainAsetTernakEntities();
				if($value != 1){
					$kmpe->kk_id = $main_id;
					$kmpe->jenis_ternak = $request->getPost('komoditas_ternak')[$kp];
					$kmpe->luas_kandang = $request->getPost('luas_kandang_ternak')[$kp];
					$kmpe->jumlah_ekor = $request->getPost('jumlah_ekor_ternak')[$kp];
					$kmpe->jenis_hasil_ternak = $request->getPost('hasil_ternak')[$kp];
					$kmpe->jumlah_produksi_hasil_ternak = $request->getPost('produksi_ternak')[$kp];
					$kmpe->pemasaran_hasil_ternak = $request->getPost('hasil_pemasaran_ternak')[$kp];
					$kmpe->jenis_pakan_ternak = $request->getPost('jenis_pakan_ternak')[$kp];

					$kk_main_aset_ternak_model->save($kmpe);
				}
			}
		//}

		// ACCEPTOR KB{
			$ak = $request->getPost('akseptor_kb');

			if(isset($ak)){
				$data_aset_lainnya = array();

				foreach($ak as $l){
					$data_aset_lainnya[] = array(
						'kk_id' => $main_id,
						'acceptor_kb_id' => $l
					);
				}

				if(sizeof($data_aset_lainnya)>=1){
					$kk_main_acceptr_kb_model->insertBatch($data_aset_lainnya);
				}
			}			
		// }

		// CAKUPAN IMUNISASI{
			$ci = $request->getPost('cakupan_imunisasi');

			if(isset($ci)){
				$data_aset_lainnya = array();

				foreach($ci as $l){
					$data_aset_lainnya[] = array(
						'kk_id' => $main_id,
						'cakupan_imunisasi' => $l
					);
				}

				if(sizeof($data_aset_lainnya)>=1){
					$kk_main_cakupan_imunisasi_model->insertBatch($data_aset_lainnya);
				}
			}			
		// }

		// MAIN PERSALINAN{
			$kk_main_persalinan_ent = new KkMainPersalinanEntities();
			$kk_main_persalinan_ent->kk_id = $main_id;
			$kk_main_persalinan_ent->kualitas_ibu_hamil = $request->getPost('kualitas_ibu_hamil');
			$kk_main_persalinan_ent->kualitas_bayi = $request->getPost('kualitas_bayi');
			$kk_main_persalinan_ent->tempat_persalinan = $request->getPost('tempat_persalinan');
			$kk_main_persalinan_ent->pertolongan_persalinan = $request->getPost('pertolongan_persalinan');
			$kk_main_persalinan_ent->jenis_kelamin_balita = $request->getPost('jenis_kelamin_balita');
			$kk_main_persalinan_ent->umur = $request->getPost('umur_balita');
			$kk_main_persalinan_ent->tinggi_badan = $request->getPost('tinggi_badan');
			$kk_main_persalinan_ent->berat_badan = $request->getPost('berat_badan');
			$kk_main_persalinan_ent->kondisi_saat_pengukuran = $request->getPost('kondisi_saat_pengukuran');
			$kk_main_persalinan_ent->status_gizi_balita = $request->getPost('status_gizi_balita');
			$kk_main_persalinan_ent->umur_balita = $request->getPost('umur_balita');
			$kk_main_persalinan_ent->fasilitas_layanan_kesehatan = $request->getPost('fasilitas_layanan_kesehatan');

			$kk_main_persalinan_model->save($kk_main_persalinan_ent);
		//}

		// MAIN PERSALINAN{
			$kk_main_data_utama_responden_ent = new KkMainDataUtamaRespondenEntities();
			$kk_main_data_utama_responden_ent->kk_id = $main_id;
			$kk_main_data_utama_responden_ent->nik_responden = htmlspecialchars(strip_tags($request->getPost('nik_responden')));
			$kk_main_data_utama_responden_ent->nama_lengkap = $request->getPost('nama_lengkap');
			$kk_main_data_utama_responden_ent->jenis_kelamin = $request->getPost('jenis_kelamin_responden');
			$kk_main_data_utama_responden_ent->hubungan_dengan_kepala_keluarga = $request->getPost('hubungan_dengan_kepala_keluarga');
			$kk_main_data_utama_responden_ent->status_perkawinan = $request->getPost('status_perkawinan');
			$kk_main_data_utama_responden_ent->agama = $request->getPost('agama');
			$kk_main_data_utama_responden_ent->golongan_darah = $request->getPost('golongan_darah');
			$kk_main_data_utama_responden_ent->kewarganegaraan = $request->getPost('kewarganegaraan');
			$kk_main_data_utama_responden_ent->etnis_suku = $request->getPost('etnis_suku');
			$kk_main_data_utama_responden_ent->pendidikan_terakhir = $request->getPost('pendidikan_terakhir');
			$kk_main_data_utama_responden_ent->status_domisili = $request->getPost('status_domisili');
			$kk_main_data_utama_responden_ent->cacat_fisik = $request->getPost('cacat_fisik');
			$kk_main_data_utama_responden_ent->cacat_mental = $request->getPost('cacat_mental');
			$kk_main_data_utama_responden_ent->status_kemiskinan = $request->getPost('status_kemiskinan');
			$kk_main_data_utama_responden_ent->pengguna_bpjs = $request->getPost('pengguna_bpjs');
			$kk_main_data_utama_responden_ent->jenis_jaminan_sosial = $request->getPost('jenis_jaminan_sosial');
			$kk_main_data_utama_responden_ent->lama_waktu = $request->getPost('lama_waktu');
			$kk_main_data_utama_responden_ent->wajib_iuran = $request->getPost('wajib_iuran');

			$kk_main_data_utama_responden_model->save($kk_main_data_utama_responden_ent);
		//}

		//DATA PEKERJAAN{ 	 	 	 	 	 	 	 	 	
			$kk_main_data_pekerjaan_dan_organisasi_ent = new KkMainDataPekerjaanDanOrganisasiEntities();
			$kk_main_data_pekerjaan_dan_organisasi_ent->kk_id = $main_id;
			$kk_main_data_pekerjaan_dan_organisasi_ent->lembaga_kemasyarakatan = $request->getPost('lembaga_kemasyarakatan');
			$kk_main_data_pekerjaan_dan_organisasi_ent->aktivitas_ekonomi = $request->getPost('aktivitas_ekonomi_lainnya');
			$kk_main_data_pekerjaan_dan_organisasi_ent->sumber_modal = $request->getPost('sumber_modal');
			$kk_main_data_pekerjaan_dan_organisasi_ent->modal = $request->getPost('modal');
			$kk_main_data_pekerjaan_dan_organisasi_ent->laba_per_bulan = $request->getPost('laba_per_bulan');
			$kk_main_data_pekerjaan_dan_organisasi_ent->penghasilan_per_bulan = $request->getPost('penghasilan_per_bulan');
			$kk_main_data_pekerjaan_dan_organisasi_ent->pengeluaran_per_bulan = $request->getPost('pengeluaran_per_bulan');
			$kk_main_data_pekerjaan_dan_organisasi_ent->mata_pencaharian_pokok = $request->getPost('mata_pencaharian_pokok');

			print_r($kk_main_data_pekerjaan_dan_organisasi_ent);

			$kk_main_data_pekerjaan_dan_organisasi_model->save($kk_main_data_pekerjaan_dan_organisasi_ent);
		//}

		//DATA LEMBAGA PEMERINTAHAN{
			$ci = $request->getPost('lembaga_pemerintahan');

			if(isset($ci)){
				$data_aset_lainnya = array();

				foreach($ci as $l){
					$data_aset_lainnya[] = array(
						'kk_id' => $main_id,
						'lembaga_pemerintahan_id' => $l
					);
				}

				if(sizeof($data_aset_lainnya)>=1){
					$kk_main_lembaga_pemerintahan_model->insertBatch($data_aset_lainnya);
				}
			}	
		//}


		//DATA PARIWISATA{
			$kk_main_pariwisata_ent = new KkMainPariwisataEntities();
			$kk_main_pariwisata_ent->kk_id = $main_id;
			$kk_main_pariwisata_ent->jumlah_biaya_wisata_bulanan = $request->getPost('jumlah_biaya_wisata_bulanan');
			$kk_main_pariwisata_ent->lokasi_objek_wisata = $request->getPost('lokasi_objek_wisata');
			$kk_main_pariwisata_ent->daya_tarik_wisata_palu = $request->getPost('daya_tarik_wisata_kota_palu');
			$kk_main_pariwisata_ent->pengelolaan_pariwisata_palu = $request->getPost('pengelolaan_wisata_kota_palu');
			$kk_main_pariwisata_ent->jumlah_aktivitas_wisata_bulanan = $request->getPost('jumlah_aktivitas_wisata_bulanan');

			$kk_main_pariwisata_model->save($kk_main_pariwisata_ent);
		//}

		return redirect()->route('user.panel.dashboard');
	}
}
