<?php

namespace App\Models;

use App\Events\PostPublishedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $dispatchesEvents = [
      'created' => PostPublishedEvent::class
    ];

    /**
     * @return BelongsTo
     */
    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class);
    }
}
