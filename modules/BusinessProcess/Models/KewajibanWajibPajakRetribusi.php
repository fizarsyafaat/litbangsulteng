<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KewajibanWajibPajakRetribusi extends Model
{ 	
    protected $table      = 'kewajiban_wajib_pajak_retribusi';
    protected $primaryKey = 'kewajiban_wajib_pajak_retribusi_id';

    protected $returnType = "BusinessProcessRoot\Entities\KewajibanWajibPajakRetribusi";
    protected $allowedFields = array('nama_kewajiban_wajib_pajak_retribusi');
}