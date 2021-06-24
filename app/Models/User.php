<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'firstname',
        'lastname',
        'profile',
        'mobile',
        'dob',
        'joining_date',
        'gender',
        'salary',
        'passport_document',
        'passport_number',
        'department_id',
        'designation_id',
        'is_active',
        'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function department(){
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

    public function designation(){
        return $this->hasOne(Designation::class, 'id', 'designation_id');
    }

}
