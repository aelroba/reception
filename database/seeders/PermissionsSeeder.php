<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $hrManager = Role::create(['name' => 'hr-manager']);
        $director = Role::create(['name' => 'reviewer']);
        $director = Role::create(['name' => 'director']);
        $employee = Role::create(['name' => 'employee']);

        $user = User::where('email', 'admin@hrc.gov.sa')->first();
        $user->syncRoles(['admin']);
    }
}
