<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use Spatie\Permission\Models\Role;
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
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name'=>'cliente']);

        Permission::create(['name'=>'users.index'])->assignRole($role1);
        Permission::create(['name'=>'users.create'])->assignRole($role1);
        Permission::create(['name'=>'users.edit'])->assignRole($role1);
        Permission::create(['name'=>'users.destroy'])->assignRole($role1);

        Permission::create(['name'=>'questions.index'])->assignRole($role1);
        Permission::create(['name'=>'questions.create'])->assignRole($role1);
        Permission::create(['name'=>'questions.edit'])->assignRole($role1);
        Permission::create(['name'=>'questions.destroy'])->assignRole($role1);

        Permission::create(['name'=>'response.index'])->assignRole($role1);
        Permission::create(['name'=>'response.create'])->assignRole($role1);
        Permission::create(['name'=>'response.edit'])->assignRole($role1);
        Permission::create(['name'=>'response.destroy'])->assignRole($role1);

        /* Permisos para ambos roles */
        Permission::create(['name'=>'laboral.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'laboral.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'laboral.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'laboral.destroy'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'tributario.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'tributario.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'tributario.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'tributario.destroy'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'administracion.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'administracion.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'administracion.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'administracion.destroy'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'comercial.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'comercial.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'comercial.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'comercial.destroy'])->syncRoles([$role1,$role2]);

        Permission::create(['name'=>'contratacion.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'contratacion.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'contratacion.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'contratacion.destroy'])->syncRoles([$role1,$role2]);

    }
}
