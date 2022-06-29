<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class TinggiBadan extends Model
{ 	 	 	
    protected $table      = 'tinggi_badan';
    protected $primaryKey = 'tinggi_badan_id';

    protected $returnType = "BusinessProcessRoot\Entities\TinggiBadan";
}