<?php

namespace App\Services;

use App\Models\Website;
use App\Services\Interfaces\WebsiteServiceInterface;

class WebsiteServices implements WebsiteServiceInterface
{
    /**
     * @param  array  $data
     * @return Website
     */
    public function create(array $data): Website
    {
        return Website::create($data);
    }
}
