<?php

namespace App\Observers;

use App\Models\Member;
use App\Models\Teams;
use Illuminate\support\facades\Auth;
class MemberObserver
{
    /**
     * Handle the Member "created" event.
     */
    public function created(Member $member): void
    {
        //
        $memberCount = Member::count();
        if($memberCount % 3 === 1){
            $team = Teams::firstOrCreate([
                'name' => 'Group ' . (($memberCount + 2)/3),
                'user_id' => Auth::id()
        ]);
            $team->save();
        } 
    }

    /**
     * Handle the Member "updated" event.
     */
    public function updated(Member $member): void
    {
        //
    }

    /**
     * Handle the Member "deleted" event.
     */
    public function deleted(Member $member): void
    {
        //
    }

    /**
     * Handle the Member "restored" event.
     */
    public function restored(Member $member): void
    {
        //
    }

    /**
     * Handle the Member "force deleted" event.
     */
    public function forceDeleted(Member $member): void
    {
        //
    }
}
