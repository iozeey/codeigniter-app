<?php

namespace App\Http\Controllers;

use App\Http\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FanClubController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth', ['only' => ['index', 'getProfile']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fanClub.index', ['user' => Auth::user()->toArray()]);
    }

    public function getProfile()
    {
        return view('user.profile');
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fanAccess()
    {
        return view('fanClub.fanAccess');
    }

    public function fanClubTicketsDone()
    {
        return view('fanClub.fanClubTicketsDone');
    }

    public function fanClubs()
    {
        return view('fanClub.fanClubs');
    }

    public function fanClubTicketIndustryComplaints()
    {
        return view('fanClub.fanClubTicketIndustryComplaints');
    }

    public function fanClubRatings()
    {
        return view('fanClub.fanClubRatings');
    }

    public function fanClubGuarantee()
    {
        return view('fanClub.fanClubGuarantee');
    }

    public function fanClubContest()
    {
        return view('fanClub.fanClubContest');
    }

    public function fanClubPolls()
    {
        return view('fanClub.fanClubPolls');
    }

    public function fanClubArtistAndTeamMerchandise()
    {
        return view('fanClub.fanClubArtistAndTeamMerchandise');
    }

    public function fanClubLawsThatAffectFans()
    {
        return view('fanClub.fanClubLawsThatAffectFans');
    }

    public function fanList()
    {
        return view('fanClub.fansList');
    }
}
