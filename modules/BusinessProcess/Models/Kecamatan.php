<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class Kecamatan extends Model
{ 	
    protected $table      = 'kecamatan';
    protected $primaryKey = 'id_kecamatan';

    protected $returnType = "BusinessProcessRoot\Entities\Kecamatan";
    protected $allowedFields = array('nama_kecamatan','id_kota');
}