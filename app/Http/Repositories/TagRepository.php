<?php

namespace App\Http\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class TagRepository extends BaseRepository {

    public function model() {
        return 'App\Http\Models\Tag';
    }

    public function getMeta()
    {
        $meta = [
            "id" => null,
            'fan_tag'=>null,
            "created_at" => null,
            "updated_at" => null,
        ];
        return $meta;
    }

    public function collectUserFormData($request)
    {
        return  $data = [
            'fan_tag'=>$request->get('fan_tag'),
        ];
    }

    /*CRUD Operations */
    public function store($request)
    {
        $data = $this->collectUserFormData($request);
        $model = $this->create($data);
        return $model;
    }

}