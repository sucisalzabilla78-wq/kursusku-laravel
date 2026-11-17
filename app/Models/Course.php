<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = [
        'code',
        'title',
        'description',
        'instructor',
        'price',
        'quota',
        'start_date',
        'status',
        'duration_hours',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'start_date' => 'date',
    ];

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    public function participants()
    {
        return $this->belongsToMany(Participant::class, 'enrollments')
            ->withPivot('status')->withTimestamps();
    }
}