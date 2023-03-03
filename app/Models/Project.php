<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $fillable = ['title', 'type_id', 'content', 'slug'];

    use HasFactory;

    public static function generateSlug($title) {
        return Str::slug($title, '-');
    }

    public function types(): BelongsTo 
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}
