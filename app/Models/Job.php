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
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->where(
                fn($q) =>
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
            )
        );

        $query->when(
            $filters['category'] ?? false,
            fn($query, $category) =>
            $query->where('category', $category)
        );

        $query->when(
            $filters['experience'] ?? false,
            fn($query, $experience) =>
            $query->where('experience', $experience)
        );

        $query->when(
            $filters['salary'] ?? false,
            fn($query, $salary) =>
            $query->where('salary', '>=', (int) $salary)
        );
    }
}
