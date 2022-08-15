<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    private $viewed_count;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'user_id',
    ];

    protected $hidden = [
        'deleted_at',
        'category_id',
        'user_id',
        'created_at',
        'updated_at',
    ];

    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
