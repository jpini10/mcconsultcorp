<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionSeeder extends Seeder
{
   
    public function run()
    {
        $permissions=[
            'permiso_inicio',
            'permiso_crear',
            'permiso_detalle',
            'permiso_eliminar',
            'permiso_editar',
            'rol_inicio',
            'rol_crear',
            'rol_detalle',
            'rol_eliminar',
            'rol_editar',
            'usuario_inicio',
            'usuario_crear',
            'usuario_detalle',
            'usuario_eliminar',
            'usuario_editar',
            'log_registro',
            'listar_tarea',
            'listar_AsignarTarea',
            'listar_afijos',
            'listar_tomaInventarios',
            'listar_reportes',
            'listar_mantenedores',
            'listar_config',
            'listar_dashobard',
            'listar_tareausuario',
           
        ];
        foreach($permissions as $permission)
        {
            Permission::create(
                [
                    'name'=>$permission
                ] );
        }
    }
}
