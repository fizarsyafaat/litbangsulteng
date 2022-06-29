<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class AcceptorKb extends Model
{
    protected $table      = 'acceptor_kb';
    protected $primaryKey = 'acceptor_kb_id';

    protected $returnType = "BusinessProcessRoot\Entities\AcceptorKb";
    protected $allowedFields = array('nama_acceptor_kb');
}