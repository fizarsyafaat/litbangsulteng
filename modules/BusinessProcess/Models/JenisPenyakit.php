<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class JenisPenyakit extends Model
{
    protected $table      = 'jenis_penyakit';
    protected $primaryKey = 'jenis_penyakit_id';

    protected $returnType = "BusinessProcessRoot\Entities\JenisPenyakit";
    protected $allowedFields = array('nama_jenis_penyakit');
}