<?php

interface PaymentGateway
{
    public function processPayment(float $amount): string;
    public function refundPayment(string $transactionId, float $amount): bool;
    public function checkStatus(string $transactionId): string;
}

class PayPalGateway implements PaymentGateway
{
    public function processPayment(float $amount): string
    {
        echo "Processing PayPal payment of $" .
            number_format($amount, 2) . "...";
        $transactionId = "PAYPAL_" . uniqid();
        echo "Transaction ID: " . $transactionId . PHP_EOL;
        return $transactionId;
    }
    public function refundPayment(
        string $transactionId,
        float $amount
    ): bool {
        echo "Refunding $" . number_format($amount, 2) .
            " from PayPal transaction " . $transactionId . "...";

        if (rand(0, 1)) {
            echo "Refund successfull." . PHP_EOL;
            return true;
        }

        echo "Refund failed." .  PHP_EOL;
        return false;
    }
    public function checkStatus(string $transactionId): string
    {
        echo "Checking Paypal status for transaction " .
            $transactionId . "...";

        $statuses = ['completed', 'pending', 'failed'];
        $status = $statuses[array_rand($statuses)];
        echo "Status: " .  $status . PHP_EOL;
        return $status;
    }
}

class StripeGateway implements PaymentGateway
{
    public function processPayment(float $amount): string
    {
        echo "Processing Stripe payment of $" .
            number_format($amount, 2) . "...";
        $$transactionId = "STRIPE_" . uniqid();
        echo "Transaction ID:" . $transactionId . PHP_EOL;
        return $transactionId;
    }
    public function refundPayment(
        string $transactionId,
        float $amount
    ): bool {
        echo "Refunding $" . number_format($amount, 2) .
            " from Stripe transaction " . $transactionId . "...";

        if (rand(0, 1)) {
            echo "Refund successful." . PHP_EOL;
            return true;
        }

        echo "Refund failed." . PHP_EOL;
        return false;
    }
    public function checkStatus(string $transactionId): string
    {
        echo "Checking Stripe status for transaction " .
            $transactionId . "...";

        $statuses = ['completed', 'pending', 'declined'];
        $status = $statuses[array_rand($statuses)];
        echo "Status: " . $status . PHP_EOL;
        return $status;
    }
}

class Checkout
{
    private PaymentGateway $gateway;
    public function __construct(PaymentGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function finalizeOrder(float $amount): string
    {
        echo "finalizing order for $" . number_format($amount, 2)
            . "..." . PHP_EOL;
        try {
            $transactionId = $this->gateway->processPayment($amount);
            echo "Order finalized successfully." . PHP_EOL;
            return $transactionId;
        } catch (Exception $e) {
            echo "Order finalization failed: "
                . $e->getMessage() . PHP_EOL;
            return "ERROR";
        }
    }

    public function refundOrder(
        string $transactionId,
        float $amount
    ): bool {
        return $this->gateway->refundPayment($transactionId, $amount);
    }

    public function getOrderStatus(string $transactionId): string
    {
        return $this->gateway->checkStatus($transactionId);
    }
}

echo "--- Payment Gateway System Example ---" . PHP_EOL;

echo "\n--- Using Paypal ---" . PHP_EOL;
$payPal = new PayPalGateway();
$checkoutPaypal = new Checkout($payPal);

$paypalTxnId = $checkoutPaypal->finalizeOrder(100.50);
$checkoutPaypal->refundOrder($paypalTxnId, 100.50);
$checkoutPaypal->getOrderStatus($paypalTxnId);

echo "\n--- Using Stripe ---" . PHP_EOL;
$stripe = new StripeGateway();
$checkoutStripe = new Checkout($stripe);

$stripeTxnId = $checkoutStripe->finalizeOrder(100.50);
$checkoutStripe->refundOrder($stripeTxnId, 100.50);
$checkoutStripe->getOrderStatus($stripeTxnId);

echo PHP_EOL;
