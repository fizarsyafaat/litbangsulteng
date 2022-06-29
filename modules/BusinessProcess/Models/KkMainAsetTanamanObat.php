<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainAsetTanamanObat extends Model
{
    protected $table      = 'kk_main_aset_tanaman_obat';
    protected $primaryKey = 'kk_main_aset_perkebunan_id'; 	

    protected $returnType = "BusinessProcessRoot\Entities\KkMainAsetTanamanObat";
    protected $allowedFields = array('kk_id','jenis_komoditas','luas_panen','jumlah_produksi','jumlah_pohon','jenis_bibit','pestisida','pupuk_organik','pupuk_pabrik','lokasi','hasil_pemasaran');
}