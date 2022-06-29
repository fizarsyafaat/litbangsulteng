<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KeteranganSumberAirMinum extends Model
{ 	
    protected $table      = 'keterangan_sumber_air_minum';
    protected $primaryKey = 'keterangan_sumber_air_minum_id';

    protected $returnType = "BusinessProcessRoot\Entities\KeteranganSumberAirMinum";
    protected $allowedFields = array('nama_keterangan_sumber_air_minum');
}