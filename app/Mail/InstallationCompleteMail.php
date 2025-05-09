<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InstallationCompleteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order_data;

    /**
     * Create a new message instance.
     *
     * @param $appointment
     */
    public function __construct($order_data)
    {
        $this->order_data = $order_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $order_data=$this->order_data;
        if($order_data){
            return $this->subject('Installation Complete Successfully')
            ->view('emails.installation_complete')
            ->with([
                'order_data' => $this->order_data,
            ]);
        }
        

        
    }
}
