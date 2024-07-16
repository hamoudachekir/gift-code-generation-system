<?php

namespace App\Models;

use App\Enums\QuotaPer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collaborator extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'email',
        'phone',
        'is_active',
        'is_free',
        'quota',
        'quota_per',
        'price',

        'created_by',
        'updated_by',
    ];



    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'quota_per' => QuotaPer::class,
    ];



    public function stores(): BelongsToMany
    {
        return $this->belongsToMany(Store::class);
    }

    public function validities(): BelongsToMany
    {
        return $this->belongsToMany(Validity::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'collaborator_id');
    }


    public function priceRules(): HasMany
    {
        return $this->hasMany(PriceRule::class, 'collaborator_id');
    }

    public function giftCard(): HasMany
    {
        return $this->hasMany(GiftCard::class, 'collaborator_id');
    }



    public function is_active()
    {
        return $this->is_active ?? false ;
    }

}
