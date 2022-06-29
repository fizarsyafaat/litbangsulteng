<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class Kelurahan extends Model
{ 	
    protected $table      = 'kelurahan';
    protected $primaryKey = 'id_kelurahan';

    protected $returnType = "BusinessProcessRoot\Entities\Kelurahan";
    protected $allowedFields = array('nama_kelurahan','id_kecamatan');
}