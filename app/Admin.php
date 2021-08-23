<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Notifications\AdminPasswordResetNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use Notifiable;

        protected $guard = 'admin';

        public function sendPasswordResetNotification($token)
	    {
	        $this->notify(new AdminPasswordResetNotification($token));
	    }

        protected $fillable = [
            'name', 
            'email', 
            'password',
            'phone',
            'image',
            'category',
            'coupon',
            'product',
            'blog',
            'order',
            'report',
            'user_role',
            'return_order',
            'contact_message',
            'product_comment',
            'product_stock',
            'setting',
            'other',
            'user_type'
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
}
