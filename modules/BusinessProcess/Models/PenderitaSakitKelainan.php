<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class PenderitaSakitKelainan extends Model
{ 	 	 	
    protected $table      = 'penderita_sakit_kelainan';
    protected $primaryKey = 'penderita_sakit_kelainan_id';

    protected $returnType = "BusinessProcessRoot\Entities\PenderitaSakitKelainan";
}