<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class AlatTangkap extends Model
{
    protected $table      = 'alat_tangkap';
    protected $primaryKey = 'alat_tangkap_id';

    protected $returnType = "BusinessProcessRoot\Entities\AlatTangkap";
    protected $allowedFields = array('nama_alat_tangkap');
}