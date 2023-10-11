<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewCandidate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    public $vacant_id;
    public $vacant_tittle;
    public $user_id;

    public function __construct($vacant_id, $vacant_tittle, $user_id)
    {
        // El constructor necesita recibir parametros para asi poder guardarlos en la tabla de notificaciones y para personalisar mejor la informacion de los mensaje
        $this->vacant_id = $vacant_id;
        $this->vacant_tittle = $vacant_tittle;
        $this->user_id = $user_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        // Esta es la funcion donde escribimos lo que va dentro del correo
        $url = url('/notification');

        return (new MailMessage)
                    ->line('You have a new candidate of ' . $this->vacant_tittle . ' vacant')
                    ->action('Canidates', $url)
                    ->line('Good luck');
    }

    // Save notification in a database

    public function toDatabase($notifiable)
    {
        // este sera el arreglo que se guardara con la base de datos
        return [
            'vacant_id' => $this->vacant_id,
            'vacant_tittle' => $this->vacant_tittle,
            'user_id' => $this->user_id
        ];
    }
}
