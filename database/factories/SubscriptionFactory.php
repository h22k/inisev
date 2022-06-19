<?php

namespace Database\Factories;

use App\Models\Subscription;
use App\Models\User;
use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        while (true) {
            $userId = User::all()->random()->id;
            $websiteId = Website::all()->random()->id;

            $isExists = Subscription::whereUserId($userId)->whereWebsiteId($websiteId)->exists();

            if ( ! $isExists) {
                break;
            }
        }
        return [
            'user_id'    => $userId,
            'website_id' => $websiteId
        ];
    }
}
