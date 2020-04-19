<?php
namespace App\Http\BusinessLogicGateWays;

use App\Http\Repositories\MyBaseRepository;
use App\Http\Repositories\UserRepository;
use Illuminate\Support\Facades\Response;

/**
 * Created by PhpStorm.
 * User: nerotechz
 * Date: 12/24/2015
 * Time: 5:36 PM
 */

class UserGateway {

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /*Relations attachments*/

    /**
     * insert ids into these tables => tag_user,email_user and role_user
     * @param $withModel
     * @param $toBeAttachModel
     */

    public function attachTag($withModel,$toBeAttachModel){
        $withModel->tags()->attach($toBeAttachModel->id);
    }
    public function attachEmail($withModel,$toBeAttachModel){

        $withModel->emails()->attach($toBeAttachModel->id,['primary_email_id' => $toBeAttachModel->id]);
    }
    public function attachRoles($withModel,$toBeAttachModel){

        $withModel->roles()->attach($toBeAttachModel->id);
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
    /*CRUD Operations */
    public function store($request){
        return $this->userRepository->create($this->collectUserFormData($request));
    }

    public function all($columns = array('*')){
     //   dd($this->userRepository->all($columns));
        return  Response::json($this->userRepository->all($columns));
    }

    public function updatePW($uid,$pw){
        return $this->userRepository->where('id','=',$uid)->update(['password'=> bcrypt($pw)]);
    }
    /*getter*/
    public function getProfile($id){
        return $this->userRepository->with(['tags','roles','emails','primaryEmail'])->find($id);
    }

    public function getPrimaryEmail($fan_tag_or_email){
//todo
        $tagsObj = new Tag();

        if (!(isValidEmail($fan_tag_or_email) === $fan_tag_or_email)) {
            $tagsModel = $tagsObj->with('users.primaryEmail')->where('fan_tag', '=', $fan_tag_or_email)->first()->toArray();
            $fan_tag_or_email = $tagsModel['users'][0]['primary_email'][0]['email'];
        }

        return $fan_tag_or_email;
    }

}