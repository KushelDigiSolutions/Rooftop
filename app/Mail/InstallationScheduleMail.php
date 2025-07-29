<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InstallationScheduleMail extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;

    /**
     * Create a new message instance.
     *
     * @param $appointment
     */
    public function __construct($appointment, $installationDate, $installationTime, $franchiseName)
    {
        $this->appointment = $appointment;
        $this->installationDate = $installationDate;
        $this->installationTime = $installationTime;
        $this->franchiseName = $franchiseName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $appointment=$this->appointment;
        if($appointment->installation_date){
            return $this->subject('Installation Schduled Successfully')
            ->view('emails.installation_schedule')
            ->with([
                'appointment' => $this->appointment,
                'installationDate' => $this->installationDate,
                'installationTime' => $this->installationTime,
                'franchiseName' => $this->franchiseName,
            ]);
        }
        

        
    }
}
