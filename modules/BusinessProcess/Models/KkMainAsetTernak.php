<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainAsetTernak extends Model
{
    protected $table      = 'kk_main_aset_ternak';
    protected $primaryKey = 'kk_main_aset_ternak_id';   
    
    protected $returnType = "BusinessProcessRoot\Entities\KkMainAsetTernak";
    protected $allowedFields = array('kk_id','jenis_ternak','luas_kandang','jumlah_ekor','jenis_hasil_ternak','jumlah_produksi_hasil_ternak','pemasaran_hasil_ternak','jenis_pakan_ternak');


    public function get_filter_data_ternak($data){
        $db = \Config\Database::connect();
 
        $builder = $db->table('kk_main_aset_ternak');
        $builderClone = $builder;

        $builder->join("kk_main",'kk_main_aset_ternak.kk_id = kk_main.kk_id');
        $builder->join("kelurahan","kk_main.kelurahan = kelurahan.id_kelurahan");

        if(isset($data['kecamatan'])){
            $builder->where("id_kecamatan =",$data['kecamatan']);
        }
        if(isset($data['kelurahan'])){
            $builder->where("id_kelurahan =",$data['kelurahan']);
        }
        if(isset($data['jenis_ternak'])){
            $builder->where("jenis_ternak =",$data['jenis_ternak']);
        }

        $query = $builder->get()->getResult("BusinessProcessRoot\Entities\KkMainAsetTernak");

        return $query;
    }
}
