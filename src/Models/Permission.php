<?php

namespace PHPExperts\LaravelRBAC\Models;

use Carbon\Carbon;
use PHPExperts\ConciseUuid\ConciseUuid;

/**
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 */
class Permission extends ConciseUuid
{
    protected $table = 'rbac_permissions';

    protected $fillable = ['name', 'slug', 'description'];

    protected $dates = ['created_at', 'updated_at'];

    public function roles()
    {
        return $this->belongsToMany('PHPExperts\LaravelRBAC\Models\Role', 'rbac_roles_permissions')->withTimestamps();
    }
}
