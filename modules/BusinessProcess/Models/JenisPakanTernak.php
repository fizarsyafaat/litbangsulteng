<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class JenisPakanTernak extends Model
{
    protected $table      = 'jenis_pakan_ternak';
    protected $primaryKey = 'jenis_pakan_ternak_id';

    protected $returnType = "BusinessProcessRoot\Entities\JenisPakanTernak";
    protected $allowedFields = array('nama_jenis_pakan_ternak');
}