<?php

namespace App\Console\Commands;

use App\Mail\SubscribeMail;
use App\Models\Post;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class SendEmailToSubscribers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email:subscribers {postId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command sends email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $postId = $this->argument('postId');

        if ( ! $post = Post::find($postId)) {
            $this->error('There is no post with given id.');
        }

        $posts = \Cache::get('publishedPost');

        if (in_array($postId, $posts)) {
            $this->error('This post already published!');
        }

        $posts[] = $postId;
        \Cache::set('publishedPost', $posts);

        $users = $post->website->users;
        $websiteName = $post->website->name;

        Mail::to($users)->queue(new SubscribeMail
            (
                "New post published! - $post->title",
                [
                    'website' => $websiteName,
                    'desc'    => $post->description
                ])
        );
    }
}
