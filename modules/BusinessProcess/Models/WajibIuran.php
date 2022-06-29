<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class WajibIuran extends Model
{ 	 	 	
    protected $table      = 'wajib_iuran';
    protected $primaryKey = 'wajib_iuran_id';

    protected $returnType = "BusinessProcessRoot\Entities\WajibIuran";
}