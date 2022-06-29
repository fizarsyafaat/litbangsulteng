<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainKesehatan extends Model
{
    protected $table      = 'kk_main_kesehatan';
    protected $primaryKey = 'kk_main_kesehatan_id';

    protected $returnType = "BusinessProcessRoot\Entities\KkMainKesehatan";
    protected $allowedFields = array('kk_id','penderita_sakit_kelainan','perilaku_hidup_bersih','pola_makan','kebiasaan_berobat','jenis_penyakit');
}