<?php

namespace App\Mail;

use App\Comment;
use App\Team;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommentReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $team;
    public $comment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Team $team,Comment $comment)
    {
        $this->team = $team;
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $team = $this->team;
        $comment = $this->comment;

        return $this->view('mails.comment_received', compact('team', 'comment'));
    }
}
