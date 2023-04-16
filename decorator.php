<?php

interface Notifier
{
    public function send(string $message): void;
}

class EmailNotifier implements Notifier
{
    public function send(string $message): void
    {
    }
}

class SmsNotifier implements Notifier
{
    public function send(string $message): void
    {
    }
}

abstract class NotifierDecorator implements Notifier
{
    protected $notifier;

    public function __construct(Notifier $notifier)
    {
        $this->notifier = $notifier;
    }

    abstract public function send(string $message): void;
}

class FirstNotifier extends NotifierDecorator
{
    public function send(string $message): void
    {
        $this->notifier->send($message);
    }
}

class SecondNotifier extends NotifierDecorator
{
    public function send(string $message): void
    {
        $this->notifier->send($message);
    }
}
