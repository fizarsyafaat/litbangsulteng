<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class HasilPemasaran extends Model
{
    protected $table      = 'hasil_pemasaran';
    protected $primaryKey = 'hasil_pemasaran_id';

    protected $returnType = "BusinessProcessRoot\Entities\HasilPemasaran";
    protected $allowedFields = array('nama_hasil_pemasaran');
}