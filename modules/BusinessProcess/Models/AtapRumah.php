<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class AtapRumah extends Model
{
    protected $table      = 'atap_rumah';
    protected $primaryKey = 'atap_rumah_id';

    protected $returnType = "BusinessProcessRoot\Entities\AtapRumah";
    protected $allowedFields = array('nama_atap_rumah');
}