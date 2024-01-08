<?php

namespace App\Models;

use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bot extends TelegraphBot
{

    protected $fillable = [
        'name',
        'token',
        'user_id',
    ];

    protected $table = 'telegraph_bots';


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
