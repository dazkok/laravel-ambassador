<?php

namespace App\Listeners;

use App\Events\OrderCompletedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Message;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdminListener
{
    public function handle(OrderCompletedEvent $event): void
    {
        $order = $event->order;

        \Mail::send('mails.admin', ['order' => $order], function (Message $message) {
            $message->subject('An order has bee completed');
            $message->to('dazkok@gmail.com');
        });
    }
}
