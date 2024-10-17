<?php

namespace App\Http\Models ;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Member;
use App\Models\Teams;
use App\Models\observer;
use \Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        $members = Member::all();
        $userCount = Member::whereNotNull('team_id')->count();
        $teams = Teams::all();
        return view('user.dashboard', [
            'members' => $members,
            'userCount ' => $userCount,
            'teams' => $teams
        ]);
    }
    public function create()
    {
        return view('user.dashboard');
    }
    public function store(Request $req)
    {
        $me = new Member;
        $me->name = request('name');
        $me->phone = request('phone');
        $me->skills = request('skills');
        $userCount = Member::whereNotNull('team_id')->count();
        $me->team_id = ceil(($userCount + 1) / 3); 
        $me->user_id = Auth::user()->id;
        $me->save();
        // desc : 
                    // this part is response to uploud file or image
        $Ime = $req->file('image');
        $ext = $Ime->getClientOriginalExtension();
        $location = 'public/images/';
        $filename = $me->id . "-" . date("Y-m-d-h-i-s") . "." . $ext;
        $Ime->move($location, $filename);
        $me->image = $filename;
        $me->save();
        return redirect()->route('user.dashboard');
    }
    public function show($id)
    {
        $me = Member::find($id);
        $member_in_team = Member::where('team_id',$id)->get();
        return view('user.show', [
            'members' => $member_in_team,
            'mes' => $me
        ]);
    }
    public function update($id, Request $req){
        $member = Member::find($id);
        $member->name = request('name');
        $member->phone = request('phone');
        $member->skills = request('skills');
        $Ime = $req->file('image');
        $ext = $Ime->getClientOriginalExtension();
        $location = 'public/images/';
        $filename = $member->id . "-" . date("Y-m-d-h-i-s") . "." . $ext;
        $Ime->move($location, $filename);
        $member->image = $filename;
        $member->save();
    }
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->forceDelete();
        return redirect()->route('user.dashboard');
    }
}
