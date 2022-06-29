<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainAcceptorKb extends Model
{ 	
    protected $table      = 'kk_main_acceptor_kb';
    protected $primaryKey = 'kk_main_acceptor_kb_id';
 	 	 	
    protected $returnType = "BusinessProcessRoot\Entities\KkMainAcceptorKb";
    protected $allowedFields = array('kk_id','acceptor_kb_id');
}