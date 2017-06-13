<?php namespace App\Jobs\EsoImport;

use App\User;
use HeppyKarlsson\EsoImport\EsoImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AutoImport implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;


    protected $file = null;
    protected $user_id = null;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file, $user_id)
    {
        $this->file = $file;
        $this->user_id = $user_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $esoImport = new EsoImport();
        $user = User::findOrFail($this->user_id);
        $esoImport->import($this->file, $user);
    }

}
