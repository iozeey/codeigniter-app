@if(Auth::check())
    {{--*/$user  = Auth::user()->toArray();/*--}}

    <div class=" list-group leftbar">

        <div class="text-center" id="left_top_profile_data">

            <a href="http://club.411fan.com/user_profile/index/63">
                {{--*/$imageUrl = isset($user['photo_path']) ? $user['photo_path'] : URL::asset('images/profile.png');/*--}}
                <img class="img-responsive" src={{ $imageUrl }} width="200px" height="150px">
            </a>

            <h2 class="profile-name">{{$user['first_name'].' '.$user['last_name']}} </h2>

            <a href="{{ URL::route('user-profile') }}" class="btn btn-link" Title=" Manage Profile">
                Manage Profile</a>
        </div>
        <ul class="list-group">
            <li class="list-group-item"><i class="fa fa-lg fa-dashboard"></i> <a href="{{route('fanAccess')}}">My 411fan
                    Access</a></li>
            <li class="list-group-item"><i class="fa fa-lg fa-ticket"></i> <a href="{{route('fanClubTicketsDone')}}">Tickets
                    Done 411fan </a></li>
            <li class="list-group-item"><i class="fa fa-lg fa-home"></i> <a href="{{route('fanClubs')}}">411fan
                    Clubs </a></li>
            <li class="list-group-item"><i class="fa fa-lg fa-thumbs-down"></i> <a
                        href="{{route('fanClubTicketIndustryComplaints')}}">My Ticket Industry Complaints</a></li>
            <li class="list-group-item"><i class="fa fa-lg fa-bank"></i> <a href="{{route('fanClubRatings')}}"> 411fan
                    Ratings</a></li>
            <li class="list-group-item"><i class="fa fa-lg fa-link"></i> <a href="{{route('fanClubGuarantee')}}"> 411fan
                    Guarantee </a></li>
            <li class="list-group-item"><i class="fa fa-lg fa-hourglass-3"></i> <a href="{{route('fanClubContest')}}">411fan
                    Contests</a></li>
            <li class="list-group-item"><i class="fa fa-lg fa-hourglass-3"></i> <a href="{{route('fanClubPolls')}}">411fan
                    Polls</a></li>
            <li class="list-group-item"><i class="fa fa-lg fa-ticket"></i> <a
                        href="{{route('fanClubArtistAndTeamMerchandise')}}"> Artist &amp; Team Merchandise </a></li>
            <li class="list-group-item"><i class="fa fa-lg fa-bank"></i> <a
                        href="{{route('fanClubLawsThatAffectFans')}}"> Laws That Affect Fans</a></li>
        </ul>
    </div>

@endif