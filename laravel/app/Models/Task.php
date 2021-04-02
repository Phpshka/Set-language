<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'is_completed', 'card_id'];
    public function card(){
        return $this->belongsTo(Card::class, 'card_id');
    }

    public function responsibles(){
        return $this->belongsToMany(User::class, "task_responsibles","task_id", "user_id");
    }
}
