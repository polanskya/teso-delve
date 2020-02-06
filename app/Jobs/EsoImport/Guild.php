<?php

namespace App\Jobs\EsoImport;

use App\Models\User;
use Carbon\Carbon;
use HeppyKarlsson\DBLogger\Facade\DBLogger;
use HeppyKarlsson\EsoImport\Import\GuildMember;
use HeppyKarlsson\EsoImport\Import\GuildRank;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Guild implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    private $members = [];
    private $ranks = [];
    private $guild_ids;
    private $user_id;

    public function __construct($user_id, $guild_ids)
    {
        $this->guild_ids = $guild_ids;
        $this->user_id = $user_id;
    }

    public function member($member)
    {
        $this->members[] = $member;
    }

    public function rank($rank)
    {
        $this->ranks[] = $rank;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = User::find($this->user_id);
        $guilds = \App\Model\Guild::whereIn('id', $this->guild_ids)->get();
        $memberImport = new GuildMember();
        $rankImport = new GuildRank();
        $now = Carbon::now()->subMinute();

        foreach ($this->ranks as $rank) {
            try {
                $rankImport->process($rank, $guilds);
            } catch (\Throwable $throwable) {
                DBLogger::save($throwable);
            }
        }

        foreach ($this->members as $member) {
            try {
                $memberImport->process($member, $user, $guilds);
            } catch (\Throwable $throwable) {
                DBLogger::save($throwable);
            }
        }

        \App\Model\GuildMember::whereIn('guild_id', $this->guild_ids)
            ->where('updated_at', '<', $now)
            ->delete();
    }
}
