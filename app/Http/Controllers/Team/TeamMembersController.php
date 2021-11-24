<?php


namespace App\Http\Controllers\Team;


use App\Http\Models\TeamMember;

class TeamMembersController
{
    public function showByTeam($id)
    {
        $members = TeamMember::where('team_id', '=', $id)
            ->select(['username', 'id'])
            ->whereNull('id_user')
            ->get();
        return $members;
    }
}
