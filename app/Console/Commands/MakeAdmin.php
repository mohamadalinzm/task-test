<?php

namespace App\Console\Commands;

use App\Enums\VerifyLevelEnum;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use RolePermission\Enums\BaseRoleEnum;
use Throwable;

class MakeSuperAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:super-admin {firstname : Firstname} {lastname : Lastname} {mobile : Mobile}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Super Admin';

    /**
     * Execute the console command.
     */
    public function handle(): true
    {

        $firstname= $this->argument('firstname');
        $lastname = $this->argument('lastname');
        $mobile = $this->argument('mobile');

        $this->makeSuperAdmin($firstname, $lastname,$mobile);

        return true;
    }

    private function makeSuperAdmin($firstname,$lastname,$mobile)
    {
        try {
            DB::beginTransaction();

            $user = User::query()
                ->where('mobile', $mobile)
                ->first();

            if (!$user) {
                $user = new User();
            }

            $user->firstname = $firstname;
            $user->lastname = $lastname;
            $user->mobile = $mobile;
            $user->active = true;
            $user->verify_level = VerifyLevelEnum::ACCEPTED->value;
            $user->save();

            $user->assignRole(BaseRoleEnum::SUPER_ADMIN->value);
            $user->removeRole(BaseRoleEnum::CLIENT->value);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollback();
            dd($e);
        }

        $this->info(PHP_EOL . ".:: Super Admin Created successfully ::." . PHP_EOL);

        return true;

    }
}
