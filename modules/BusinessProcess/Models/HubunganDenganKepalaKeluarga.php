<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class HubunganDenganKepalaKeluarga extends Model
{
    protected $table      = 'hubungan_dengan_kepala_keluarga';
    protected $primaryKey = 'hubungan_dengan_kepala_keluarga_id';

    protected $returnType = "BusinessProcessRoot\Entities\HubunganDenganKepalaKeluarga";
    protected $allowedFields = array('nama_hubungan_dengan_kepala_keluarga');
}