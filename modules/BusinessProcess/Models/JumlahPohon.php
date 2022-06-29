<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class JumlahPohon extends Model
{
    protected $table      = 'jumlah_pohon';
    protected $primaryKey = 'jumlah_pohon_id';

    protected $returnType = "BusinessProcessRoot\Entities\JumlahPohon";
    protected $allowedFields = array('nama_jumlah_pohon');
}
