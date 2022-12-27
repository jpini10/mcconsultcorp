<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RoleHasPermissionSeeder extends Seeder
{
  
    public function run()
    {
        $admin_permissions=Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

       $user_permissions=$admin_permissions->filter(function($permission){
           return
            substr($permission->name, 0 ,8) != 'usuario_' &&
           substr($permission->name, 0 ,4) != 'rol_' &&
           substr($permission->name, 0 ,8) != 'permiso_' &&
           substr($permission->name, 0 ,7) != 'listar_';
           
       });
       Role::findOrFail(2)->permissions()->sync($user_permissions);
    }
}
