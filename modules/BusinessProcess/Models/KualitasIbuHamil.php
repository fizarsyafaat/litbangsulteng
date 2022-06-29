<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KualitasIbuHamil extends Model
{ 	 	 	
    protected $table      = 'kualitas_ibu_hamil';
    protected $primaryKey = 'kualitas_ibu_hamil_id';

    protected $returnType = "BusinessProcessRoot\Entities\KualitasIbuHamil";
}