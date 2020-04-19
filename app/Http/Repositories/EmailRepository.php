<?php

namespace App\Http\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class EmailRepository extends BaseRepository {

    public function model() {
        return 'App\Http\Models\Email';
    }

    public function getMeta()
    {
        $meta = [
            "id" => null,
            'email' => null,
            "created_at" => null,
            "updated_at" => null,
        ];
        return $meta;
    }

    public function collectUserFormData($request)
    {
        return $data = [
            'email' => $request->get('email'),
        ];
    }

    /*CRUD Operations */
    public function store($request)
    {
        $data = $this->collectUserFormData($request);
        $model = $this->create($data);
        return $model;
    }

    /*Helper Functions*/

    /**
     * is email exist then return id else false
     * @param $email
     * @return bool
     */
    public function IsEmailExistInUsers($email)
    {
        $email = strtolower(trim($email));
        $emailRecord = $this->where('email', '=', $email)->get();
        return is_null($emailRecord->first()) ? false : $emailRecord->first()->pluck('id');
    }
}