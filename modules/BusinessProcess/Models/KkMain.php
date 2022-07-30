<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;
 	 	 	 	
class KkMain extends Model
{ 	
    protected $table      = 'kk_main';
    protected $primaryKey = 'kk_id';

    protected $returnType = "BusinessProcessRoot\Entities\KkMain";
    protected $allowedFields = array('no_kk',"kode_pum","alamat","rt","rw","kelurahan","kode_pos","no_k","tanggal_dikeluarkan","pihak_mengeluarkan","kepala_keluarga","data_collection_time");

    public function get_filter_data($data){
        $db = \Config\Database::connect();

        $builder = $db->table('kk_main');
        $builderClone = $builder;

		$builder->join("kk_main_data_utama_responden",'kk_main.kk_id = kk_main_data_utama_responden.kk_id');

        if(isset($data['kecamatan'])){
            $builder->where("id_kecamatan",$data['kecamatan']);
        }
        if(isset($data['kelurahan'])){
            $builder->where("id_kelurahan",$data['kelurahan']);
        }
        if(isset($data['jenis_kelamin'])){
            $builder->where("jenis_kelamin",$data['jenis_kelamin']);
        }
        if(isset($data['agama'])){
            $builder->where("agama",$data['agama']);
        }

        $query = $builder->get()->getResult("BusinessProcessRoot\Entities\KkMainAsetPerkebunan");

        return $query;
    }
}