<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\BaseBuilder;


class KkMainAsetBuahBuahan extends Model
{ 	
    protected $table      = 'kk_main_aset_buah_buahan';
    protected $primaryKey = 'kk_main_aset_buah_buahan_id';
    protected $returnType = "BusinessProcessRoot\Entities\KkMainAsetBuahBuahan";
    protected $allowedFields = array('kk_id','jenis_komoditas','luas_panen','jumlah_produksi','jumlah_pohon','jenis_bibit','pestisida','pupuk_organik','pupuk_pabrik','lokasi','hasil_pemasaran');


 public function get_filter_data_buah($data){
        $db = \Config\Database::connect();

        $builder = $db->table('kk_main_aset_buah_buahan');
        $builderClone = $builder;

        $builder->join("kk_main",'kk_main_aset_buah_buahan.kk_id = kk_main.kk_id');
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

        $query = $builder->get()->getResult("BusinessProcessRoot\Entities\KkMainAsetBuahBuahan");

        return $query;
    }

}