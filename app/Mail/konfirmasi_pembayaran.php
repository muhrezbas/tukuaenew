<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use app\transaksi;


class konfirmasi_pembayaran extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(transaksi $transaksi,$tanggal)
    {
        $this->transaksi = $transaksi;
        $this->tanggal = $tanggal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('Tukuaeid@gmail.com', 'Tukuae')
                    ->subject("Payment Confirmation")
                    ->markdown('email.konfirmasi')
                    ->with('transaksi', $this->transaksi)
                    ->with('tanggal', $this->tanggal);
                
    }
}
