<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BuktiPendaftaranLombaDebatBahasaInggris extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $qrCode;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        // $this->qrCode = $qrCode;
    }

    public function build()
    {
        return $this->from('csdewa25@gmail.com')
            ->view('email.buktiDebat')
            ->with('data', $this->data);
            // ->attachData($this->qrCode, 'qrCode.png', ['mime' => 'image/png']);
    }
}
