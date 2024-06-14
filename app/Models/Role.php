<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;


    public const ADMIN = 1;
    public const COLLABORATOR = 2;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'is_active',

        'created_by',
        'updated_by',
    ];


    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'collaborator_id');
    }
}
