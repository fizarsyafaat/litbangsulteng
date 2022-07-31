<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainAsetProduksi extends Model
{
    protected $table      = 'kk_main_aset_produksi';
    protected $primaryKey = 'kk_main_aset_produksi_id'; 	

    protected $returnType = "BusinessProcessRoot\Entities\KkMainAsetProduksi";
    protected $allowedFields = array('kk_id','aset_produksi');

     public function get_filter_data_produksi($data){
        $db = \Config\Database::connect();
 
        $builder = $db->table('kk_main_aset_produksi');
        $builderClone = $builder;

        $builder->join("kk_main",'kk_main_aset_produksi.kk_id = kk_main.kk_id');
        $builder->join("kelurahan","kk_main.kelurahan = kelurahan.id_kelurahan");

        if(isset($data['kecamatan'])){
            $builder->where("id_kecamatan =",$data['kecamatan']);
        }
        if(isset($data['kelurahan'])){
            $builder->where("id_kelurahan =",$data['kelurahan']);
        }
        if(isset($data['aset_produksi'])){
            $builder->where("aset_produksi =",$data['aset_produksi']);
        }

        $query = $builder->get()->getResult("BusinessProcessRoot\Entities\KkMainAsetProduksi");

        return $query;
    }
} 