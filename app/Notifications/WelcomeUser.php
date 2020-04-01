<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class WelcomeUser extends Notification
{
    use Queueable;


    public $token;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
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
        return (new MailMessage)
                    ->from('no-reply@unadr.org.do', 'NYMUNLAC 2019')
                    ->subject('¡Bienvenido/a al Sistema de Gestión de Conferencias de la ANU-RD!')
                    ->line('¡Bienvenido/a al Sistema de Gestión de Conferencias de la ANU-RD!')
                    ->line('Favor hacer clic en el botón debajo para iniciar el registro de los participantes.')
                    ->action('INICIAR REGISTRO', url(config('app.url').route('password.reset', $this->token, false)))
                    ->line('En caso de requerir asistencia o tener alguna inquietud, puede contactarnos a través de sgc@unadr.org.do.');
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
