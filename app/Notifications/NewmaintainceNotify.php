<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewmaintainceNotify extends Notification implements ShouldQueue,ShouldBroadcast
{
    use Queueable;

    protected $maintaince;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($maintaince)
    {
        $this->maintaince = $maintaince;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('There is new maintaince order from' . $this->maintaince->user->name .'.')
                    ->action('Notification Action', route('maintenance.show',$this->maintaince->id))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'id' => $this->maintaince->id,
            'description' => $this->maintaince->description,
            'maintaince_category_id' => $this->maintaince->maintaince_category_id,
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'data' =>[
                'id' => $this->maintaince->id,
                'description' => $this->maintaince->description,
                'maintaince_category_id' => $this->maintaince->maintaince_category_id,
            ] ,

        ]);
    }
}
