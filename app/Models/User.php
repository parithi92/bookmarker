<?php

declare(strict_types=1);
 
namespace App\Models;
 
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
 
class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    use HasApiTokens;
 
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
 
    protected $hidden = [
        'password',
        'remember_token',
    ];
 
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
 
    public function bookmarks(): HasMany
    {
        return $this->hasMany(
            related: Bookmark::class,
            foreignKey: 'user_id',
        );
    }
}