<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KondisiSaatPengukuran extends Model
{ 	 	 	
    protected $table      = 'kondisi_saat_pengukuran';
    protected $primaryKey = 'kondisi_saat_pengukuran_id';

    protected $returnType = "BusinessProcessRoot\Entities\KondisiSaatPengukuran";
}