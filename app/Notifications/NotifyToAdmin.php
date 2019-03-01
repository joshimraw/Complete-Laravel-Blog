<?php
// https://www.youtube.com/watch?v=qECgNlZnHxM&list=PL9fcHFJHtFaZibu1u9-TouL0bpxl_XvPD&index=3
namespace App\Notifications;

use Illuminate\Support\Facades\Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyToAdmin extends Notification
{
    use Queueable;

    public $tag;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($tag)
    {
        $this->tag = $tag;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }



    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'note'      => 'A New tag added',
            'tagname'   => $this->tag->name,
            'author'    => Auth::user()->name,
        ];
    }
}
