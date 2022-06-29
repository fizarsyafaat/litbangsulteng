<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class RatingNilai extends Model
{ 	 	 	
    protected $table      = 'rating_nilai';
    protected $primaryKey = 'rating_nilai_id';

    protected $returnType = "BusinessProcessRoot\Entities\RatingNilai";
}