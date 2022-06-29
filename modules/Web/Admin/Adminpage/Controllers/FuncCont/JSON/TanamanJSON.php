<?php

namespace AdminpageFuncCont\JSON;

use AdminTemplateFuncCont\DefaultAdminFuncController;

use Config\Services as SVC;
use CodeIgniter\API\ResponseTrait;

use BusinessProcessRoot\Models\KomoditasBuahBuahan as KomoditasBuahBuahanModel;
use BusinessProcessRoot\Models\KomoditasPerkebunan as KomoditasPerkebunanModel;
use BusinessProcessRoot\Models\KomoditasKehutanan as KomoditasKehutananModel;
use BusinessProcessRoot\Models\KomoditasTanamanObat as KomoditasTanamanObatModel;
use BusinessProcessRoot\Models\KomoditasTanamanPangan as KomoditasTanamanPanganModel;

use BusinessProcessRoot\Models\LuasLahan as LuasLahanModel;
use BusinessProcessRoot\Models\HasilPemasaran as HasilPemasaranModel;
use BusinessProcessRoot\Models\JumlahPohon as JumlahPohonModel;
use BusinessProcessRoot\Models\JumlahProduksi as JumlahProduksiModel;
use BusinessProcessRoot\Models\JenisBibit as JenisBibitModel;
use BusinessProcessRoot\Models\Pestisida as PestisidaModel;
use BusinessProcessRoot\Models\PupukOrganik as PupukOrganikModel;
use BusinessProcessRoot\Models\PupukPabrik as PupukPabrikModel;

class TanamanJSON extends DefaultAdminFuncController{
	use ResponseTrait;

	public function __construct(){
		parent::__construct();
	}

	public function json_get_perkebunan(){
		$kModel = new KomoditasPerkebunanModel();
		$lModel = new LuasLahanModel();
		$jpModel = new JumlahPohonModel();
		$jprModel = new JumlahProduksiModel();
		$jbModel = new JenisBibitModel();
		$pModel = new PestisidaModel();
		$poModel = new PupukOrganikModel();
		$ppModel = new PupukPabrikModel();
		$hpModel = new HasilPemasaranModel();

		$k_list = $kModel->findAll();
		$l_list = $lModel->findAll();
		$jp_list = $jpModel->findAll();
		$jpr_list = $jprModel->findAll();
		$jb_list = $jbModel->findAll();
		$p_list = $pModel->findAll();
		$po_list = $poModel->findAll();
		$pp_list = $ppModel->findAll();
		$hp_list = $hpModel->findAll(); 

		$data = array(
			'kebun' => $k_list,
			'luas_lahan' => $l_list,
			'pohon' => $jp_list,
			'produksi' => $jpr_list,
			'bibit' => $jb_list,
			'pestisida' => $p_list,
			'pupuk_organik' => $po_list,
			'pupuk_pabrik' => $pp_list,
			'hasil_pemasaran' => $hp_list,
		);

		echo json_encode($data);
	}

	public function json_get_pertanian(){
		$kModel = new KomoditasBuahBuahanModel();
		$lModel = new LuasLahanModel();
		$jpModel = new JumlahPohonModel();
		$jprModel = new JumlahProduksiModel();
		$jbModel = new JenisBibitModel();
		$pModel = new PestisidaModel();
		$poModel = new PupukOrganikModel();
		$ppModel = new PupukPabrikModel();
		$hpModel = new HasilPemasaranModel();

		$k_list = $kModel->findAll();
		$l_list = $lModel->findAll();
		$jp_list = $jpModel->findAll();
		$jpr_list = $jprModel->findAll();
		$jb_list = $jbModel->findAll();
		$p_list = $pModel->findAll();
		$po_list = $poModel->findAll();
		$pp_list = $ppModel->findAll();
		$hp_list = $hpModel->findAll(); 

		$data = array(
			'tani' => $k_list,
			'luas_lahan' => $l_list,
			'pohon' => $jp_list,
			'produksi' => $jpr_list,
			'bibit' => $jb_list,
			'pestisida' => $p_list,
			'pupuk_organik' => $po_list,
			'pupuk_pabrik' => $pp_list,
			'hasil_pemasaran' => $hp_list,
		);

		echo json_encode($data);
	}

	public function json_get_tanaman_obat(){
		$kModel = new KomoditasTanamanObatModel();
		$lModel = new LuasLahanModel();
		$jpModel = new JumlahPohonModel();
		$jprModel = new JumlahProduksiModel();
		$jbModel = new JenisBibitModel();
		$pModel = new PestisidaModel();
		$poModel = new PupukOrganikModel();
		$ppModel = new PupukPabrikModel();
		$hpModel = new HasilPemasaranModel();


		$k_list = $kModel->findAll();
		$l_list = $lModel->findAll();
		$jp_list = $jpModel->findAll();
		$jpr_list = $jprModel->findAll();
		$jb_list = $jbModel->findAll();
		$p_list = $pModel->findAll();
		$po_list = $poModel->findAll();
		$pp_list = $ppModel->findAll();
		$hp_list = $hpModel->findAll(); 

		$data = array(
			'obat' => $k_list,
			'luas_lahan' => $l_list,
			'pohon' => $jp_list,
			'produksi' => $jpr_list,
			'bibit' => $jb_list,
			'pestisida' => $p_list,
			'pupuk_organik' => $po_list,
			'pupuk_pabrik' => $pp_list,
			'hasil_pemasaran' => $hp_list,
		);

		echo json_encode($data);
	}

	public function json_get_tanaman_pangan(){
		$kModel = new KomoditasTanamanPanganModel();
		$lModel = new LuasLahanModel();
		$jpModel = new JumlahPohonModel();
		$jprModel = new JumlahProduksiModel();
		$jbModel = new JenisBibitModel();
		$pModel = new PestisidaModel();
		$poModel = new PupukOrganikModel();
		$ppModel = new PupukPabrikModel();
		$hpModel = new HasilPemasaranModel();

		$k_list = $kModel->findAll();
		$l_list = $lModel->findAll();
		$jp_list = $jpModel->findAll();
		$jpr_list = $jprModel->findAll();
		$jb_list = $jbModel->findAll();
		$p_list = $pModel->findAll();
		$po_list = $poModel->findAll();
		$pp_list = $ppModel->findAll();
		$hp_list = $hpModel->findAll(); 
			
		$data = array(
			'pangan' => $k_list,
			'luas_lahan' => $l_list,
			'pohon' => $jp_list,
			'produksi' => $jpr_list,
			'bibit' => $jb_list,
			'pestisida' => $p_list,
			'pupuk_organik' => $po_list,
			'pupuk_pabrik' => $pp_list,
			'hasil_pemasaran' => $hp_list,
		);

		echo json_encode($data);
	}

	public function json_get_kehutanan(){
		$kModel = new KomoditasKehutananModel();
		$lModel = new LuasLahanModel();
		$jpModel = new JumlahPohonModel();
		$jprModel = new JumlahProduksiModel();
		$jbModel = new JenisBibitModel();
		$pModel = new PestisidaModel();
		$poModel = new PupukOrganikModel();
		$ppModel = new PupukPabrikModel();
		$hpModel = new HasilPemasaranModel();

		$k_list = $kModel->findAll();
		$l_list = $lModel->findAll();
		$jp_list = $jpModel->findAll();
		$jpr_list = $jprModel->findAll();
		$jb_list = $jbModel->findAll();
		$p_list = $pModel->findAll();
		$po_list = $poModel->findAll();
		$pp_list = $ppModel->findAll();
		$hp_list = $hpModel->findAll(); 

		$data = array(
			'hutan' => $k_list,
			'luas_lahan' => $l_list,
			'pohon' => $jp_list,
			'produksi' => $jpr_list,
			'bibit' => $jb_list,
			'pestisida' => $p_list,
			'pupuk_organik' => $po_list,
			'pupuk_pabrik' => $pp_list,
			'hasil_pemasaran' => $hp_list,
		);

		echo json_encode($data);
	}
}