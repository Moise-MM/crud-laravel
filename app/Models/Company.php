<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
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
        'website',
        'address',
    ];


    /**
     * Relationship With clients
     *
     */
    public function clients() {
        return $this->hasMany(Client::class, 'company_id');
    }
}
