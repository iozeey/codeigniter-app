<?php
namespace App\Http\BusinessLogicGateWays;

use App\Events\PostRegisterEvent;
use App\Http\Repositories\RoleRepository;
use App\Http\Repositories\TagRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\EmailRepository;
use App\Http\Requests\SignUpRequest;
use Illuminate\Support\Facades\Event;

class AuthGateway
{

    private $userRepository;
    private $emailRepository;
    private $tagRepository;
    private $roleRepository;

    public function __construct(UserRepository $userRepository, EmailRepository $emailRepository, TagRepository $tagRepository, RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->emailRepository = $emailRepository;
        $this->tagRepository = $tagRepository;
        $this->roleRepository = $roleRepository;
    }
    /*CRUD Operations */
    public function registerUser(SignUpRequest $request)
    {
        try {

            $tagModel = $this->tagRepository->store($request);
            $userModel = $this->userRepository->store($request);
            $emailModel = $this->emailRepository->store($request);
            $roleModel = $this->roleRepository->saveAsFan($userModel['id']);

            $this->userRepository->attachTag($userModel, $tagModel);
            $this->userRepository->attachEmail($userModel, $emailModel);

            $email = $request->get('email');

            //global function in helper.php file
            if (isValidEmail($email) === $email) {
                Event::fire(new PostRegisterEvent($email));
            }

            if ($request->ajax()) {
                return json_encode(['success' => true,
                    'token' => "L",
                    'redirectToPath' => route('fan-club')
                ]);
            }

        } catch (Exception $ex) {
            dd($ex->getMessage());
        }
    }
    /*End CRUD Operations */


}