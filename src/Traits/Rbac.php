<?php

namespace PHPZen\LaravelRbac\Traits;

trait Rbac
{
    public function roles()
    {
        return $this->belongsToMany('PHPZen\LaravelRbac\Model\Role')
            ->with('permissions')
            ->withTimestamps();
    }

    /**
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        static $roles = [];
        if (!isset($roles[$this->id]))
            $roles[$this->id] = $this->roles()->pluck('slug')->toArray();

        if (false !== strpos($role, '|')) {
            $roleArr = explode('|', $role);
        } else {
            $roleArr = [$role];
        }

        return !empty(array_intersect($roleArr, $roles[$this->id]));
    }

    /**
     * @param string $operation
     * @return bool
     */
    public function canDo($operation)
    {
        $roles = $this->roles;
        static $permissions = [];
        if (!isset($permissions[$this->id])) {
            $permissions[$this->id] = [];
            foreach ($roles as $role) {
                $permissions[$this->id] = array_merge($permissions[$this->id], $role->permissions->pluck('slug')->toArray());
            }
            $permissions[$this->id] = array_unique($permissions[$this->id]);
        }

        if (false !== strpos($operation, '|')) {
            $operationArr = explode('|', $operation);
        } else {
            $operationArr = [$operation];
        }

        return !empty(array_intersect($operationArr, $permissions[$this->id]));
    }
}
