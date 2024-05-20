<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Order;
use App\Models\Review;
use App\Models\Address;
use App\Models\Wishlist;
use App\Models\Affiliate;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name','last_name','email',
        'password',
        'role','status'
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
        'password' => 'hashed',
        'role'=> 'array'
    ];

    public function getNameAttribute(){
        return ucwords($this->first_name).' '.ucwords($this->last_name);
    }

    public function wishlists(){
        return $this->hasMany(Wishlist::class);
    } 

    public function inWishlist($product_id){
        return $this->wishlists->where('product_id',$product_id)->isNotEmpty();
    }

    public function affiliate(){
        return $this->hasOne(Affiliate::class);
    }

    public function referrer(){
        return $this->belongsTo(Affiliate::class)->withDefault();
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
    
    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function addresses(){
        return $this->hasMany(Address::class);
    }
}
