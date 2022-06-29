<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainAsetBuahBuahan extends Model
{ 	
    protected $table      = 'kk_main_aset_buah_buahan';
    protected $primaryKey = 'kk_main_aset_buah_buahan_id';
    protected $returnType = "BusinessProcessRoot\Entities\KkMainAsetBuahBuahan";
    protected $allowedFields = array('kk_id','jenis_komoditas','luas_panen','jumlah_produksi','jumlah_pohon','jenis_bibit','pestisida','pupuk_organik','pupuk_pabrik','lokasi','hasil_pemasaran');
}