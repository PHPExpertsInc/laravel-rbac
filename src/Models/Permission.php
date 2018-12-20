<?php

namespace PHPExperts\LaravelRBAC\Models;

use PHPExperts\ConciseUuid\ConciseUuid;

class Permission extends ConciseUuid
{
    protected $table = 'rbac_permissions';

    protected $fillable = ['name', 'slug', 'description'];

    public function roles()
    {
        return $this->belongsToMany('PHPExperts\LaravelRBAC\Models\Role', 'rbac_roles_permissions')->withTimestamps();
    }
}
