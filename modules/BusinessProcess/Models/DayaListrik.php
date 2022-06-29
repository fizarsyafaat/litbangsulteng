<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class DayaListrik extends Model
{
    protected $table      = 'daya_listrik';
    protected $primaryKey = 'daya_listrik_id';

    protected $returnType = "BusinessProcessRoot\Entities\DayaListrik";
    protected $allowedFields = array('nama_daya_listrik');
}