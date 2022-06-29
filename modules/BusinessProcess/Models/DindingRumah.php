<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class DindingRumah extends Model
{
    protected $table      = 'dinding_rumah';
    protected $primaryKey = 'dinding_rumah_id';

    protected $returnType = "BusinessProcessRoot\Entities\DindingRumah";
    protected $allowedFields = array('nama_dinding_rumah');
}