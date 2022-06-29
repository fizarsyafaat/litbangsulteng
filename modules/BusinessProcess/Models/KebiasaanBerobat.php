<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KebiasaanBerobat extends Model
{
    protected $table      = 'kebiasaan_berobat';
    protected $primaryKey = 'kebiasaan_berobat_id';

    protected $returnType = "BusinessProcessRoot\Entities\KebiasaanBerobat";
    protected $allowedFields = array('nama_kebiasaan_berobat');
}