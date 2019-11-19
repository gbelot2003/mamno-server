<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_has_permissions')->delete();
        DB::table('model_has_roles')->delete();
        DB::table('roles')->delete();

        $roles = [
            'Productor_Individual',
            'Productor_Grupal',
            'Productor_Representante Grupo',
            'Comprador',
            'Transportista',
            'Promotor',
            'Administrador_Sistema',
            'Administrador_Mantenimiento',
            'verificador', // agregado segun documento
            'Gerente_General',
        ];

        $permissionsAdmin = [
            'ver usuarios', 'crear usuarios', 'editar usuarios', 'suspender usuarios',
            'ver roles', 'crear roles', 'editar roles', 'suspender roles'
        ];

        foreach ($roles as $roles) {
            Role::create(['name' => $roles]);
        }

        $role = Role::findByName('Administrador_Sistema');
        $role->givePermissionTo($permissionsAdmin);




    }
}
