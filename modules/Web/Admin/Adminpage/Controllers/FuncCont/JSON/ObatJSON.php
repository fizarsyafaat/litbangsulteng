<?php 

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\KomoditasTanamanObat as KomoditasTanamanObatModel;
use BusinessProcessRoot\Models\KkMainAsetTanamanObat as KkMainTanamanObatModel;

class ObatJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_obat(){
		$request = $this->request;

		$kModel = new KomoditasTanamanObatModel();
		$kkmModel = new KkMainTanamanObatModel();

		$k_list = $kModel->findAll();	

		$kkmModel->join("kk_main",'kk_main_aset_tanaman_obat.kk_id = kk_main.kk_id');
		$kkmModel->join("kelurahan","kk_main.kelurahan = kelurahan.id_kelurahan");

		$kecamatan = (int) ($request->getPost("kecamatan"));
		$kelurahan = (int) ($request->getPost("kelurahan"));

		$data = array();


		//KEPEMILIKAN RUMAH

		if($kecamatan > 0){
			$data['kecamatan'] = $kecamatan;
		}

		if($kelurahan > 0){
			$data['kelurahan'] = $kelurahan;
		}


		foreach($k_list as $m){
			$data['jenis_komoditas'] = $m->komoditas_tanaman_obat_id;
			$kkm_ent = $kkmModel->get_filter_data_obat($data);
			$m->total_data = sizeof($kkm_ent);
		}

			
		$data = array(
			'jenis_komoditas' => $k_list
			
		);

		echo json_encode($data);
	}



}