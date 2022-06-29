<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class BeratBadan extends Model
{
    protected $table      = 'berat_badan';
    protected $primaryKey = 'berat_badan_id';

    protected $returnType = "BusinessProcessRoot\Entities\BeratBadan";
    protected $allowedFields = array('nama_berat_badan');
}