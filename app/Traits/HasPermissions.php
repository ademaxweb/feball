<?php

namespace App\Traits;

use App\Models\Permission;

trait HasPermissions
{

    /**
     * Permission verification through roles
     * @param Permission $permission
     * @return bool
     */
    public function hasPermissionThroughRoles(Permission $permission): bool
    {
        foreach ($permission->roles as $role) {
            if ($this->roles->contains($role)) return true;
        }
        return false;
    }

    public function hasPermission(Permission $permission): bool
    {
        return $this->hasPermissionThroughRoles($permission);
    }

    /**
     * Get all permissions
     * @return array
     */
    public function permissions(): array
    {
        $permissions = [];
        foreach (Permission::all() as $permission)
        {
            if ($this->hasPermission($permission)) $permissions[] = $permission;
        }
        return $permissions;
    }
}
