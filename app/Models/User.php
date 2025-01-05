<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    // Definindo UUID como chave primária
    protected $keyType = 'string';
    public $incrementing = false;

    // Definindo os campos que podem ser preenchidos
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Campos que devem ser ocultados na serialização (ex: senha e token)
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Campos que devem ser convertidos automaticamente
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relacionamento com Companies (um usuário pode ter várias empresas)
    public function companies()
    {
        return $this->hasMany(Company::class, 'user_id');
    }

    // Relacionamento com CompanyAccess (um usuário pode ter múltiplos acessos a empresas)
    public function companyAccesses()
    {
        return $this->hasMany(CompanyAccess::class, 'user_id');
    }

    // Relacionamento com empresas acessíveis via CompanyAccess (tabela de relacionamento)
    public function accessibleCompanies()
    {
        return $this->belongsToMany(Company::class, 'company_access', 'user_id', 'company_id');
    }

    // gerar uuid antes de criar o usuário
    public static function booted()
    {
        static::creating(function ($user) {
            // Gerar o UUID automaticamente se o id não for atribuído
            if (empty($user->id)) {
                $user->id = (string) Str::uuid();
            }
        });
    }
}
