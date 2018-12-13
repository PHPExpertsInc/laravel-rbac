<?php

namespace PHPExperts\LaravelRBAC\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'slug', 'description'];

    public function roles()
    {
        return $this->belongsToMany('PHPExperts\LaravelRBAC\Model\Role');
    }
}
