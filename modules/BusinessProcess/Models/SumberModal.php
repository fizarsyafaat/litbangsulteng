<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class SumberModal extends Model
{ 	 	 	
    protected $table      = 'sumber_modal';
    protected $primaryKey = 'sumber_modal_id';

    protected $returnType = "BusinessProcessRoot\Entities\SumberModal";
}