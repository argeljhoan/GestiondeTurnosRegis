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
        $role2 = Role::create(['name' => 'Admin']);
        $role3 = Role::create(['name' => 'Operador' ]);
        $role4 = Role::create(['name' => 'Usuario' ]);


        Permission:: create(['name' => 'admin.home'])->syncRoles($role1,$role2,$role3);

        //
        Permission:: create(['name' => 'admin.Gestion'])->syncRoles($role1,$role2);
        Permission:: create(['name' => 'admin.modulo'])->syncRoles($role1);
        Permission:: create(['name' => 'admin.Registro'])->syncRoles($role1);
        Permission:: create(['name' => 'admin.Editar'])->syncRoles($role1,$role2);
        Permission:: create(['name' => 'admin.store'])->syncRoles($role1);
        Permission:: create(['name' => 'admin.Actualizar'])->syncRoles($role1,$role2);
        Permission:: create(['name' => 'admin.Eliminar'])->syncRoles($role1);
        Permission:: create(['name' => 'admin.Eliminando'])->syncRoles($role1);
        
        Permission:: create(['name' => 'Modulos.Gestion'])->syncRoles($role1);
        Permission:: create(['name' => 'Modulos.Registro'])->syncRoles($role1);
        Permission:: create(['name' => 'Modulos.Editar'])->syncRoles($role1);
        Permission:: create(['name' => 'Modulos.store'])->syncRoles($role1);
        Permission:: create(['name' => 'Modulos.Actualizar'])->syncRoles($role1);
        Permission:: create(['name' => 'Modulos.Eliminar'])->syncRoles($role1);
        Permission:: create(['name' => 'Modulos.Eliminando'])->syncRoles($role1);


        Permission:: create(['name' => 'Tramites.Gestion'])->syncRoles($role1);
        Permission:: create(['name' => 'Tramites.Registrar'])->syncRoles($role1);
        Permission:: create(['name' => 'Tramites.Editar'])->syncRoles($role1);
        Permission:: create(['name' => 'Tramites.store'])->syncRoles($role1);
        Permission:: create(['name' => 'Tramites.Actualizar'])->syncRoles($role1);
        Permission:: create(['name' => 'Tramites.Eliminar'])->syncRoles($role1);
        Permission:: create(['name' => 'Tramites.Eliminando'])->syncRoles($role1);

        Permission:: create(['name' => 'Turnos.Gestion'])->syncRoles($role1);
        Permission:: create(['name' => 'Turnos.Registrar'])->syncRoles($role1,$role4);
        Permission:: create(['name' => 'Turnos.Buscar'])->syncRoles($role1);
        Permission:: create(['name' => 'Turnos.store'])->syncRoles($role1);
        Permission:: create(['name' => 'Turnos.Generar'])->syncRoles($role1);
        Permission:: create(['name' => 'Turnos.Cargar'])->syncRoles($role1,$role2);
        Permission:: create(['name' => 'Turnos.CargarExcel'])->syncRoles($role1,$role2);
        Permission:: create(['name' => 'Turnos.Operadores'])->syncRoles($role3);
        Permission:: create(['name' => 'Turnos.Atencion'])->syncRoles($role3);
        Permission:: create(['name' => 'Turnos.Visualizar'])->syncRoles($role4,$role1);
        Permission:: create(['name' => 'Turnos.Digital'])->syncRoles($role4,$role1);

        Permission:: create(['name' => 'Informes.Reportes'])->syncRoles($role1,$role2);

        
    }
}
