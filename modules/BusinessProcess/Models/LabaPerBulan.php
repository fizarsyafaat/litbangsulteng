<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class LabaPerBulan extends Model
{ 	 	 	
    protected $table      = 'laba_per_bulan';
    protected $primaryKey = 'laba_per_bulan_id';

    protected $returnType = "BusinessProcessRoot\Entities\LabaPerBulan";
}