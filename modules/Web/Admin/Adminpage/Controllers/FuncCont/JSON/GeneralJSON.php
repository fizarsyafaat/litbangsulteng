<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;
use BusinessProcessRoot\Models\KkMain as KkMainModel;

use BusinessProcessRoot\Models\Kecamatan as KecamatanModel;
use BusinessProcessRoot\Models\Kelurahan as KelurahanModel;
use BusinessProcessRoot\Models\Agama as AgamaModel;
use BusinessProcessRoot\Models\GolonganDarah as GolonganDarahModel;
use BusinessProcessRoot\Models\PendidikanTerakhir as PendidikanTerakhirModel;
use BusinessProcessRoot\Models\MataPencaharianPokok as MataPencaharianPokokModel;
use BusinessProcessRoot\Models\StatusKemiskinan as StatusKemiskinanModel;
use BusinessProcessRoot\Models\UangPerBulan as UangPerBulanModel;
use BusinessProcessRoot\Entities\Misc\Statistic as StatisticEntities;

class GeneralJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_main_kk(){
		$request = $this->request;

		$kModel = new KkMainModel();
		$kstatisticModel = new KkMainModel();

		$kepala_keluarga = htmlspecialchars(strip_tags($request->getPost("kepala_keluarga")));
		$no_kk = htmlspecialchars(strip_tags($request->getPost("no_kk")));
		$kelurahan = (int) ($request->getPost("kelurahan"));
		$kecamatan = (int) ($request->getPost("kecamatan"));
		$pekerjaan = (int) ($request->getPost("pekerjaan"));
		$stakem = (int) ($request->getPost("stakem"));
		$kk_id = (int) ($request->getPost("kk_id"));
		$mode = $request->getPost("mode");
		$paging = ($request->getPost("paging"));
		$data_filter = array();

		try{
			$page = (int) ($request->getPost("page"));

			if($page <= 0){
				$page = 1;
			}
		}catch(\Exception $e){
			$page = 1;
		}

		if(strlen($kepala_keluarga)>=1){
			$data_filter['kepala_keluarga'] = $kepala_keluarga;
		}
		if(strlen($no_kk)>=1){
			$data_filter['no_kk'] = $no_kk;
		}
		if($kelurahan>=1){
			$data_filter['kelurahan'] = $kelurahan;
		}
		if($pekerjaan>=1){
			$data_filter['pekerjaan'] = $pekerjaan;
		}
		if($kecamatan>=1){
			$data_filter['kecamatan'] = $kecamatan;
		}
		if($stakem>=1){
			$data_filter['stakem'] = $stakem;
		}
		if($kk_id>=1){
			$data_filter['kk_id'] = $kk_id;
		}

        if($paging){
            $start = ($page - 1) * DATA_PER_PAGE;
            $data_filter_page = $data_filter;
            $data_filter_page['limit'] = DATA_PER_PAGE;
            $data_filter_page['start'] = $start;
            $kk_list = $kModel->get_filter_data($data_filter_page);
            $kk_total = $kModel->get_filter_data($data_filter);
        }else{
			$kk_list = $kModel->get_filter_data($data_filter);
			$kk_total = $kk_list;
        }

		$pager = $this->json_pagination($page,sizeof($kk_total),DATA_PER_PAGE);

		foreach($kk_list as $kl){
			$kl->alamat_lengkap = $kl->obtain_alamat_lengkap();

			//KK MAIN
			$kl->get_kk_main_data_responden = $kl->get_kk_main_data_responden();
			$kl->get_kk_main_data_pekerjaan = $kl->get_kk_main_data_pekerjaan();
			$kl->get_kk_main_lembaga_pemerintahan = $kl->get_kk_main_lembaga_pemerintahan();
			$kl->get_kk_main_wajib_pajak = $kl->get_kk_main_wajib_pajak();
			$kl->get_kk_main_aset_tanah = $kl->get_kk_main_aset_tanah();
			$kl->get_kk_main_aset_rumah = $kl->get_kk_main_aset_rumah();
			$kl->get_kk_main_aset_perkebunan = $kl->get_kk_main_aset_perkebunan();
			$kl->get_kk_main_aset_tanaman_pangan = $kl->get_kk_main_aset_tanaman_pangan();
			$kl->get_kk_main_aset_buah_buahan = $kl->get_kk_main_aset_buah_buahan();
			$kl->get_kk_main_aset_tanaman_obat = $kl->get_kk_main_aset_tanaman_obat();
			$kl->get_kk_main_aset_kehutanan= $kl->get_kk_main_aset_kehutanan();
			$kl->get_kk_main_aset_ternak= $kl->get_kk_main_aset_ternak();
			$kl->get_kk_main_aset_ikan= $kl->get_kk_main_aset_ikan();
			$kl->get_kk_main_aset_ikan_tangkap= $kl->get_kk_main_aset_ikan_tangkap();
			$kl->get_kk_main_pariwisata= $kl->get_kk_main_pariwisata();
			$kl->get_kk_main_kesehatan= $kl->get_kk_main_kesehatan();
			$kl->get_kk_main_aset_transportasi_umum= $kl->get_kk_main_aset_transportasi_umum();
			$kl->get_kk_main_aset_lembaga_pendidikan= $kl->get_kk_main_aset_lembaga_pendidikan();
			$kl->get_kk_main_aset_produksi= $kl->get_kk_main_aset_produksi();
			$kl->get_kk_main_persalinan= $kl->get_kk_main_persalinan();
			$kl->get_kk_main_acceptorkb= $kl->get_kk_main_acceptorkb();
			$kl->get_kk_main_cakupan_imunisasi= $kl->get_kk_main_cakupan_imunisasi();
			$kl->get_pendata= $kl->get_pendata();
		}

		$statistic = new StatisticEntities();

		if($mode=="statistic"){
			$data_filter_statistic = $data_filter;
			//statistic

			//gender{
				$data_filter_statistic['jenis_kelamin'] = 1;
		        $male = $kstatisticModel->get_filter_data($data_filter_statistic);
				$data_filter_statistic['jenis_kelamin'] = 2;
		        $female = $kstatisticModel->get_filter_data($data_filter_statistic);

		        $data_gender = array(
		        	'Laki-laki' => sizeof($male),
		        	'Wanita' => sizeof($female),
		        );

		        $statistic->gender = $statistic->get_percentage($data_gender);
		   // }

			//Agama{
				$agama_model = new AgamaModel();
				$all_agama = $agama_model->findAll();
				$data_religion = array();

				$data_filter_statistic = $data_filter;

				foreach($all_agama as $m){
					$data_filter_statistic['agama'] = $m->agama_id;
					$data_religion[$m->nama_agama] = sizeof($kstatisticModel->get_filter_data($data_filter_statistic));
				}

		        $statistic->religion = $statistic->get_percentage($data_religion);
		    //}

	        //goldarah{
				$golongan_darah_model = new GolonganDarahModel();
				$all_goldar = $golongan_darah_model->findAll();
				$data_goldar = array();

				$data_filter_statistic = $data_filter;

				foreach($all_goldar as $m){
					$data_filter_statistic['goldar'] = $m->golongan_darah_id;
					$data_goldar[$m->nama_golongan_darah] = sizeof($kstatisticModel->get_filter_data($data_filter_statistic));
				}

		        $statistic->goldar = $statistic->get_percentage($data_goldar);
		    //}

		    //pendidikanterakhir{
				$penter_model = new PendidikanTerakhirModel();
				$all_penter = $penter_model->findAll();
				$data_penter = array();

				$data_filter_statistic = $data_filter;

				foreach($all_penter as $m){
					$data_filter_statistic['penter'] = $m->pendidikan_terakhir_id;
					$data_penter[$m->nama_pendidikan_terakhir] = sizeof($kstatisticModel->get_filter_data($data_filter_statistic));
				}

		        $statistic->penter = $statistic->get_percentage($data_penter);
		    //}

		    //pekerjaan{
				$pekerjaan_model = new MataPencaharianPokokModel();
				$all_pekerjaan = $pekerjaan_model->findAll();
				$data_pekerjaan = array();

				$data_filter_statistic = $data_filter;

				foreach($all_pekerjaan as $m){
					$data_filter_statistic['pekerjaan'] = $m->mata_pencaharian_pokok_id;
					$data_pekerjaan[$m->nama_mata_pencaharian_pokok] = sizeof($kstatisticModel->get_filter_data($data_filter_statistic));
				}

		        $statistic->pekerjaan = $statistic->get_percentage($data_pekerjaan);
		    //}

		    //penghasilan{
				$upb_model = new UangPerBulanModel();
				$all_upb = $upb_model->findAll();
				$data_penghasilan = array();
				$data_pengeluaran = array();

				$data_filter_statistic = $data_filter;

				foreach($all_upb as $m){
					$data_filter_statistic['penghasilan'] = $m->uang_per_bulan_id;
					$data_penghasilan[$m->nama_uang_per_bulan] = sizeof($kstatisticModel->get_filter_data($data_filter_statistic));

					$data_filter_statistic = $data_filter;
					$data_filter_statistic['pengeluaran'] = $m->uang_per_bulan_id;
					$data_pengeluaran[$m->nama_uang_per_bulan] = sizeof($kstatisticModel->get_filter_data($data_filter_statistic));

					$data_filter_statistic = $data_filter;
				}

		        $statistic->penghasilan = $statistic->get_percentage($data_penghasilan);
		        $statistic->pengeluaran = $statistic->get_percentage($data_pengeluaran);
		    //}

		    //kemiskinan{
				$stakem_model = new StatusKemiskinanModel();
				$all_stakem = $stakem_model->findAll();
				$data_stakem = array();

				$data_filter_statistic = $data_filter;
				$k = 0;

				foreach($all_stakem as $m){
					$data_filter_statistic['stakem'] = $m->status_kemiskinan_id;
					if($k==0){
						$nama_status = "Miskin";
					}else if($k==1){
						$nama_status = "Tidak miskin";
					}else{
						$nama_status = "Lainnya";
					}
					$data_stakem[$nama_status] = sizeof($kstatisticModel->get_filter_data($data_filter_statistic));
					$k+=1;
				}

		        $statistic->stakem = $statistic->get_percentage($data_stakem);
		    //}
		}


		$data = array(
			'pager' => $pager,
			'kk_list' => $kk_list,
			'total_data' => sizeof($kk_total),
			'statistic' => $statistic,
		);

		echo json_encode($data);
	}

	public function json_get_main_kk_kecamatan(){
		$request = $this->request;

		$kModel = new KkMainModel();
		$kcModel = new KecamatanModel();

		$kc_list = $kcModel->findAll();
		$k_array = [];

		foreach($kc_list as $kc){
			$m = new \Stdclass();
			$m->title = $kc->nama_kecamatan;
			$m->total_kk = sizeof($kModel->join("kelurahan",'kk_main.kelurahan = kelurahan.id_kelurahan')->where("id_kecamatan",$kc->id_kecamatan)->findAll());
			$k_array[] = $m;
		}

		echo json_encode($k_array);
	}

	public function json_get_main_kk_kelurahan(){
		$request = $this->request;

		$kModel = new KkMainModel();
		$klModel = new KelurahanModel();

		$kl_list = $klModel->findAll();
		$k_array = [];

		foreach($kl_list as $kc){
			$m = new \Stdclass();
			$m->title = $kc->nama_kelurahan;
			$m->id_kelurahan = $kc->id_kelurahan;
			$m->total_kk = sizeof($kModel->where("kelurahan",$kc->id_kelurahan)->findAll());
			$k_array[] = $m;
		}

		echo json_encode($k_array);
	}
}
