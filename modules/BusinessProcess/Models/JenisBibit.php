<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class JenisBibit extends Model
{
    protected $table      = 'jenis_bibit';
    protected $primaryKey = 'jenis_bibit_id';

    protected $returnType = "BusinessProcessRoot\Entities\JenisBibit";
    protected $allowedFields = array('nama_jenis_bibit');
}