<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class AsetSaranaProduksi extends Model
{
    protected $table      = 'aset_sarana_produksi';
    protected $primaryKey = 'aset_sarana_produksi_id';

    protected $returnType = "BusinessProcessRoot\Entities\AsetSaranaProduksi";
    protected $allowedFields = array('nama_aset_sarana_produksi');
}