<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CompanyAccess extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;

    protected $table = 'company_access';

    protected $fillable = [
        'company_id',
        'user_id',
        'role'
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

    // gerar uuid antes de criar o usuário
    public static function booted()
    {
        static::creating(function ($company) {
            // Gerar o UUID automaticamente se o id não for atribuído
            if (empty($company->id)) {
                $company->id = (string) Str::uuid();
            }
        });
    }
}

