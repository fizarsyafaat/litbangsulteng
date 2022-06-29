<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class JumlahBiayaWisataBulanan extends Model
{
    protected $table      = 'jumlah_biaya_wisata_bulanan';
    protected $primaryKey = 'jumlah_biaya_wisata_bulanan_id';

    protected $returnType = "BusinessProcessRoot\Entities\JumlahBiayaWisataBulanan";
    protected $allowedFields = array('nama_jumlah_biaya_wisata_bulanan');
}
