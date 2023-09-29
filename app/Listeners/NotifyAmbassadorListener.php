<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Message;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAmbassadorListener
{
    public function handle(object $event): void
    {
        $order = $event->order;

        \Mail::send('mails.ambassador', ['order' => $order], function (Message $message) use ($order) {
            $message->subject('An order has bee completed');
            $message->to($order->ambassador_email);
        });
    }
}
