<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainAsetIkanTangkap extends Model
{
    protected $table      = 'kk_main_aset_ikan_tangkap';
    protected $primaryKey = 'kk_main_aset_ikan_tangkap_id';

    protected $returnType = "BusinessProcessRoot\Entities\KkMainAsetIkanTangkap";
    protected $allowedFields = array('kk_id','alat_tangkap','jumlah_unit');
}