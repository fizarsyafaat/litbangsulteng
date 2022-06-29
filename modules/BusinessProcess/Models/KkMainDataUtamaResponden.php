<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainDataUtamaResponden extends Model
{
    protected $table      = 'kk_main_data_utama_responden';
    protected $primaryKey = 'data_utama_responden_id';
 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	
    protected $returnType = "BusinessProcessRoot\Entities\KkMainDataUtamaResponden";
    protected $allowedFields = array('kk_id','nik_responden','nama_lengkap','jenis_kelamin','hubungan_dengan_kepala_keluarga','status_perkawinan','agama','golongan_darah','kewarganegaraan','etnis_suku','pendidikan_terakhir','status_domisili','cacat_fisik','cacat_mental','status_kemiskinan','pengguna_bpjs','jenis_jaminan_sosial','lama_waktu','wajib_iuran');
}