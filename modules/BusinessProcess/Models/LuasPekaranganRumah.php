<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class LuasPekaranganRumah extends Model
{ 	 	 	
    protected $table      = 'luas_pekarangan_rumah';
    protected $primaryKey = 'luas_pekarangan_rumah_id';

    protected $returnType = "BusinessProcessRoot\Entities\LuasPekaranganRumah";
}