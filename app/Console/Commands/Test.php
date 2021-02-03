<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test';

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
        $this->info("开始执行测试".date('Y-m-d H:i:s'));
        $file = fopen("test.txt","a+");
        fwrite($file,date('Y-m-d H:i:s'.'-----'));
        fclose($file);
        $this->info("结束执行测试".date('Y-m-d H:i:s'));
    }
}
