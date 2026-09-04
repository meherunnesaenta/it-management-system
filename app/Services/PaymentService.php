<?php

namespace App\Services;

use App\Models\Payment;

class PaymentService
{
    public function verifyTransaction($transactionId, $method)
    {
        if ($method == 'bkash' && preg_match('/^BK[0-9]{10}$/', $transactionId)) {
            return ['status' => 'success', 'message' => 'Verified'];
        }

        if ($method == 'nagad' && preg_match('/^NG[0-9]{10}$/', $transactionId)) {
            return ['status' => 'success', 'message' => 'Verified'];
        }

        return ['status' => 'failed', 'message' => 'Invalid Transaction ID'];
    }

    public function processPayment($userId, $amount, $transactionId, $method, $purpose)
    {
        $verification = $this->verifyTransaction($transactionId, $method);

        return Payment::create([
            'user_id' => $userId,
            'amount' => $amount,
            'transaction_id' => $transactionId,
            'payment_method' => $method,
            'purpose' => $purpose,
            'status' => $verification['status'] == 'success' ? 'verified' : 'failed',
            'verified_at' => $verification['status'] == 'success' ? now() : null,
        ]);
    }
}
