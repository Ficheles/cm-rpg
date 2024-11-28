<?php
namespace App\Http\Controllers;

use App\Models\Guild;
use Illuminate\Http\Request;

class GuildController extends Controller
{
    public function showPlayers($guildId)
    {
        $guild = Guild::with('players')->findOrFail($guildId);

        return view('guilds.players', compact('guild'));
    }
}
