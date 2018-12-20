<?php

namespace PHPExperts\LaravelRBAC\Models;

use PHPExperts\ConciseUuid\ConciseUuid;

class Role extends ConciseUuid
{
    protected $table = 'rbac_roles';

    protected $fillable = ['name', 'slug', 'description'];

    public function users()
    {
        return $this->belongsToMany(config('auth.providers.users.model'));
    }

    public function permissions()
    {
        return $this->belongsToMany('PHPExperts\LaravelRBAC\Models\Permission', 'rbac_roles_permissions')->withTimestamps();
    }
}
