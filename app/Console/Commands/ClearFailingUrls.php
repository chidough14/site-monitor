<?php

namespace App\Console\Commands;

use App\Models\Url;
use Illuminate\Console\Command;

class ClearFailingUrls extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'urls:clean-failing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear theurl enteries which are failing';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $time = now()->subMinutes(5);

        Url::where('updated_at', '<=', $time)
        ->where('failing', 1)
        ->update(['failing'=> 0]);

        return 0;
    }
}
