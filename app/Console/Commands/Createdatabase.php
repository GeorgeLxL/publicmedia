<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Createdatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:database';
    

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
     * @return mixed
     */
    public function handle()
    {
        $this->fire();
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'publicmedia'],
        ];
    }

    public function fire()
    {
        DB::getConnection()->statement('CREATE DATABASE :schema', array('schema' =>'publicmedia'));
    } 
}
