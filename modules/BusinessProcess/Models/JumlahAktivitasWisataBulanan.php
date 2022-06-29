<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class JumlahAktivitasWisataBulanan extends Model
{
    protected $table      = 'jumlah_aktivitas_wisata_bulanan';
    protected $primaryKey = 'jumlah_aktivitas_wisata_bulanan_id';

    protected $returnType = "BusinessProcessRoot\Entities\JumlahAktivitasWisataBulanan";
    protected $allowedFields = array('nama_jenis_penyakit');
}