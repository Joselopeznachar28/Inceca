<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Roles
        $admin = Role::create([
            'name' => 'Administrador',
        ]);
        $superuser = Role::create([
            'name' => 'SuperUsuario',
        ]);
        $responsable = Role::create([
            'name' => 'Responsable',
        ]);
        $visualizador = Role::create([
            'name' => 'Visualizador',
        ]);

        //Permisos

        //USUARIOS
        $home = Permission::create([
            'name' => 'dashboard',
            'description' => 'Ver Dashboard',
        ])->syncRoles([$admin,$superuser,$responsable,$visualizador]);

        $activitiesIndex = Permission::create([
            'name' => 'activities.index',
            'description' => 'Ver Historial de Actividades',
        ])->syncRoles([$admin]);

        $usersIndex = Permission::create([
            'name' => 'users.index',
            'description' => 'Ver Lista de Usuario'
        ])->syncRoles([$admin,$superuser,$responsable,$visualizador]);

        $usersCreate = Permission::create([
            'name' => 'users.create',
            'description' => 'Crear Usuario',
        ])->syncRoles([$admin]);

        $usersShow = Permission::create([
            'name' => 'users.show',
            'description' => 'Ver Detalles Usuario',
        ])->syncRoles([$admin,$superuser,$responsable,$visualizador]);

        $usersEdit = Permission::create([
            'name' => 'users.edit',
            'description' => 'Editar Usuario',
        ])->syncRoles([$admin]);

        $usersDestroy = Permission::create([
            'name' => 'users.destroy',
            'description' => 'Eliminar Usuario',
        ])->syncRoles([$admin]);

        //Categories
        $categoriesIndex = Permission::create([
            'name' => 'categories.index',
            'description' => 'Ver Lista de Categorias'
        ])->syncRoles([$admin,$superuser,$responsable,$visualizador]);
        
        $categoriesCreate = Permission::create([
            'name' => 'categories.create',
            'description' => 'Crear Categoria'
        ])->syncRoles([$admin,$superuser,$responsable]);
        
        $categoriesEdit = Permission::create([
            'name' => 'categories.edit',
            'description' => 'Editar Categoria'
        ])->syncRoles([$admin,$superuser,$responsable]);

        $categoriesDelete = Permission::create([
            'name' => 'categories.destroy',
            'description' => 'Eliminar Categoria'
        ])->syncRoles([$admin,$superuser]);

        //Areas
        $areasIndex = Permission::create([
            'name' => 'areas.index',
            'description' => 'Ver Lista de Areas'
        ])->syncRoles([$admin,$superuser,$responsable,$visualizador]);
        
        $areasCreate = Permission::create([
            'name' => 'areas.create',
            'description' => 'Crear Area'
        ])->syncRoles([$admin,$superuser,$responsable]);
        
        $areasEdit = Permission::create([
            'name' => 'areas.edit',
            'description' => 'Editar Area'
        ])->syncRoles([$admin,$superuser,$responsable]);

        $areasDelete = Permission::create([
            'name' => 'areas.destroy',
            'description' => 'Eliminar Area'
        ])->syncRoles([$admin,$superuser]);

        //Clients
        $clientsIndex = Permission::create([
            'name' => 'clients.index',
            'description' => 'Ver Lista de Clientes'
        ])->syncRoles([$admin,$superuser,$responsable,$visualizador]);
        
        $clientsCreate = Permission::create([
            'name' => 'clients.create',
            'description' => 'Crear Cliente'
        ])->syncRoles([$admin,$superuser,$responsable]);
        
        $clientsEdit = Permission::create([
            'name' => 'clients.edit',
            'description' => 'Editar Cliente'
        ])->syncRoles([$admin,$superuser,$responsable]);

        $clientsDelete = Permission::create([
            'name' => 'clients.destroy',
            'description' => 'Eliminar Cliente'
        ])->syncRoles([$admin,$superuser]);
        
        //Installations
        $installationsIndex = Permission::create([
            'name' => 'installations.index',
            'description' => 'Ver Lista de Instalaciones'
        ])->syncRoles([$admin,$superuser,$responsable,$visualizador]);
        
        $installationsCreate = Permission::create([
            'name' => 'installations.create',
            'description' => 'Crear Instalacion'
        ])->syncRoles([$admin,$superuser,$responsable]);
        
        $installationsEdit = Permission::create([
            'name' => 'installations.edit',
            'description' => 'Editar Instalacion'
        ])->syncRoles([$admin,$superuser,$responsable]);

        $installationsDelete = Permission::create([
            'name' => 'installations.destroy',
            'description' => 'Eliminar Instalacion'
        ])->syncRoles([$admin,$superuser]);
        
        //Projects
        $projectsIndex = Permission::create([
            'name' => 'projects.index',
            'description' => 'Ver Lista de Proyectos'
        ])->syncRoles([$admin,$superuser,$responsable,$visualizador]);
        
        $projectsCreate = Permission::create([
            'name' => 'projects.create',
            'description' => 'Crear Proyecto'
        ])->syncRoles([$admin,$superuser,$responsable]);
        
        $projectsEdit = Permission::create([
            'name' => 'projects.edit',
            'description' => 'Editar Proyecto'
        ])->syncRoles([$admin,$superuser,$responsable]);

        $projectsDelete = Permission::create([
            'name' => 'projects.destroy',
            'description' => 'Eliminar Proyecto'
        ])->syncRoles([$admin,$superuser]);

        $projectsPdf = Permission::create([
            'name' => 'projects.pdf',
            'description' => 'PDF del Proyecto'
        ])->syncRoles([$admin,$superuser,$responsable,$visualizador]);
        
        //Announcements
        $announcementsIndex = Permission::create([
            'name' => 'announcements.index',
            'description' => 'Ver Lista de Avisos'
        ])->syncRoles([$admin,$superuser,$responsable,$visualizador]);
        
        $announcementsCreate = Permission::create([
            'name' => 'announcements.create',
            'description' => 'Crear Aviso'
        ])->syncRoles([$admin,$superuser,$responsable]);
        
        $announcementsEdit = Permission::create([
            'name' => 'announcements.edit',
            'description' => 'Editar Aviso'
        ])->syncRoles([$admin,$superuser,$responsable]);

        $announcementsDelete = Permission::create([
            'name' => 'announcements.destroy',
            'description' => 'Eliminar Aviso'
        ])->syncRoles([$admin,$superuser]);

        $announcementsShow = Permission::create([
            'name' => 'announcements.show',
            'description' => 'Detalles del Aviso'
        ])->syncRoles([$admin,$superuser,$responsable,$visualizador]);

        //Processes
        $processesIndex = Permission::create([
            'name' => 'processes.index',
            'description' => 'Ver Lista de Procesos Administrativos'
        ])->syncRoles([$admin,$superuser,$responsable,$visualizador]);
        
        $processesCreate = Permission::create([
            'name' => 'processes.store',
            'description' => 'Generar Proceso Administrativo'
        ])->syncRoles([$admin,$superuser]);

        // $processesDelete = Permission::create([
        //     'name' => 'processes.destroy',
        //     'description' => 'Eliminar Proceso Administrativo'
        // ])->syncRoles([$admin,$superuser]);

        $processesShow = Permission::create([
            'name' => 'processes.show',
            'description' => 'Detalles del Proceso Administrativo'
        ])->syncRoles([$admin,$superuser,$responsable,$visualizador]);

        //Planifications
        $planificationsCreate = Permission::create([
            'name' => 'planifications.create',
            'description' => 'Crear Planificacion'
        ])->syncRoles([$admin,$superuser]);
        
        $planificationsEdit = Permission::create([
            'name' => 'planifications.edit',
            'description' => 'Editar Planificacion'
        ])->syncRoles([$admin,$superuser]);

        $planificationsStatus = Permission::create([
            'name' => 'changeFinishStatusPlanification',
            'description' => 'Finalizar Fase de Planificacion'
        ])->syncRoles([$admin,$superuser]);

        //Organizations
        $organizationsCreate = Permission::create([
            'name' => 'organizations.create',
            'description' => 'Crear Organizacion'
        ])->syncRoles([$admin,$superuser]);
        
        $organizationsEdit = Permission::create([
            'name' => 'organizations.edit',
            'description' => 'Editar Organizacion'
        ])->syncRoles([$admin,$superuser]);

        $organizationsStatus = Permission::create([
            'name' => 'changeFinishStatusOrganization',
            'description' => 'Finalizar Fase de Organizacion'
        ])->syncRoles([$admin,$superuser]);
        
        //Direction
        $directionsCreate = Permission::create([
            'name' => 'directions.create',
            'description' => 'Crear Direccion'
        ])->syncRoles([$admin,$superuser]);
        
        $directionsEdit = Permission::create([
            'name' => 'directions.edit',
            'description' => 'Editar Direccion'
        ])->syncRoles([$admin,$superuser]);

        $directionsStatus = Permission::create([
            'name' => 'changeFinishStatusDirection',
            'description' => 'Finalizar Fase de Direccion'
        ])->syncRoles([$admin,$superuser]);
        
        //Control
        $controlsCreate = Permission::create([
            'name' => 'controls.create',
            'description' => 'Crear Control'
        ])->syncRoles([$admin,$superuser]);
        
        $controlsEdit = Permission::create([
            'name' => 'controls.edit',
            'description' => 'Editar Control'
        ])->syncRoles([$admin,$superuser]);

        $controlsStatus = Permission::create([
            'name' => 'changeFinishStatusControl',
            'description' => 'Finalizar Fase de Control'
        ])->syncRoles([$admin,$superuser]);
    }
}
