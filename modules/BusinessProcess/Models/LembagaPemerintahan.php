<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class LembagaPemerintahan extends Model
{ 	 	 	
    protected $table      = 'lembaga_pemerintahan';
    protected $primaryKey = 'lembaga_pemerintahan_id';

    protected $returnType = "BusinessProcessRoot\Entities\LembagaPemerintahan";
}