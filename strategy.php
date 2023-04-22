<?php

interface PaymentStrategy
{
    public function pay($totalAmount, $phoneNumber);
}

class QiwiPayment implements PaymentStrategy
{
    public function pay($totalAmount, $phoneNumber)
    {
        return "Выплата $totalAmount рублей успешно завершена через Qiwi. Код подтверждения платежа: 123456";
    }
}

class YandexPayment implements PaymentStrategy
{
    public function pay($totalAmount, $phoneNumber)
    {
        return "Выплата $totalAmount рублей успешно завершена через Яндекс. Код подтверждения платежа: 654321";
    }
}

class WebMoneyPayment implements PaymentStrategy
{
    public function pay($totalAmount, $phoneNumber)
    {
        return "Выплата $totalAmount рублей успешно завершена через WebMoney. Код подтверждения платежа: 789012";
    }
}

class PaymentContext
{
    private $paymentStrategy;

    public function __construct(PaymentStrategy $paymentStrategy)
    {
        $this->paymentStrategy = $paymentStrategy;
    }

    public function processPayment($totalAmount, $phoneNumber)
    {
        return $this->paymentStrategy->pay($totalAmount, $phoneNumber);
    }
}
