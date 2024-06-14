<?php

namespace App\Models;

use Filament\Models\Contracts\HasName;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser, HasName, MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'collaborator_id',
        'is_active',
        'role_id',
        'last_login',

        'created_by',
        'updated_by',
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
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
        return str_ends_with($this->email, '@gmail.com') && $this->hasVerifiedEmail();
    }

    public function getFilamentName(): string
    {
        return ($this->last_name && $this->first_name) ? 
                    "{$this->first_name} {$this->last_name}" : 
                    "{$this->name}";
    }


    
    public function collaborator(): BelongsTo
    {
        return $this->belongsTo(Collaborator::class, 'collaborator_id', 'id');
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Collaborator::class, 'role_id', 'id');
    }


    public function is_collaborator()
    {
        return ($this->role_id == Role::COLLABORATOR);
    }

    public function is_admin()
    {
        return ($this->role_id == Role::ADMIN);
    }

}
