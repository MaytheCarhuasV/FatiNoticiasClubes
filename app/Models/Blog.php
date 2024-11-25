<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
class Blog extends Model
{
    use HasFactory;
    //devuelve el usuario que ha creado el blog
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
