<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainAsetTransportasiUmum extends Model
{
    protected $table      = 'kk_main_aset_transportasi_umum';
    protected $primaryKey = 'kk_main_aset_transportasi_umum_id'; 	

    protected $returnType = "BusinessProcessRoot\Entities\KkMainAsetTransportasiUmum";
    protected $allowedFields = array('kk_id','aset_transportasi');
}