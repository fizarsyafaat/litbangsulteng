<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class StatusGiziBalita extends Model
{ 	 	 	
    protected $table      = 'status_gizi_balita';
    protected $primaryKey = 'status_gizi_balita_id';

    protected $returnType = "BusinessProcessRoot\Entities\StatusGiziBalita";
}