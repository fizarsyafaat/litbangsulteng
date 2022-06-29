<?php

namespace BusinessProcessRoot\Models;

use CodeIgniter\Model;
use BusinessProcessRoot\Master\Entities\User as UserEntities;

class User extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'user_id';

    protected $returnType = "BusinessProcessRoot\Entities\User";
    protected $allowedFields = array('user_name','user_email', 'user_password','user_status','user_role');

    protected $beforeInsert = ['hashPassword'];

	protected function hashPassword(array $data) {
        if(isset($data['data']['user_password'])){	
            $data['data']['user_password'] = password_hash($data['data']['user_password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    public function get_user_master($user){
        $db = \Config\Database::connect();

        $builder = $db->table('user u');
        $builderClone = $builder;

        if(isset($user->user_id)){
            $builder->where("u.user_id =",$user->user_id);
        }
        if(isset($user->teacher_id)){
            $builder->where("u.user_id =",$user->teacher_id);
        }
        if(isset($user->email)){
            $builder->where("u.email =",$user->email);
        }

        return $builder;
    }

    public function get_user_paging($builder,$user){
        if(isset($user->limit)){
            if($user->limit['start'] == "page_now"){
                if(isset($user->page)){
                    if($user->page <= 0){
                        $user->page = 1;
                    }
                    $user->limit['start'] = ($user->page - 1) * $user->limit['total'];
                }else{
                    $user->limit['start'] = 0;
                }
            }
            $builder->limit($user->limit['total'],$user->limit['start']);
        }

        if(isset($user->order_by)){
            $builder->orderBy($user->order_by[0], $user->order_by[1]);
        }
        $query = $builder->get()->getResult("BusinessProcessRoot\Master\Entities\User");

        return $query;   
    }

    public function get_user_num_row($user,$config){
        $builder = $this->get_user_master($user);
        $builderClone = clone $builder;
        $total_row = $builderClone->countAllResults();

        $config['total_data'] = $total_row;

        $total_halaman = ceil($config['total_data']/$config['data_per_page']);

        $config['current_page'] = abs((int)$config['current_page']);

        if($config['current_page'] <= 0){
            $config['current_page'] = 1;
        }

        if($config['current_page'] >= $total_halaman){
            $config['current_page'] = $total_halaman;
            $user->page = $total_halaman;
        }

        if(isset($user->no_limit)){
            unset($user->limit);
        }

        $user_list = $this->get_user_paging($builder,$user);

        $data_send = array(
            'config' => $config,
            'user_list' => $user_list
        );

        return $data_send;
    }

    public function get_user_regular($class_session){
        $builder = $this->get_user_master($class_session);

        $query = $builder->get()->getResult("BusinessProcessRoot\Master\Entities\User");

        return $query;
    }
}