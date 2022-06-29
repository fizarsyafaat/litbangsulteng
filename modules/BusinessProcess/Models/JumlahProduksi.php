<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class JumlahProduksi extends Model
{
    protected $table      = 'jumlah_produksi';
    protected $primaryKey = 'jumlah_produksi_id';

    protected $returnType = "BusinessProcessRoot\Entities\JumlahProduksi";
    protected $allowedFields = array('nama_jumlah_produksi');
}