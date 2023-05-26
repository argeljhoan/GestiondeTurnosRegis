<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        $role1 = Role::create(['name' => 'SuperAdmin' ]);
        $role2 = Role::create(['name' => 'Admin' ]);
        $role3 = Role::create(['name' => 'Operador' ]);
        $role4 = Role::create(['name' => 'Usuario' ]);


        Permission:: create(['name' => 'admin.home'])->syncRoles($role1,$role2,$role3);

        //
        Permission:: create(['name' => 'admin.Gestion'])->syncRoles($role1);
        Permission:: create(['name' => 'admin.Registro'])->syncRoles($role1);
        Permission:: create(['name' => 'admin.Editar'])->syncRoles($role1);
        
        

        // Permission::create(['name' => )])
    }
}
