<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainAsetProduksi extends Model
{
    protected $table      = 'kk_main_aset_produksi';
    protected $primaryKey = 'kk_main_aset_produksi_id'; 	

    protected $returnType = "BusinessProcessRoot\Entities\KkMainAsetProduksi";
    protected $allowedFields = array('kk_id','aset_produksi');
}