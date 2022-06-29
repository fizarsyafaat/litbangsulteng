<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class Ktp extends Model
{
    protected $table      = 'ktp';
    protected $primaryKey = 'ktp_id';

    protected $returnType = "BusinessProcessRoot\Entities\Ktp";
}