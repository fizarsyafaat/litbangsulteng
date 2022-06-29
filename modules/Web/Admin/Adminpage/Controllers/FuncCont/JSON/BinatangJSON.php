<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\KomoditasTernak as KomoditasTernakModel;
use BusinessProcessRoot\Models\KomoditasIkan as KomoditasIkanModel;
use BusinessProcessRoot\Models\JumlahEkor as JumlahEkorModel;
use BusinessProcessRoot\Models\JumlahEkorIkan as JumlahEkorIkanModel;
use BusinessProcessRoot\Models\LuasPanenIkan as LuasPanenIkanModel;
use BusinessProcessRoot\Models\JenisKomoditasHasilTernak as JenisKomoditasHasilTernakModel;
use BusinessProcessRoot\Models\JumlahProduksi as JumlahProduksiModel;
use BusinessProcessRoot\Models\HasilPemasaran as HasilPemasaranModel;
use BusinessProcessRoot\Models\JenisPakanTernak as JenisPakanTernakModel;
use BusinessProcessRoot\Models\JenisBibit as JenisBibitModel;
use BusinessProcessRoot\Models\AlatTangkap as AlatTangkapModel;
use BusinessProcessRoot\Models\JumlahUnitAlatTangkap as JumlahUnitAlatTangkapModel;


use BusinessProcessRoot\Models\LuasKandang as LuasKandangModel;

class BinatangJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_ternak(){
		$kModel = new KomoditasTernakModel();
		$lModel = new LuasKandangModel();
		$jeModel = new JumlahEkorModel();
		$jkht_model = new JenisKomoditasHasilTernakModel();
		$jp_model = new JumlahProduksiModel();
		$hpModel = new HasilPemasaranModel();
		$jptModel = new JenisPakanTernakModel();


		$k_list = $kModel->findAll();
		$lk_list = $lModel->findAll();
		$je_list = $jeModel->findAll();
		$jkht_list = $jkht_model->findAll();
		$jp_list = $jp_model->findAll();
		$hp_list = $hpModel->findAll(); 
		$jpt_list = $jptModel->findAll();

		$data = array(
			'ternak' => $k_list,
			'luas_kandang' => $lk_list,
			'jumlah_ekor' => $je_list,
			'hasil_ternak' => $jkht_list,
			'produksi' => $jp_list,
			'hasil_pemasaran' => $hp_list,
			'jenis_pakan_ternak' => $jpt_list,
		);

		echo json_encode($data);
	}

	public function json_get_perikanan(){
		$kModel = new KomoditasIkanModel();
		$liModel = new LuasPanenIkanModel();
		$jeiModel = new JumlahEkorIkanModel();
		$jp_model = new JumlahProduksiModel();
		$jbModel = new JenisBibitModel();
		$jpiModel = new JenisPakanTernakModel();
		$hpModel = new HasilPemasaranModel();

		$hp_list = $hpModel->findAll(); 
		$k_list = $kModel->findAll();
		$li_list = $liModel->findAll();
		$jb_list = $jbModel->findAll();
		$jei_list = $jeiModel->findAll();
		$jpi_list = $jpiModel->findAll();
		$jp_list = $jp_model->findAll();

		$data = array(
			'ikan' => $k_list,
			'luas_ikan' => $li_list,
			'jumlah_ekor' => $jei_list,
			'produksi' => $jp_list,
			'bibit' => $jb_list,
			'hasil_pemasaran' => $hp_list,
			'pakan_ikan' => $jpi_list
		);

		echo json_encode($data);
	}

	public function json_get_perikanan_tangkap(){
		$ati_model = new AlatTangkapModel();
		$juat_model = new JumlahUnitAlatTangkapModel();

		$alat_tangkap = $ati_model->findAll();
		$jumlah_unit_alat_tangkap = $juat_model->findAll();

		$data = array(
			'alat_tangkap' => $alat_tangkap,
			'jumlah_unit' => $jumlah_unit_alat_tangkap
		);

		echo json_encode($data);
	}
}