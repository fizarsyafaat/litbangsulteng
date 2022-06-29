<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;
use BusinessProcessRoot\Models\KkMain as KkMainModel;

use BusinessProcessRoot\Models\Kecamatan as KecamatanModel;
use BusinessProcessRoot\Models\Kelurahan as KelurahanModel;

class GeneralJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_main_kk(){
		$request = $this->request;

		$kModel = new KkMainModel();
		$kepala_keluarga = htmlspecialchars(strip_tags($request->getPost("kepala_keluarga")));
		$no_kk = htmlspecialchars(strip_tags($request->getPost("no_kk")));
		$kelurahan = (int) ($request->getPost("kelurahan"));
		$kk_id = (int) ($request->getPost("kk_id"));

		if(strlen($kepala_keluarga)>=1){
			$kModel = $kModel->like("kepala_keluarga",$kepala_keluarga);
		}
		if(strlen($no_kk)>=1){
			$kModel = $kModel->like("no_kk",$no_kk);
		}
		if($kelurahan>=1){
			$kModel = $kModel->where("kelurahan",$kelurahan);
		}
		if($kk_id>=1){
			$kModel = $kModel->where("kk_id",$kk_id);
		}

		$kk_list = $kModel->paginate(10);

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
		}

		echo json_encode($kk_list);
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
