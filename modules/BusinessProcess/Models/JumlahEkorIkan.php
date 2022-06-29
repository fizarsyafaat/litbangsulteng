<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class JumlahEkorIkan extends Model
{
    protected $table      = 'jumlah_ekor_ikan';
    protected $primaryKey = 'jumlah_ekor_ikan_id';

    protected $returnType = "BusinessProcessRoot\Entities\JumlahEkorIkan";
    protected $allowedFields = array('nama_jumlah_ekor_ikan');
}
