<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainAsetIkan extends Model
{
    protected $table      = 'kk_main_aset_ikan';
    protected $primaryKey = 'kk_main_aset_ikan_id';

    protected $returnType = "BusinessProcessRoot\Entities\KkMainAsetIkan";
    protected $allowedFields = array('kk_id','jenis_komoditas','luas_panen','jumlah_produksi','hasil_pemasaran','jumlah_ikan','jenis_bibit_ikan','jenis_pakan');
     public function get_filter_data_ikan($data){
        $db = \Config\Database::connect();
 
        $builder = $db->table('kk_main_aset_ikan');
        $builderClone = $builder;

        $builder->join("kk_main",'kk_main_aset_ikan.kk_id = kk_main.kk_id');
        $builder->join("kelurahan","kk_main.kelurahan = kelurahan.id_kelurahan");

        if(isset($data['kecamatan'])){
            $builder->where("id_kecamatan =",$data['kecamatan']);
        }
        if(isset($data['kelurahan'])){
            $builder->where("id_kelurahan =",$data['kelurahan']);
        }
        if(isset($data['jenis_komoditas'])){
            $builder->where("jenis_komoditas =",$data['jenis_komoditas']);
        }

        $query = $builder->get()->getResult("BusinessProcessRoot\Entities\KkMainAsetIkan");

        return $query;
    }
} 