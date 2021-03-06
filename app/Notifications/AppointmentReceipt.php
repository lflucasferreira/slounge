<?php

namespace App\Notifications;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AppointmentReceipt extends Notification implements ShouldQueue
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
            ->subject($name . ' | Recibo do atendimento realizado em ' . $this->appointment->data->format('d/m/Y'))
            ->markdown('mail.appointment.receipt', compact('appointment', 'path'));
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
            'message' => 'Você recebeu um recibo do atendimento realizado em ' . $this->appointment->data->format('m/d/Y'),
            'action' => route('appointments.show', $this->appointment->id)
        ];
    }
}
