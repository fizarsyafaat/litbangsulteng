<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainKesehatan extends Model
{
    protected $table      = 'kk_main_kesehatan';
    protected $primaryKey = 'kk_main_kesehatan_id';

    protected $returnType = "BusinessProcessRoot\Entities\KkMainKesehatan";
    protected $allowedFields = array('kk_id','penderita_sakit_kelainan','perilaku_hidup_bersih','pola_makan','kebiasaan_berobat','jenis_penyakit');

     public function get_filter_data_kelainan($data){
        $db = \Config\Database::connect();

        $builder = $db->table('kk_main_kesehatan');
        $builderClone = $builder;

        $builder->join("kk_main",'kk_main_kesehatan.kk_id = kk_main.kk_id');
        $builder->join("kelurahan","kk_main.kelurahan = kelurahan.id_kelurahan");

        if(isset($data['kecamatan'])){
            $builder->where("id_kecamatan =",$data['kecamatan']);
        }
        if(isset($data['kelurahan'])){
            $builder->where("id_kelurahan =",$data['kelurahan']);
        }
        if(isset($data['penderita_sakit_kelainan'])){
            $builder->where("penderita_sakit_kelainan =",$data['penderita_sakit_kelainan']);
        }

        $query = $builder->get()->getResult("BusinessProcessRoot\Entities\KkMainKesehatan");

        return $query;
    }

    public function get_filter_data_jenis($data){
        $db = \Config\Database::connect();

        $builder = $db->table('kk_main_kesehatan');
        $builderClone = $builder;

        $builder->join("kk_main",'kk_main_kesehatan.kk_id = kk_main.kk_id');
        $builder->join("kelurahan","kk_main.kelurahan = kelurahan.id_kelurahan");

        if(isset($data['kecamatan'])){
            $builder->where("id_kecamatan =",$data['kecamatan']);
        }
        if(isset($data['kelurahan'])){
            $builder->where("id_kelurahan =",$data['kelurahan']);
        }
        if(isset($data['jenis_penyakit'])){
            $builder->where("jenis_penyakit =",$data['jenis_penyakit']);
        }

        $query = $builder->get()->getResult("BusinessProcessRoot\Entities\KkMainKesehatan");

        return $query;
    }

}