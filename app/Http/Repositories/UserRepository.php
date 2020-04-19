<?php

namespace App\Http\Repositories;

//use Bosnadev\Repositories\Contracts\RepositoryInterface;
//use Bosnadev\Repositories\Eloquent\Repository;

use Prettus\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository {

    public function model() {
        return 'App\Http\Models\User';
    }
    /*End Relations*/
    public function getMeta()
    {
        $meta = [
            "id" => null,
            'first_name'=>null,
            'last_name'=>null,
            'gender'=>null,
            'password'=>null,
            "deleted" => null,
            "created_at" => null,
            "updated_at" => null,
        ];
        return $meta;
    }

    public function collectUserFormData($request)
    {
        return  $data = [
            'first_name'=>$request->get('first_name'),
            'last_name'=>$request->get('last_name'),
            'gender'=>$request->get('gender'),
            'password'=> bcrypt($request->get('password')),
        ];
    }

    /*many to many attachments*/
    public function attachTag($withModel,$toBeAttachModel){
        $withModel->tags()->attach($toBeAttachModel->id);
    }
    public function attachEmail($withModel,$toBeAttachModel){
        $withModel->emails()->attach($toBeAttachModel->id);
    }
    public function attachRoles($withModel,$toBeAttachModel){
        $withModel->roles()->attach($toBeAttachModel->id);
    }

    /*CRUD Operations */
    public function store($request){
        $data = $this->collectUserFormData($request);
        $model = $this->create($data);
        return $model;
    }

}