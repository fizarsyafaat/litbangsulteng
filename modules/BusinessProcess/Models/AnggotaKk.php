<?php

namespace BusinessProcessRoot\Entities;

use CodeIgniter\Entity;

class AnggotaKk extends Model
{
    protected $table      = 'anggota_kk';
    protected $primaryKey = 'anggota_kk_id';

    protected $returnType = "BusinessProcessRoot\Entities\AnggotaKk";
    protected $allowedFields = array('kk_id','ktp_id','status_dalam_keluarga','no_passport','no_kitas','ayah','ibu');
}