<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable implements JWTSubject
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [
            'user'=>$this,
            'role' => $this->roles()->first()->name,
            'permissions' => $this->getPermissionsViaRoles()->pluck('name')->toArray()
        ];
    }


    /**
    * Relations
    */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }

    public function mecanico()
    {
        return $this->hasOne(Mecanico::class);
    }

    public function administrador()
    {
        return $this->hasOne(Administrador::class);
    }

}
