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
            'Productor',
            'Comprador',
            'Transportista',
            'Promotor',
            'Administrador',
            'verificador', // agregado segun documento
            'Gerente',
        ];

        $permissionsAdmin = [
            'ver usuarios', 'crear usuarios', 'editar usuarios', 'suspender usuarios',
            'ver roles', 'crear roles', 'editar roles', 'suspender roles'
        ];

        foreach ($roles as $roles) {
            Role::create(['name' => $roles]);
        }

        $role = Role::findByName('Administrador');
        $role->givePermissionTo($permissionsAdmin);




    }
}
