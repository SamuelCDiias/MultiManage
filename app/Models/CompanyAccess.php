<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAccess extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_id',
    ];

    // Relacionamento com User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relacionamento com Company
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}

