<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'industry',
        'user_id',
    ];

    // Relacionamento com User (proprietário da empresa)
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relacionamento com CompanyData (dados relacionados à empresa)
    public function data()
    {
        return $this->hasMany(CompanyData::class, 'company_id');
    }

    // Relacionamento com CompanyAccess (usuários com acesso à empresa)
    public function accesses()
    {
        return $this->hasMany(CompanyAccess::class, 'company_id');
    }

    // Usuários que têm acesso à empresa
    public function users()
    {
        return $this->belongsToMany(User::class, 'company_access', 'company_id', 'user_id');
    }
}
