<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User; // Asegúrate de importar el modelo User si aún no lo has hecho
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    // Método para resetear permisos y roles
    public function resetPermissionsAndRoles()
    {
        // Resetear roles y permisos en caché
        app()['cache']->forget('spatie.permission.cache');

        // Agregar un permiso
        $testPermission = 'all-permissions';
        Permission::create(['guard_name' => 'web', 'name' => $testPermission]);

        // Agregar un rol
        $testRole = Role::create(['guard_name' => 'web', 'name' => 'test_role']);

        return response()->json(['message' => 'Permissions and roles reset successfully']);
    }

    // Método para mostrar la lista de roles
    public function index()
    {
        $roles = Role::with('permissions')->paginate(5);
        return view('roles.index', compact('roles'));
    }

    // Método para mostrar el formulario de creación de roles
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    // Método para almacenar un nuevo rol
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles|max:255',
            'permissions' => 'required|array',
        ]);

        $numericRoleArray = array_map('intval', $request->permissions);

        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($numericRoleArray);

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    // Método para mostrar el formulario de edición de un rol
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all(); // Obtener todos los permisos
        return view('roles.edit', compact('role', 'permissions')); // Pasar role y permissions a la vista
    }


    // Método para actualizar un rol
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'required|array',
        ]);

        $role = Role::findOrFail($id);

        $role->update([
            'name' => $request->name,
        ]);

        // Convertir los IDs de roles y permisos a enteros
        $numericPermissionArray = array_map('intval', $request->permissions);

        $role->syncPermissions($numericPermissionArray);

        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }



    // Método para eliminar un rol
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
    }
}
