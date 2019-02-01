<?php

namespace App\Notifications;

use app\Models\Reward;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RewardExpiration extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Reward $reward)
    {
        $this->reward = $reward;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $name = config('app.name');
        $path = config('app.url');
        $sender = config('mail.from.address');
        $reward = $this->reward;
        return (new MailMessage)->from($sender)
            ->subject($name . ' | Você tem pontos expirando em ' . $this->reward->data->format('d/m/Y'))
            ->markdown('mail.reward.expiration', compact('reward', 'path'));
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
            'message' => 'Pontos a expirar em ' . $this->reward->date->format('m/d/Y') . ': ' . $this->reward->pontos,
            'action' => route('rewards.show', $this->reward->id)
        ];
    }
}
