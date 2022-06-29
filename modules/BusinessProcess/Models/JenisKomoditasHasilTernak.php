<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class JenisKomoditasHasilTernak extends Model
{
    protected $table      = 'jenis_komoditas_hasil_ternak';
    protected $primaryKey = 'jenis_komoditas_hasil_ternak_id';

    protected $returnType = "BusinessProcessRoot\Entities\JenisKomoditasHasilTernak";
    protected $allowedFields = array('nama_jenis_komoditas_hasil_ternak');
}