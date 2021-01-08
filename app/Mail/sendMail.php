<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $nama;
    protected $pwd;
    protected $username;
    protected $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nama,$pwd,$username,$url)
    {
        $this->nama = $nama;
        $this->pwd = $pwd;
        $this->username = $username;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->from('E-Laundry@mail.com')
                   ->view('auth.email')
                   ->with(
                    [
                        'nama' => $this->nama,
                        'pass' => $this->pwd,
                        'username' => $this->username,                        
                        'url' => $this->url,
                    ]);
    }
}
