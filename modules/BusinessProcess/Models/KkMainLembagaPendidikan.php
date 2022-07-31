<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainLembagaPendidikan extends Model
{ 	 	 	
    protected $table      = 'kk_main_lembaga_pendidikan';
    protected $primaryKey = 'kk_main_lembaga_pendidikan_id';

    protected $returnType = "BusinessProcessRoot\Entities\KkMainLembagaPendidikan";
    protected $allowedFields = array('kk_id','lembaga_pendidikan');

        public function get_filter_data_pendidikan($data){
        $db = \Config\Database::connect();
 
        $builder = $db->table('kk_main_lembaga_pendidikan');
        $builderClone = $builder;

        $builder->join("kk_main",'kk_main_lembaga_pendidikan.kk_id = kk_main.kk_id');
        $builder->join("kelurahan","kk_main.kelurahan = kelurahan.id_kelurahan");

        if(isset($data['kecamatan'])){
            $builder->where("id_kecamatan =",$data['kecamatan']);
        }
        if(isset($data['kelurahan'])){
            $builder->where("id_kelurahan =",$data['kelurahan']);
        }
        if(isset($data['lembaga_pendidikan'])){
            $builder->where("lembaga_pendidikan =",$data['lembaga_pendidikan']);
        }

        $query = $builder->get()->getResult("BusinessProcessRoot\Entities\KkMainLembagaPendidikan");

        return $query;
    }

} 