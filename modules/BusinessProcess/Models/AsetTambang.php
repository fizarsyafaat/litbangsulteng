<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class AsetTambang extends Model
{
    protected $table      = 'aset_tambang';
    protected $primaryKey = 'aset_tambang_id';

    protected $returnType = "BusinessProcessRoot\Entities\AsetTambang";
    protected $allowedFields = array('nama_aset_tambang');
}