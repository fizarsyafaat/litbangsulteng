<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class LuasPanenIkan extends Model
{ 	 	 	
    protected $table      = 'luas_panen_ikan';
    protected $primaryKey = 'luas_panen_ikan_id';

    protected $returnType = "BusinessProcessRoot\Entities\LuasPanenIkan";
}