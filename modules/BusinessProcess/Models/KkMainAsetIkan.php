<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainAsetIkan extends Model
{
    protected $table      = 'kk_main_aset_ikan';
    protected $primaryKey = 'kk_main_aset_ikan_id';

    protected $returnType = "BusinessProcessRoot\Entities\KkMainAsetIkan";
    protected $allowedFields = array('kk_id','jenis_komoditas','luas_panen','jumlah_produksi','hasil_pemasaran','jumlah_ikan','jenis_bibit_ikan','jenis_pakan');
}