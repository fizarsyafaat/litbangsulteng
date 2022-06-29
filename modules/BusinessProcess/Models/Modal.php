<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class Modal extends Model
{ 	 	 	
    protected $table      = 'modal';
    protected $primaryKey = 'modal_id';

    protected $returnType = "BusinessProcessRoot\Entities\Modal";
}