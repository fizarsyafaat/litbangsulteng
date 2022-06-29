<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class FasilitasLayananKesehatan extends Model
{
    protected $table      = 'fasilitas_layanan_kesehatan';
    protected $primaryKey = 'fasilitas_layanan_kesehatan_id';

    protected $returnType = "BusinessProcessRoot\Entities\FasilitasLayananKesehatan";
    protected $allowedFields = array('nama_fasilitas_layanan_kesehatan');
}