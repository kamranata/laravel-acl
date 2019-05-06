<?php

namespace Junges\ACL\Test;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Junges\ACL\Events\PermissionSaving;
use Junges\ACL\Traits\PermissionsTrait;

class Permission extends Model
{
    use SoftDeletes, PermissionsTrait;

    protected $table = 'test_permissions';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'description', 'slug',
    ];

    protected $dispatchesEvents = [
        'creating' => PermissionSaving::class
    ];
}