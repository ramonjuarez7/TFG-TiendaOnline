<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class RegistroCompleto extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $usuario;
    
    public function __construct(User $user)
    {
        //
        $usuario = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.registry')/*->to($usuario->Email, $usuario->Nombre)
            ->from('butorestoresup@gmail.com','Butore Store')
            ->subject('Confirmación de registro')*/;
    }
}
