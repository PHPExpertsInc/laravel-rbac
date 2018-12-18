<?php

namespace PHPExperts\LaravelRBAC\Model;

use PHPExperts\ConciseUuid\ConciseUuid;

class Role extends ConciseUuid
{
    protected $fillable = ['name', 'slug', 'description'];

    public function users()
    {
        return $this->belongsToMany(config('auth.providers.users.model'));
    }

    public function permissions()
    {
        return $this->belongsToMany('PHPExperts\LaravelRBAC\Model\Permission')->withTimestamps();
    }
}
