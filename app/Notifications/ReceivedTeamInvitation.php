<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ReceivedTeamInvitation extends Notification
{
    use Queueable;

    public $team;
    public $invite_token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($team, $invite_token)
    {
        $this->team = $team;
        $this->invite_token = $invite_token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * COULD Probably do a database notification as well for on-site notifications.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $invite_url = config('app.url') . '/teams/invite/' . $this->invite_token;
        return (new MailMessage)
            ->success()
            ->line('Congrats! You have just been invited to the team: "'. $this->team->name .'"!')
            ->action('Accept Invite', $invite_url)
            ->line('If there are any issues, please contact the team admin directly.');
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
            //
        ];
    }
}
