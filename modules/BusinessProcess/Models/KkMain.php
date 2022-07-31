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
		$builder->join("kk_main_data_pekerjaan_dan_organisasi",'kk_main.kk_id = kk_main_data_pekerjaan_dan_organisasi.kk_id');

        if(isset($data['no_kk'])){
            $builder->where("no_kk",$data['no_kk']);
        }
        if(isset($data['kepala_keluarga'])){
            $builder->like("kepala_keluarga",$data['kepala_keluarga']);
        }
        if(isset($data['kepala_keluarga'])){
            $builder->like("kepala_keluarga",$data['kepala_keluarga']);
        }
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
        if(isset($data['penter'])){
            $builder->where("pendidikan_terakhir",$data['penter']);
        }
        if(isset($data['goldar'])){
            $builder->where("golongan_darah",$data['goldar']);
        }
        if(isset($data['pekerjaan'])){
            $builder->where("mata_pencaharian_pokok",$data['pekerjaan']);
        }
        if(isset($data['penghasilan'])){
            $builder->where("penghasilan_per_bulan",$data['penghasilan']);
        }
        if(isset($data['pengeluaran'])){
            $builder->where("pengeluaran_per_bulan",$data['pengeluaran']);
        }
        if(isset($data['stakem'])){
            $builder->where("status_kemiskinan",$data['stakem']);
        }

        $query = $builder->get()->getResult("BusinessProcessRoot\Entities\KkMain");

        return $query;
    }
}