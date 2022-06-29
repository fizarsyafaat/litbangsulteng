<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class CakupanImunisasi extends Model
{
    protected $table      = 'cakupan_imunisasi';
    protected $primaryKey = 'cakupan_imunisasi_id';

    protected $returnType = "BusinessProcessRoot\Entities\CakupanImunisasi";
    protected $allowedFields = array('nama_cakupan_imunisasi');
}