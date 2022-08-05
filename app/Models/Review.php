<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'service_id',
        'review',
        'rating',
    ];

    protected $hidden = [
        'author_id',
        'created_at',
        'updated_at',
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
