<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class UangPerBulan extends Model
{ 	 	 	
    protected $table      = 'uang_per_bulan';
    protected $primaryKey = 'uang_per_bulan_id';

    protected $returnType = "BusinessProcessRoot\Entities\UangPerBulan";
}