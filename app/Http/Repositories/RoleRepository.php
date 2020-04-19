<?php

namespace App\Http\Repositories;

use App\Http\Models\User;
use Illuminate\Support\Facades\Config;
use Prettus\Repository\Eloquent\BaseRepository;

class RoleRepository extends BaseRepository {

    public function model() {
        return 'App\Http\Models\Role';
    }

    public function getMeta()
    {
        $meta = [
            "id" => null,
            'name'=>null,
            'description'=>null,
            "created_at" => null,
            "updated_at" => null,
        ];
        return $meta;
    }

    public function collectUserFormData($request)
    {
        return  $data = [
            'name'=>$request->get('name'),
            'description'=>$request->get('description'),
        ];
    }

    /*CRUD Operations */
    public function store($request){
        $data = $this->collectUserFormData($request);
//        $roleObj = new Role();
        $model = $this->create($data);
        return $model;
    }

    public function saveAsFan($id)
    {
        $userObj = new User();
        $userObj['id'] = $id;
        //3) saving user as fan
        // $role = new Role();
        $roleId = $this->model->where('name', '=', Config::get('enum.roles.fan'))->pluck('id');
        $userObj->roles()->attach($roleId); // get this from enum config
    }
}