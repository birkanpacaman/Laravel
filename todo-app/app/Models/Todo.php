<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'category_id',
        'status',
        'priority',
        'due_date',
        'completed_date',
        'is_starred',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(related: user::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(related: Category::class);
    }
}
