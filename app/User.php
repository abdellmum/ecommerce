<?php

namespace App;

use App\model\admin\Product;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    /**

     *
     * @var array
     */
    protected $fillable = [
        'name',  'phone', 'email', 'password', 'provider', 'provider_id'
    ];

    /**

     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**

     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function products()
    {
        return $this->hasMany(Product::class); // un utilisateur  a plusieur produits// 
    }
}
