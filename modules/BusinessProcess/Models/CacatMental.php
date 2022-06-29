<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class CacatMental extends Model
{
    protected $table      = 'cacat_mental';
    protected $primaryKey = 'cacat_mental_id';

    protected $returnType = "BusinessProcessRoot\Entities\CacatMental";
    protected $allowedFields = array('nama_cacat_mental');
}