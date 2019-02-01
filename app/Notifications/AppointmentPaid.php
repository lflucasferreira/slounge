<?php

namespace App\Notifications;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AppointmentPaid extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
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
        $appointment = $this->appointment;
        return (new MailMessage)->from($sender)
            ->subject($name . ' | O compromisso do dia ' . $this->appointment->data->format('d/m/Y') . ' foi marcado como pago')
            ->markdown('mail.appointment.paid', compact('appointment', 'path'));
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
            'message' => 'O compromisso do dia ' . $this->appointment->date->format('m/d/Y') . ' foi cancelado.',
            'action' => route('appointments.show', $this->appointment->id)
        ];
    }
}
