<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class AsetLainnya extends Model
{
    protected $table      = 'aset_lainnya';
    protected $primaryKey = 'aset_lainnya_id';

    protected $returnType = "BusinessProcessRoot\Entities\AsetLainnya";
    protected $allowedFields = array('nama_aset_lainnya');
}