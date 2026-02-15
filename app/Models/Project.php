<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    /** 
     * Enables factory support for this model
     * @use HasFactory<\Database\Factories\ProjectFactory>
     */
    use HasFactory;

    // Mass-assignable fields
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

    // Cast 'highlights' JSON column into PHP array automatically
    protected $casts = [
        'highlights' => 'array',
    ];

    /**
     * Relationship: a Project belongs to a Profile
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    /**
     * Automatically generate a unique slug when creating a project
     *
     * This ensures the slug column can never be null and is unique
     * even if the same title exists multiple times.
     */
    protected static function booted()
    {
        static::creating(function ($project) {
            // Only generate a slug if none provided
            if (!$project->slug) {
                $baseSlug = Str::slug($project->title); // "My Project Title" -> "my-project-title"
                $slug = $baseSlug;
                $counter = 1;

                // Check DB for existing slugs to guarantee uniqueness
                while (static::where('slug', $slug)->exists()) {
                    $slug = $baseSlug . '-' . $counter; // Append counter if duplicate
                    $counter++;
                }

                $project->slug = $slug; // Assign the unique slug
            }
        });
    }
}
