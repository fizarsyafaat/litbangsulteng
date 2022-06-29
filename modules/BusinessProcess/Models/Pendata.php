<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class Pendata extends Model
{ 	 	 	
    protected $table      = 'pendata';
    protected $primaryKey = 'id_pendata';

    protected $returnType = "BusinessProcessRoot\Entities\Pendata";
    protected $allowedFields = array('kk_id','pekerjaan','jabatan','sumber_data','no_handphone','nama');
}