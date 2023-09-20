<?php

namespace App\Console\Commands;

use App\Events\MyEvent;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Event;

class MyCustomCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:mycustomcommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Event::dispatch(new MyEvent());
        return 0;
    }
}
