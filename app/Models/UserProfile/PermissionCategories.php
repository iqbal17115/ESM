<?php

namespace App\Models\UserProfile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PermissionCategories extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
