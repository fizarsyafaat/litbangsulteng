<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainSumberModal extends Model
{ 	 	 	
    protected $table      = 'kk_main_sumber_modal';
    protected $primaryKey = 'kk_main_sumber_modal_id';

    protected $returnType = "BusinessProcessRoot\Entities\KkMainSumberModal";
    protected $allowedFields = array('kk_id','sumber_modal_id');
}