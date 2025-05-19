<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {name : Name} {email : Email} {password : Password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Admin';

    /**
     * Execute the console command.
     */
    public function handle(): true
    {

        $name= $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');

        $this->makeAdmin($name, $email,$password);

        return true;
    }

    private function makeAdmin($name,$email,$password): void
    {
        try {
            DB::beginTransaction();

            $user = User::query()
                ->where('email', $email)
                ->first();

            if (!$user) {
                $user = new User();
            }

            $user->name = $name;
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->save();

            $role = Role::query()->where('name', 'Admin')->first();
            $user->roles()->attach($role);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            dd($e);
        }

        $this->info(PHP_EOL . ".:: Admin Created successfully ::." . PHP_EOL);

    }
}
