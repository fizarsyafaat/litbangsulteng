<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class AsetTransportasiUmum extends Model
{
    protected $table      = 'aset_transportasi_umum';
    protected $primaryKey = 'aset_transportasi_umum_id';

    protected $returnType = "BusinessProcessRoot\Entities\AsetTransportasiUmum";
    protected $allowedFields = array('nama_aset_transportasi_umum');
}
