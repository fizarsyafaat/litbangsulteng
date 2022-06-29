<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class AktivitasEkonomiLainnya extends Model
{
    protected $table      = 'aktivitas_ekonomi_lainnya';
    protected $primaryKey = 'aktivitas_ekonomi_lainnya_id';

    protected $returnType = "BusinessProcessRoot\Entities\AktivitasEkonomiLainnya";
    protected $allowedFields = array('nama_aktivitas_ekonomi_lainnya');
}