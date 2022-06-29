<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainCakupanImunisasi extends Model
{
    protected $table      = 'kk_main_cakupan_imunisasi';
    protected $primaryKey = 'kk_main_cakupan_imunisasi_id'; 	

    protected $returnType = "BusinessProcessRoot\Entities\KkMainCakupanImunisasi";
    protected $allowedFields = array('kk_id','cakupan_imunisasi');
}