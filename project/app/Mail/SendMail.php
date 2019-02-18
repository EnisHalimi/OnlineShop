<?php

namespace App\Mail;
use App\Order;
use App\Products_Order;
use App\User;
use  Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order; 


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        
       $this->order = $order;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $carbon =Carbon::now();
        $date = $carbon->toDateTimeString();
        return $this->subject('StarTech Porosia '.$date)
        ->view('emails.name')->with('date',$date);
    }
}
