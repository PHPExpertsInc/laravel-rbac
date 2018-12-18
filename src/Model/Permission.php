<?php

namespace PHPExperts\LaravelRBAC\Model;

use PHPExperts\ConciseUuid\ConciseUuid;

class Permission extends ConciseUuid
{
    protected $fillable = ['name', 'slug', 'description'];

    public function roles()
    {
        return $this->belongsToMany('PHPExperts\LaravelRBAC\Model\Role');
    }
}
