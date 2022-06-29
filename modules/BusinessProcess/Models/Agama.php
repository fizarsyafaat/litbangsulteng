<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class Agama extends Model
{
    protected $table      = 'agama';
    protected $primaryKey = 'agama_id';

    protected $returnType = "BusinessProcessRoot\Entities\Agama";
    protected $allowedFields = array('nama_agama');
}