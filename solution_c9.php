<?php
class Event
{
    private string $name;
    private array $data;
    private bool $propagationStopped = false;

    public function __construct(string $name, array $data = [])
    {
        $this->name = $name;
        $this->data = $data;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function stopPropagation(): void
    {
        $this->propagationStopped = true;
    }

    public function isPropagationStopped(): bool
    {
        return $this->propagationStopped;
    }
}

class EventDispatcher
{
    private array $listeners = [];

    public function addListener($eventName, callable $listener)
    {
        if (!isset($this->listeners[$eventName])) {
            $this->listeners[$eventName] = [];
        }

        $this->listeners[$eventName][] = $listener;
    }

    public function dispatch($eventName, $data = null)
    {
        if (!isset($this->listeners[$eventName])) {
            return;
        }

        $event = new Event($eventName, $data);

        foreach ($this->listeners[$eventName] as $listener) {
            if ($event->isPropagationStopped()) {
                break;
            }
            call_user_func($listener, $event);
        }
    }
}

class User
{
    private EventDispatcher $dispatcher;

    public function __construct(EventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function register() {}
}
