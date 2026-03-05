<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StripeWebhookListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $payload = $event->payload;
        if($payload['type'] == 'payment_intent.succeeded') {
            $customerId = $payload['data']['object']['customer'];
            $user = User::where('stripe_id', $customerId)->first();
            if($user) {
                $user->update([
                    'is_paid' => true
                ]);
            }
        }
    }
}
