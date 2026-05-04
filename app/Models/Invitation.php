<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\User;

class Invitation extends Model
{
    protected $fillable = [
        'email',
        'role',
        'company_id',
        'invited_by'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function invitedBy()
    {
        return $this->belongsTo(User::class, 'invited_by');
    }
}
