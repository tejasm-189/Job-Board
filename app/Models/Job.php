<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;
    public static array $experience =  ['entry', 'intermediate', 'senior'];
    public static array $categories =  ['IT', 'Finance', 'Sales', 'Marketing'];

    protected $table = 'job_listings';

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where(function ($q) use ($filters) {
                $q->where('title', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('description', 'like', '%' . $filters['search'] . '%');
            });
        }

        if ($filters['category'] ?? false) {
            $query->where('category', $filters['category']);
        }

        if ($filters['experience'] ?? false) {
            $query->where('experience', $filters['experience']);
        }

        if ($filters['salary'] ?? false) {
            $query->where('salary', '>=', (int) $filters['salary']);
        }
    }
}
