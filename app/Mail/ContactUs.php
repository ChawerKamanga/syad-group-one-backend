<?php

namespace App\Mail;

use App\Models\ContactUs as ModelsContactUs;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    public $contactUs;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ModelsContactUs $contactUs)
    {
        $this->contactUs = $contactUs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact_us')
            ->subject('MOAS Contact Us');
    }
}
