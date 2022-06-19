<?php

namespace App\Models;

use App\Events\UserSignedUpEvent;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $hidden = ['password'];

    protected $dispatchesEvents = [
      'created' =>  UserSignedUpEvent::class
    ];

    /**
     * @return Attribute
     */
    public function password(): Attribute
    {
        return Attribute::make(
            set: fn($value) => \Hash::make($value)
        );
    }

    /**
     * @return BelongsToMany
     */
    public function websites(): BelongsToMany
    {
        return $this->belongsToMany(Website::class, 'subscriptions');
    }

    /**
     * @param  int  $websiteId
     * @return Subscription
     */
    public function addSubscribe(int $websiteId): Subscription
    {
        return Subscription::create([
            'user_id'    => $this->id,
            'website_id' => $websiteId
        ]);
    }
}
