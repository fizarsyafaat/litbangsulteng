<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class JumlahUnitAlatTangkap extends Model
{
    protected $table      = 'jumlah_unit_alat_tangkap';
    protected $primaryKey = 'jumlah_unit_alat_tangkap_id';

    protected $returnType = "BusinessProcessRoot\Entities\JumlahUnitAlatTangkap";
    protected $allowedFields = array('nama_jumlah_unit_alat_tangkap');
}