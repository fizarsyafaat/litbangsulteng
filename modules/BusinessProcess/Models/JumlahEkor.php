<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class JumlahEkor extends Model
{
    protected $table      = 'jumlah_ekor';
    protected $primaryKey = 'jumlah_ekor_id';

    protected $returnType = "BusinessProcessRoot\Entities\JumlahEkor";
    protected $allowedFields = array('nama_jumlah_ekor');
}
