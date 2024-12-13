<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Relacionamento com Companies (um usuário pode ter várias empresas)
    public function companies()
    {
        return $this->hasMany(Company::class, 'user_id');
    }

    // Relacionamento com CompanyAccess (várias permissões de acesso)
    public function companyAccesses()
    {
        return $this->hasMany(CompanyAccess::class, 'user_id');
    }

    // Empresas acessíveis via permissões
    public function accessibleCompanies()
    {
        return $this->belongsToMany(Company::class, 'company_access', 'user_id', 'company_id');
    }
}
