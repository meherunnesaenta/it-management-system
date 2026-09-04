<?php

namespace App\Services;

use App\Models\Payment;

class PaymentService
{
    public function processPayment($userId, $amount, $transactionId, $method, $purpose)
    {
        return Payment::create([
            'user_id' => $userId,
            'amount' => $amount,
            'transaction_id' => $transactionId,
            'payment_method' => $method,
            'purpose' => $purpose,
            'status' => 'pending',
            'verified_at' => null,
        ]);
    }
}
