<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class GolonganDarah extends Model
{
    protected $table      = 'golongan_darah';
    protected $primaryKey = 'golongan_darah_id';

    protected $returnType = "BusinessProcessRoot\Entities\GolonganDarah";
    protected $allowedFields = array('nama_golongan_darah');
}