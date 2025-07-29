<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use PDF;

class SendContractMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
        public function __construct($order_data)
        {
            $this->order_data = $order_data;
        }

    /**
     * Get the message envelope.
     */
  
    /**
     * Get the message content definition.
     */
   
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
   public function build()
    {
        $pdf = PDF::loadView('pdf.contract_pdf', ['order_data' => $this->order_data]);
		//dd( $this->order_data);
        return $this->subject('Your Contract from KMI Roofing')
                    ->view('emails.contract',['order_data' => $this->order_data]) // this can be a simple message
                    ->attachData($pdf->output(), 'contract.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
