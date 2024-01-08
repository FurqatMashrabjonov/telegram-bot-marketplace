<?php

namespace App\Models;

use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends TelegraphChat
{
    protected $table = 'telegraph_chats';
}
