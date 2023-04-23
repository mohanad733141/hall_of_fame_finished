<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Announcements extends Model
{
    protected $fillable = [
        'announcements_description', 'user_id', 'announcements_title'
    ];

    public function Users(): BelongsTo
    {
        //each project belongs to a particular cat (laravel model relationships) each project belongs to a specific cat
        return $this->belongsTo(User::class);
    }
}
