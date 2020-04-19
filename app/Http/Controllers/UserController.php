<?php

namespace App\Http\Controllers;

use Response;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\BusinessLogicGateWays\UserGateway as User;

class UserController extends BaseController
{

    private $userGateway;

    public function __construct(User $userGateway)
    {
        parent::__construct();
        $this->middleware('auth', ['only' => ['getProfile', 'postProfile']]);
        $this->userGateway = $userGateway;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $json = Response::json($this->user->all());
//        dd($json);
//        return $json;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function getProfile()
    {
        $user = $this->userGateway->getProfile(Auth::user()->id);
        return view('user.profile',compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postProfile(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
