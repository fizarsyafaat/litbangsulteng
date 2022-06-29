<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainDataPekerjaanDanOrganisasi extends Model
{
    protected $table      = 'kk_main_data_pekerjaan_dan_organisasi';
    protected $primaryKey = 'kk_main_data_pekerjaan_dan_organisasi_id';

    protected $returnType = "BusinessProcessRoot\Entities\KkMainDataPekerjaanDanOrganisasi";
    protected $allowedFields = array('kk_id','laba_per_bulan','penghasilan_per_bulan','pengeluaran_per_bulan','mata_pencaharian_pokok','sumber_modal','modal','aktivitas_ekonomi','lembaga_kemasyarakatan');
}