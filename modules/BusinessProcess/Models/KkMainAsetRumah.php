<?php

namespace BusinessProcessRoot\Models; 

use CodeIgniter\Model;

class KkMainAsetRumah extends Model
{
    protected $table      = 'kk_main_aset_rumah';
    protected $primaryKey = 'kk_main_aset_rumah_id'; 	

    protected $returnType = "BusinessProcessRoot\Entities\KkMainAsetRumah";
    protected $allowedFields = array('kk_id','sumber_air_minum','ket_sumber_air_minum','status_kepemilikan_rumah','sarana_mck','daya_listrik','luas_pekarangan_rumah','pemanfaatan_danau_dkk','atap_rumah','dinding_rumah','lantai_rumah');

     public function get_filter_data_rumah($data){
        $db = \Config\Database::connect();

        $builder = $db->table('kk_main_aset_rumah');
        $builderClone = $builder;

        $builder->join("kk_main",'kk_main_aset_rumah.kk_id = kk_main.kk_id');
        $builder->join("kelurahan","kk_main.kelurahan = kelurahan.id_kelurahan");

        if(isset($data['kecamatan'])){
            $builder->where("id_kecamatan =",$data['kecamatan']);
        }
        if(isset($data['kelurahan'])){
            $builder->where("id_kelurahan =",$data['kelurahan']);
        }
        if(isset($data['status_kepemilikan_rumah'])){
            $builder->where("status_kepemilikan_rumah =",$data['status_kepemilikan_rumah']);
        }

        $query = $builder->get()->getResult("BusinessProcessRoot\Entities\KkMainAsetRumah");

        return $query;
    }

      public function get_filter_data_dinding($data){
        $db = \Config\Database::connect();

        $builder = $db->table('kk_main_aset_rumah');
        $builderClone = $builder;

        $builder->join("kk_main",'kk_main_aset_rumah.kk_id = kk_main.kk_id');
        $builder->join("kelurahan","kk_main.kelurahan = kelurahan.id_kelurahan");

        if(isset($data['kecamatan'])){
            $builder->where("id_kecamatan =",$data['kecamatan']);
        }
        if(isset($data['kelurahan'])){
            $builder->where("id_kelurahan =",$data['kelurahan']);
        }
        if(isset($data['dinding_rumah'])){
            $builder->where("dinding_rumah =",$data['dinding_rumah']);
        }

        $query = $builder->get()->getResult("BusinessProcessRoot\Entities\KkMainAsetRumah");

        return $query;
    }
      public function get_filter_data_lantai($data){
        $db = \Config\Database::connect();

        $builder = $db->table('kk_main_aset_rumah');
        $builderClone = $builder;

        $builder->join("kk_main",'kk_main_aset_rumah.kk_id = kk_main.kk_id');
        $builder->join("kelurahan","kk_main.kelurahan = kelurahan.id_kelurahan");

        if(isset($data['kecamatan'])){
            $builder->where("id_kecamatan =",$data['kecamatan']);
        }
        if(isset($data['kelurahan'])){
            $builder->where("id_kelurahan =",$data['kelurahan']);
        }
        if(isset($data['lantai_rumah'])){
            $builder->where("lantai_rumah =",$data['lantai_rumah']);
        }

        $query = $builder->get()->getResult("BusinessProcessRoot\Entities\KkMainAsetRumah");

        return $query;
    }
      public function get_filter_data_atap($data){
        $db = \Config\Database::connect();

        $builder = $db->table('kk_main_aset_rumah');
        $builderClone = $builder;

        $builder->join("kk_main",'kk_main_aset_rumah.kk_id = kk_main.kk_id');
        $builder->join("kelurahan","kk_main.kelurahan = kelurahan.id_kelurahan");

        if(isset($data['kecamatan'])){
            $builder->where("id_kecamatan =",$data['kecamatan']);
        }
        if(isset($data['kelurahan'])){
            $builder->where("id_kelurahan =",$data['kelurahan']);
        }
        if(isset($data['atap_rumah'])){
            $builder->where("atap_rumah =",$data['atap_rumah']);
        }

        $query = $builder->get()->getResult("BusinessProcessRoot\Entities\KkMainAsetRumah");

        return $query;
    }
}