<?php

//modules\Home\Homepage\Controllers\ViewCont;

namespace AdminpageViewCont;

use AdminTemplateViewCont\DefaultAdminViewController;
use BusinessProcessRoot\Models\User as UserModel;

//INSERT DATA
use BusinessProcessRoot\Models\Agama as AgamaModel;

use BusinessProcessRoot\Models\AcceptorKb as AcceptorKbModel;
use BusinessProcessRoot\Models\AktivitasEkonomiLainnya as AktivitasEkonomiLainnyaModel;
use BusinessProcessRoot\Models\AsetLainnya as AsetLainnyaModel;
use BusinessProcessRoot\Models\AsetSaranaProduksi as AsetSaranaProduksiModel;
use BusinessProcessRoot\Models\AsetTambang as AsetTambangModel;
use BusinessProcessRoot\Models\AsetTanah as AsetTanahModel;
use BusinessProcessRoot\Models\AsetTransportasiUmum as AsetTransportasiUmumModel;
use BusinessProcessRoot\Models\AtapRumah as AtapRumahModel;
use BusinessProcessRoot\Models\BeratBadan as BeratBadanModel;
use BusinessProcessRoot\Models\CakupanImunisasi as CakupanImunisasiModel;
use BusinessProcessRoot\Models\CacatFisik as CacatFisikModel;
use BusinessProcessRoot\Models\CacatMental as CacatMentalModel;
use BusinessProcessRoot\Models\DayaListrik as DayaListrikModel;
use BusinessProcessRoot\Models\DindingRumah as DindingRumahModel;
use BusinessProcessRoot\Models\FasilitasLayananKesehatan as FasilitasLayananKesehatanModel;
use BusinessProcessRoot\Models\GolonganDarah as GolonganDarahModel;
use BusinessProcessRoot\Models\HubunganDenganKepalaKeluarga as HubunganDenganKepalaKeluargaModel;
use BusinessProcessRoot\Models\JenisJaminanSosial as JenisJaminanSosialModel;
use BusinessProcessRoot\Models\JenisPenyakit as JenisPenyakitModel;
use BusinessProcessRoot\Models\JumlahAktivitasWisataBulanan as JumlahAktivitasWisataBulananModel;
use BusinessProcessRoot\Models\JumlahBiayaWisataBulanan as JumlahBiayaWisataBulananModel;

use BusinessProcessRoot\Models\KebiasaanBerobat as KebiasaanBerobatModel;
use BusinessProcessRoot\Models\Kecamatan as KecamatanModel;
use BusinessProcessRoot\Models\KeteranganSumberAirMinum as KeteranganSumberAirMinumModel;
use BusinessProcessRoot\Models\KewajibanWajibPajakRetribusi as KewajibanWajibPajakRetribusiModel;
use BusinessProcessRoot\Models\KondisiSaatPengukuran as KondisiSaatPengukuranModel;
use BusinessProcessRoot\Models\KualitasBayi as KualitasBayiModel;
use BusinessProcessRoot\Models\KualitasIbuHamil as KualitasIbuHamilModel;
use BusinessProcessRoot\Models\LabaPerBulan as LabaPerBulanModel;
use BusinessProcessRoot\Models\LamaWaktu as LamaWaktuModel;
use BusinessProcessRoot\Models\LantaiRumah as LantaiRumahModel;
use BusinessProcessRoot\Models\LembagaPemerintahan as LembagaPemerintahanModel;
use BusinessProcessRoot\Models\LembagaPendidikan as LembagaPendidikanModel;
use BusinessProcessRoot\Models\LembagaKemasyarakatan as LembagaKemasyarakatanModel;
use BusinessProcessRoot\Models\LokasiObjekWisata as LokasiObjekWisataModel;
use BusinessProcessRoot\Models\LuasPekaranganRumah as LuasPekaranganRumahModel;
use BusinessProcessRoot\Models\MataPencaharianPokok as MataPencaharianPokokModel;
use BusinessProcessRoot\Models\Modal as ModalModel;
use BusinessProcessRoot\Models\PolaMakan as PolaMakanModel;
use BusinessProcessRoot\Models\PemanfaatanDanauDkk as PemanfaatanWadukDkkModel;
use BusinessProcessRoot\Models\PenderitaSakitKelainan as PenderitaSakitKelainanModel;
use BusinessProcessRoot\Models\PendidikanTerakhir as PendidikanTerakhirModel;
use BusinessProcessRoot\Models\PerilakuHidupBersih as PerilakuHidupBersihModel;
use BusinessProcessRoot\Models\PertolonganPersalinan as PertolonganPersalinanModel;
use BusinessProcessRoot\Models\RatingNilai as RatingNilaiModel;
use BusinessProcessRoot\Models\SaranaMck as SaranaMckModel;
use BusinessProcessRoot\Models\SumberModal as SumberModalModel;
use BusinessProcessRoot\Models\SumberAirMinum as SumberAirMinumModel;
use BusinessProcessRoot\Models\StatusDomisili as StatusDomisiliModel;
use BusinessProcessRoot\Models\StatusGiziBalita as StatusGiziBalitaModel;
use BusinessProcessRoot\Models\StatusKemiskinan as StatusKemiskinanModel;
use BusinessProcessRoot\Models\StatusKepemilikanRumah as StatusKepemilikanRumahModel;
use BusinessProcessRoot\Models\StatusPerkawinan as StatusPerkawinanModel;
use BusinessProcessRoot\Models\TempatPersalinan as TempatPersalinanModel;
use BusinessProcessRoot\Models\TinggiBadan as TinggiBadanModel;
use BusinessProcessRoot\Models\UangPerBulan as UangPerBulanModel;
use BusinessProcessRoot\Models\UmurBalita as UmurBalitaModel;
use BusinessProcessRoot\Models\WajibIuran as WajibIuranModel;

class Dashboard extends DefaultAdminViewController{
	
	public function __construct(){
		parent::__construct();

		$this->set_data_view("menu","general");

		$data_css_rd = array(
			'dashboard.css'
		);

		$this->set_css_data($data_css_rd,"top","last","assets/admin/custom/css/");

		$data_pl_top = array(
			'flot/jquery.flot.js','flot/plugins/jquery.flot.resize.js',
			'flot/plugins/jquery.flot.pie.js'
		);

		$data_js_rd = array(
			'data-kecamatan.js'
		);

		$this->set_js_data($data_js_rd,"bottom","last","assets/admin/custom/js/");

		$this->set_js_data($data_pl_top,"bottom","last","assets/admin/plugins/");
	}

	public function cari_kk(){
		$data_js_rd = array(
			'dashboard.js'
		);

		$this->set_js_data($data_js_rd,"bottom","last","assets/admin/custom/js/");

		$this->set_data_view("submenu","carikk");
		return $this->tc_view("AdminpageView\main\cari_kk");
	}

	public function landing_page(){
		$data_js_rd = array(
			'dashboard.js'
		);

		$this->set_js_data($data_js_rd,"bottom","last","assets/admin/custom/js/");

		$this->set_data_view("submenu","overall");
		return $this->tc_view("AdminpageView\main\dashboard");
	}

	public function insert_data(){
		$data_js_rd = array(
			'input_data.js'
		);

		$this->set_js_data($data_js_rd,"bottom","last","assets/admin/custom/js/");

		$this->set_data_view("submenu","insert");

		$akb_model = new AcceptorKbModel();
		$agama_model = new AgamaModel();
		$ael_model = new AktivitasEkonomiLainnyaModel();
		$al_model = new AsetLainnyaModel();
		$asp_model = new AsetSaranaProduksiModel();
		$aset_tambang_model = new AsetTambangModel();
		$at_model = new AsetTanahModel();
		$atu_model = new AsetTransportasiUmumModel();
		$ar_model = new AtapRumahModel();
		$bb_model = new BeratBadanModel();
		$cf_model = new CacatFisikModel();
		$cm_model = new CacatMentalModel();
		$ci_model = new CakupanImunisasiModel();
		$dl_model = new DayaListrikModel();
		$dr_model = new DindingRumahModel();
		$flk_model = new FasilitasLayananKesehatanModel();
		$gd_model = new GolonganDarahModel();
		$hdkk_model = new HubunganDenganKepalaKeluargaModel();
		$jjs_model = new JenisJaminanSosialModel();
		$jp_model = new JenisPenyakitModel();
		$jawb_model = new JumlahAktivitasWisataBulananModel();
		$jbwb_model = new JumlahBiayaWisataBulananModel();
		$k_ber_model = new KebiasaanBerobatModel();
		$kc_model = new KecamatanModel();
		$ket_model = new KeteranganSumberAirMinumModel();
		$kwpr_model = new KewajibanWajibPajakRetribusiModel();
		$ksp_model = new KondisiSaatPengukuranModel();
		$kb_model = new KualitasBayiModel();
		$kih_model = new KualitasIbuHamilModel();
		$lpb_model = new LabaPerBulanModel();
		$lw_model = new LamaWaktuModel();
		$lr_model = new LantaiRumahModel();
		$lpr_model = new LuasPekaranganRumahModel();
		$lp_model = new LembagaPemerintahanModel();
		$lpen_model = new LembagaPendidikanModel();
		$lk_model = new LembagaKemasyarakatanModel();
		$low_model = new LokasiObjekWisataModel();
		$mmp_model = new MataPencaharianPokokModel();
		$m_model = new ModalModel();
		$pwd_model = new PemanfaatanWadukDkkModel();
		$psk_model = new PenderitaSakitKelainanModel();
		$pt_model = new PendidikanTerakhirModel();
		$phb_model = new PerilakuHidupBersihModel();
		$pp_model = new PertolonganPersalinanModel();
		$pm_model = new PolaMakanModel();
		$r_model = new RatingNilaiModel();
		$smck_model = new SaranaMckModel();
		$sd_model = new StatusDomisiliModel();
		$sgb_model = new StatusGiziBalitaModel();
		$skr_model = new StatusKepemilikanRumahModel();
		$skwn_model = new StatusPerkawinanModel();
		$sk_model = new StatusKemiskinanModel();
		$sam_model = new SumberAirMinumModel();
		$sm_model = new SumberModalModel();
		$tp_model = new TempatPersalinanModel();
		$tb_model = new TinggiBadanModel();
		$upb_model = new UangPerBulanModel();
		$ub_model = new UmurBalitaModel();
		$wi_model = new WajibIuranModel();

		$akseptor_kb = $akb_model->findAll();
		$agama = $agama_model->findAll();
		$aset_lainnya = $al_model->findAll();
		$aktivitas_ekonomi_lainnya = $ael_model->findAll();
		$aset_sarana_produksi = $asp_model->findAll();
		$aset_tambang = $aset_tambang_model->findAll();
		$aset_tanah = $at_model->findAll();
		$aset_transportasi_umum = $atu_model->findAll();
		$atap_rumah = $ar_model->findAll();
		$berat_badan = $bb_model->findAll();
		$cacat_fisik = $cf_model->findAll();
		$cacat_mental = $cm_model->findAll();
		$cakupan_imunisasi = $ci_model->findAll();
		$daya_listrik = $dl_model->findAll();
		$dinding_rumah = $dr_model->findAll();
		$fasilitas_layanan_kesehatan = $flk_model->findAll();
		$golongan_darah = $gd_model->findAll();
		$hubungan_dengan_kepala_keluarga = $hdkk_model->findAll();
		$jenis_penyakit = $jp_model->findAll();
		$jenis_jaminan_sosial = $jjs_model->findAll();
		$jumlah_aktivitas_wisata_bulanan = $jawb_model->findAll();
		$jumlah_biaya_wisata_bulanan = $jbwb_model->findAll();
		$kebiasaan_berobat = $k_ber_model->findAll();
		$kecamatan = $kc_model->findAll();
		$keterangan = $ket_model->findAll();
		$kewajiban_wajib_pajak_retribusi = $kwpr_model->findAll();
		$kondisi_saat_pengukuran = $ksp_model->findAll();
		$kualitas_bayi = $kb_model->findAll();
		$kualitas_ibu_hamil = $kih_model->findAll();
		$laba_per_bulan = $lpb_model->findAll();
		$lama_waktu = $lw_model->findAll();
		$lantai_rumah = $lr_model->findAll();
		$lembaga_pemerintahan = $lp_model->findAll();
		$lembaga_pendidikan = $lpen_model->findAll();
		$lembaga_kemasyarakatan = $lk_model->findAll();
		$lokasi_objek_wisata = $low_model->findAll();
		$luas_pekarangan_rumah = $lpr_model->findAll();
		$mata_pencaharian_pokok = $mmp_model->findAll();
		$modal = $m_model->findAll();
		$pemanfaatan_danau_dkk = $pwd_model->findAll();
		$penderita_sakit_kelainan = $psk_model->findAll();
		$pendidikan_terakhir = $pt_model->findAll();
		$perilaku_hidup_bersih = $phb_model->findAll();
		$pertolongan_persalinan =$pp_model->findAll();
		$pola_makan = $pm_model->findAll();
		$rating = $r_model->findAll();
		$sarana_mck = $smck_model->findAll();
		$status_domisili = $sd_model->findAll();
		$status_gizi_balita = $sgb_model->findAll();
		$status_kemiskinan = $sk_model->findAll();
		$status_kepemilikan_rumah = $skr_model->findAll();
		$status_perkawinan = $skwn_model->findAll();
		$sumber_air_minum = $sam_model->findAll();
		$sumber_modal = $sm_model->findAll();
		$tempat_persalinan = $tp_model->findAll();
		$tinggi_badan = $tb_model->findAll();
		$uang_per_bulan = $upb_model->findAll();
		$umur_balita = $ub_model->findAll();
		$wajib_iuran = $wi_model->findAll();

		$this->set_data_view("agama",$agama);
		$this->set_data_view("aktivitas_ekonomi_lainnya",$aktivitas_ekonomi_lainnya);
		$this->set_data_view("akseptor_kb",$akseptor_kb);
		$this->set_data_view("aset_lainnya",$aset_lainnya);
		$this->set_data_view("aset_sarana_produksi",$aset_sarana_produksi);
		$this->set_data_view("aset_tambang",$aset_tambang);
		$this->set_data_view("aset_tanah",$aset_tanah);
		$this->set_data_view("aset_transportasi_umum",$aset_transportasi_umum);
		$this->set_data_view("atap_rumah",$atap_rumah);
		$this->set_data_view("berat_badan",$berat_badan);
		$this->set_data_view("cacat_fisik",$cacat_fisik);
		$this->set_data_view("cacat_mental",$cacat_mental);
		$this->set_data_view("cakupan_imunisasi",$cakupan_imunisasi);
		$this->set_data_view("daya_listrik",$daya_listrik);
		$this->set_data_view("fasilitas_layanan_kesehatan",$fasilitas_layanan_kesehatan);
		$this->set_data_view("dinding_rumah",$dinding_rumah);
		$this->set_data_view("golongan_darah",$golongan_darah);
		$this->set_data_view("hubungan_dengan_kepala_keluarga",$hubungan_dengan_kepala_keluarga);
		$this->set_data_view("jenis_penyakit",$jenis_penyakit);
		$this->set_data_view("jenis_jaminan_sosial",$jenis_jaminan_sosial);
		$this->set_data_view("jumlah_aktivitas_wisata_bulanan",$jumlah_aktivitas_wisata_bulanan);
		$this->set_data_view("jumlah_biaya_wisata_bulanan",$jumlah_biaya_wisata_bulanan);
		$this->set_data_view("kebiasaan_berobat",$kebiasaan_berobat);
		$this->set_data_view("kecamatan",$kecamatan);
		$this->set_data_view("keterangan",$keterangan);
		$this->set_data_view("kewajiban_wajib_pajak_retribusi",$kewajiban_wajib_pajak_retribusi);
		$this->set_data_view("kondisi_saat_pengukuran",$kondisi_saat_pengukuran);
		$this->set_data_view("kualitas_bayi",$kualitas_bayi);
		$this->set_data_view("kualitas_ibu_hamil",$kualitas_ibu_hamil);
		$this->set_data_view("laba_per_bulan",$laba_per_bulan);
		$this->set_data_view("lama_waktu",$lama_waktu);
		$this->set_data_view("lantai_rumah",$lantai_rumah);
		$this->set_data_view("lembaga_pemerintahan",$lembaga_pemerintahan);
		$this->set_data_view("lembaga_pendidikan",$lembaga_pendidikan);
		$this->set_data_view("lembaga_kemasyarakatan",$lembaga_kemasyarakatan);
		$this->set_data_view("lokasi_objek_wisata",$lokasi_objek_wisata);
		$this->set_data_view("luas_pekarangan_rumah",$luas_pekarangan_rumah);
		$this->set_data_view("mata_pencaharian_pokok",$mata_pencaharian_pokok);
		$this->set_data_view("modal",$modal);
		$this->set_data_view("pemanfaatan_danau_dkk",$pemanfaatan_danau_dkk);
		$this->set_data_view("penderita_sakit_kelainan",$penderita_sakit_kelainan);
		$this->set_data_view("perilaku_hidup_bersih",$perilaku_hidup_bersih);
		$this->set_data_view("pendidikan_terakhir",$pendidikan_terakhir);
		$this->set_data_view("pertolongan_persalinan",$pertolongan_persalinan);
		$this->set_data_view("pola_makan",$pola_makan);
		$this->set_data_view("rating_nilai",$rating);
		$this->set_data_view("sarana_mck",$sarana_mck);
		$this->set_data_view("status_domisili",$status_domisili);
		$this->set_data_view("status_gizi_balita",$status_gizi_balita);
		$this->set_data_view("status_kemiskinan",$status_kemiskinan);
		$this->set_data_view("status_kepemilikan_rumah",$status_kepemilikan_rumah);
		$this->set_data_view("status_perkawinan",$status_perkawinan);
		$this->set_data_view("sumber_air_minum",$sumber_air_minum);
		$this->set_data_view("sumber_modal",$sumber_modal);
		$this->set_data_view("uang_per_bulan",$uang_per_bulan);
		$this->set_data_view("tempat_persalinan",$tempat_persalinan);
		$this->set_data_view("tinggi_badan",$tinggi_badan);
		$this->set_data_view("umur_balita",$umur_balita);
		$this->set_data_view("wajib_iuran",$wajib_iuran);

		return $this->tc_view("AdminpageView\main\insert_data");
	}

	public function kobo_collect(){
		$this->set_data_view("submenu","kobo-collect");
		return $this->tc_view("AdminpageView\main\kobo_collect");	
	}

	public function error_validate_error(){
		$validate_error = $this->session_handling->getFlashdata("validate_error");

		$content = $this->setErrorHandlerContent($validate_error);

		$this->set_data_view("message_title","Something is not right");
		$this->set_data_view("message_content",$content);

		echo $this->tc_view("Admin\Template\Views\generalnotif\\error");	
	}
}
