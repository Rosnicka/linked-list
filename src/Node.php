<?php declare(strict_types=1);

final class Node
{
    private int $value;

    private ?Node $next;

    public function __construct(int $value, ?Node $next = null)
    {
        $this->value = $value;
        $this->next = $next;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): void
    {
        $this->value = $value;
    }

    public function getNext(): ?Node
    {
        return $this->next;
    }

    public function setNext(?Node $next): void
    {
        $this->next = $next;
    }
}
