<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class PerilakuHidupBersih extends Model
{ 	 	 	
    protected $table      = 'perilaku_hidup_bersih';
    protected $primaryKey = 'perilaku_hidup_bersih_id';

    protected $returnType = "BusinessProcessRoot\Entities\PerilakuHidupBersih";
}