<?php

namespace App\Notifications;

use App\Models\Appointment;
use App\Models\Coupon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CouponApplied extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Appointment $appointment, Coupon $coupon)
    {
        $this->appointment = $appointment;
        $this->coupon = $coupon;
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
        $coupon = $this->coupon;
        return (new MailMessage)->from($sender)
            ->subject($name . ' | Seu cupom foi utilizado para o atendimento do dia ' . $this->coupon->appointment->data->format('d/m/Y'))
            ->markdown('mail.coupon.applied', compact('appointment', 'coupon', 'path'));
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
            'message' => 'O compromisso do dia ' . $this->coupon->date->format('m/d/Y') . ' foi cancelado.',
            'action' => route('coupons.show', $this->coupon->id)
        ];
    }
}
