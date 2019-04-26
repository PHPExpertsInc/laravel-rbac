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
class Role extends ConciseUuid
{
    protected $table = 'rbac_roles';

    protected $fillable = ['name', 'slug', 'description'];

    protected $dates = ['created_at', 'updated_at'];

    public function users()
    {
        return $this->belongsToMany(config('auth.providers.users.model'));
    }

    public function permissions()
    {
        return $this->belongsToMany('PHPExperts\LaravelRBAC\Models\Permission', 'rbac_roles_permissions')->withTimestamps();
    }
}
