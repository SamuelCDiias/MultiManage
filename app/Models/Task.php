<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Task extends Model
{

    protected $keyType = 'string';
    
    public $incrementing = false;

    protected $fillable = [
        'id',
        'company_id',
        'user_id',
        'title',
        'description',
        'status',
        'due_date',
    ];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function booted()
    {
        static::creating(function ($task) {
            // Gerar o UUID automaticamente se o id não for atribuído
            if (empty($task->id)) {
                $task->id = (string) Str::uuid();
            }
        });
    }
}
