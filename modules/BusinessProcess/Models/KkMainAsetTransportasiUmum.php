<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainAsetTransportasiUmum extends Model
{
    protected $table      = 'kk_main_aset_transportasi_umum';
    protected $primaryKey = 'kk_main_aset_transportasi_umum_id'; 	

    protected $returnType = "BusinessProcessRoot\Entities\KkMainAsetTransportasiUmum";
    protected $allowedFields = array('kk_id','aset_transportasi'); 


    public function get_filter_data_transportasi($data){
        $db = \Config\Database::connect();
 
        $builder = $db->table('kk_main_aset_transportasi_umum');
        $builderClone = $builder;

        $builder->join("kk_main",'kk_main_aset_transportasi_umum.kk_id = kk_main.kk_id');
        $builder->join("kelurahan","kk_main.kelurahan = kelurahan.id_kelurahan");

        if(isset($data['kecamatan'])){
            $builder->where("id_kecamatan =",$data['kecamatan']);
        }
        if(isset($data['kelurahan'])){
            $builder->where("id_kelurahan =",$data['kelurahan']);
        }
        if(isset($data['aset_transportasi'])){
            $builder->where("aset_transportasi =",$data['aset_transportasi']);
        }

        $query = $builder->get()->getResult("BusinessProcessRoot\Entities\KkMainAsetTransportasiUmum");

        return $query;
    }
}