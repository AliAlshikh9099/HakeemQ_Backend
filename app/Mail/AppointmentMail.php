<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $appoint;
    protected $doctor;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($appoint)
    {
        $this->appoint=$appoint;
        
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Appointment Mail For Doctor',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.appointment',
            with:[
            
               'user_name'=> $this->appoint->name,
                'appoint_date'=>$this->appoint->appoint_date,
                'appoint_time'=>$this->appoint->appoint_time,
                'doctor_name'=>$this->appoint->doctor->name,


            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
