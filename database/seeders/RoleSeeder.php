<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleClient = Role::create(['name' => 'Client']);

        Permission::create(['name' => 'contacts.index'])->assignRole($roleClient);
        Permission::create(['name' => 'contacts.show'])->assignRole($roleClient);
        Permission::create(['name' => 'contacts.create'])->assignRole($roleClient);
        Permission::create(['name' => 'contacts.edit'])->assignRole($roleClient);
        Permission::create(['name' => 'contacts.destroy'])->assignRole($roleClient);

        Permission::create(['name' => 'users.index'])->assignRole($roleAdmin);
        Permission::create(['name' => 'users.edit'])->assignRole($roleAdmin);
    }
}
