<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class JenisJaminanSosial extends Model
{
    protected $table      = 'jenis_jaminan_sosial';
    protected $primaryKey = 'jenis_jaminan_sosial_id';

    protected $returnType = "BusinessProcessRoot\Entities\JenisJaminanSosial";
    protected $allowedFields = array('nama_jenis_jaminan_sosial');
}