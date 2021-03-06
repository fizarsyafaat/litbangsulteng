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
		$paging = ($request->getPost("paging"));

		try{
			$page = (int) ($request->getPost("page"));

			if($page <= 0){
				$page = 1;
			}
		}catch(\Exception $e){
			$page = 1;
		}

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

        if($paging){
            $start = ($page - 1) * DATA_PER_PAGE;
            $kk_list = $kModel->limit(DATA_PER_PAGE,$start)->get()->getResult("BusinessProcessRoot\Entities\KkMain");
            $kk_total = $kModel->findAll();
        }else{
			$kk_list = $kModel->get()->getResult("BusinessProcessRoot\Entities\KkMain");
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

		$data = array(
			'pager' => $pager,
			'kk_list' => $kk_list
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
