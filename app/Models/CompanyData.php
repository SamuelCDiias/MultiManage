<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyData extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'data_type',
        'value',
    ];

    // Relacionamento com Company
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}

