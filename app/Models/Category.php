<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'category_id',
        'active'
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
        'active'
    ];

    protected $attributes = [
        'active' => true,
    ];

    protected $softDelete = true;

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
