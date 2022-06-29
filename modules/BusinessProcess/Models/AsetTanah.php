<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class AsetTanah extends Model
{
    protected $table      = 'aset_tanah';
    protected $primaryKey = 'aset_tanah_id';

    protected $returnType = "BusinessProcessRoot\Entities\AsetTanah";
    protected $allowedFields = array('nama_aset_tanah');
}