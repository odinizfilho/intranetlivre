<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPostNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The post URL.
     *
     * @var string
     */
    public $postUrl;

    /**
     * Create a new message instance.
     *
     * @param  string  $postUrl
     * @return void
     */
    public function __construct($postUrl)
    {
        $this->postUrl = $postUrl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
{
    return $this->subject('Notificação de nova postagem - B Controller')
                ->view('emails.new_post_notification')
                ->with([
                    'postUrl' => $this->postUrl,
                ]);
}
}
