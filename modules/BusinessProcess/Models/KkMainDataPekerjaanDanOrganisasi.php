<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;

class KkMainDataPekerjaanDanOrganisasi extends Model
{
    protected $table      = 'kk_main_data_pekerjaan_dan_organisasi';
    protected $primaryKey = 'kk_main_data_pekerjaan_dan_organisasi_id';

    protected $returnType = "BusinessProcessRoot\Entities\KkMainDataPekerjaanDanOrganisasi";
    protected $allowedFields = array('kk_id','laba_per_bulan','penghasilan_per_bulan','pengeluaran_per_bulan','mata_pencaharian_pokok','sumber_modal','modal','aktivitas_ekonomi','lembaga_kemasyarakatan'); 

      public function get_filter_data_kerja($data){
        $db = \Config\Database::connect();

        $builder = $db->table('kk_main_data_pekerjaan_dan_organisasi');
        $builderClone = $builder;

        $builder->join("kk_main",'kk_main_data_pekerjaan_dan_organisasi.kk_id = kk_main.kk_id');
        $builder->join("kelurahan","kk_main.kelurahan = kelurahan.id_kelurahan");

        if(isset($data['kecamatan'])){
            $builder->where("id_kecamatan =",$data['kecamatan']);
        }
        if(isset($data['kelurahan'])){
            $builder->where("id_kelurahan =",$data['kelurahan']);
        }
        if(isset($data['mata_pencaharian_pokok'])){
            $builder->where("mata_pencaharian_pokok =",$data['mata_pencaharian_pokok']);
        }

        $query = $builder->get()->getResult("BusinessProcessRoot\Entities\KkMainDataPekerjaanDanOrganisasi");

        return $query;
    }

     public function get_filter_data_modal($data){
        $db = \Config\Database::connect();

        $builder = $db->table('kk_main_data_pekerjaan_dan_organisasi');
        $builderClone = $builder;

        $builder->join("kk_main",'kk_main_data_pekerjaan_dan_organisasi.kk_id = kk_main.kk_id');
        $builder->join("kelurahan","kk_main.kelurahan = kelurahan.id_kelurahan");

        if(isset($data['kecamatan'])){
            $builder->where("id_kecamatan =",$data['kecamatan']);
        }
        if(isset($data['kelurahan'])){
            $builder->where("id_kelurahan =",$data['kelurahan']);
        }
        if(isset($data['sumber_modal'])){
            $builder->where("sumber_modal =",$data['sumber_modal']);
        }

        $query = $builder->get()->getResult("BusinessProcessRoot\Entities\KkMainDataPekerjaanDanOrganisasi");

        return $query;
    }


     public function get_filter_data_laba($data){
        $db = \Config\Database::connect();

        $builder = $db->table('kk_main_data_pekerjaan_dan_organisasi');
        $builderClone = $builder;

        $builder->join("kk_main",'kk_main_data_pekerjaan_dan_organisasi.kk_id = kk_main.kk_id');
        $builder->join("kelurahan","kk_main.kelurahan = kelurahan.id_kelurahan");

        if(isset($data['kecamatan'])){
            $builder->where("id_kecamatan =",$data['kecamatan']);
        }
        if(isset($data['kelurahan'])){
            $builder->where("id_kelurahan =",$data['kelurahan']);
        }
        if(isset($data['laba_per_bulan'])){
            $builder->where("laba_per_bulan =",$data['laba_per_bulan']);
        }

        $query = $builder->get()->getResult("BusinessProcessRoot\Entities\KkMainDataPekerjaanDanOrganisasi");

        return $query;
    }
}