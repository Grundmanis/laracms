<?php

namespace Grundmanis\Laracms\Modules\Dashboard\Commands;

use Grundmanis\Laracms\Modules\User\Models\LaracmsUser;
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
     * @var LaracmsUser
     */
    private $user;

    /**
     * Create a new command instance.
     *
     * @param LaracmsUser $user
     */
    public function __construct(LaracmsUser $user)
    {
        parent::__construct();
        $this->user = $user;
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

        if (!$this->user->where('email', 'admin@laracms.com')->first()) {
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
}
