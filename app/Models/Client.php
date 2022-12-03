<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'company_id',
        'phone',
        'gender',
        'image'
    ];



     /**
      * Relationship To Company
      *
      */
     public function company() {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
