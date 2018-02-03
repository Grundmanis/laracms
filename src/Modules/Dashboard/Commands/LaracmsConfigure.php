<?php

namespace Grundmanis\Laracms\Modules\Dashboard\Commands;

use Illuminate\Console\Command;

class LaracmsConfigure extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laracms:configure';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Configure the Laracms';

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

        $this->call('vendor:publish', [
            '--tag' => 'translatable'
        ]);

        $this->call('vendor:publish', [
            '--tag' => 'laracms'
        ]);

        $this->call('vendor:publish', [
            '--tag' => 'laracms_pages'
        ]);

        $this->call('migrate');

        $this->call('db:seed', [
            '--class' => 'Grundmanis\\Laracms\\Modules\\User\\LaracmsUserSeeder'
        ]);

        $loginUrl = env('APP_URL') . '/laracms/login';
        $this->info('Laracms test user was created.');
        $this->info('Login link: ' . $loginUrl);
        $this->info('Login: admin@laracms.com');
        $this->info('Password: secret');
    }
}
