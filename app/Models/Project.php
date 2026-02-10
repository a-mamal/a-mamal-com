<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'title',
        'type',
        'slug',
        'description',
        'project_url',
        'github_url',
        'status',
    ];

    protected $casts = [
        'highlights' => 'array',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
