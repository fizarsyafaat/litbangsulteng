<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class CacatFisik extends Model
{
    protected $table      = 'cacat_fisik';
    protected $primaryKey = 'cacat_fisik_id';

    protected $returnType = "BusinessProcessRoot\Entities\CacatFisik";
    protected $allowedFields = array('nama_cacat_fisik');
}