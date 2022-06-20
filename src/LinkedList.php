<?php declare(strict_types=1);

final class LinkedList
{
    private ?Node $head = null;

    public function insertAtStart(int $value): void
    {
        $this->head = new Node($value, $this->head);
    }

    public function insertAtEnd(int $value): void
    {
        $last = $this->getLast();
        if ($last === null) {
            $this->insertAtStart($value);
            return;
        }

        $last->setNext(new Node($value));
    }

    public function insertAt(int $value, int $position): void
    {
        if ($position <= 0) {
            throw new LogicException(sprintf('Position must be positive non-zero number. Got %s', $position));
        }

        if ($position === 1) {
            $this->insertAtStart($value);

            return;
        }

        $nodeBefore = $this->getAt($position - 1);
        if ($nodeBefore === null) {
            $this->insertAtEnd($value);

            return;
        }

        $newNode = new Node($value);
        $nodeNext = $nodeBefore->getNext();
        if ($nodeNext !== null) {
            $newNode->setNext($nodeNext);
        }
        $nodeBefore->setNext($newNode);
    }

    public function getFirst(): ?Node
    {
        return $this->head;
    }

    public function getAt(int $position): ?Node
    {
        if ($position <= 0) {
            throw new LogicException(sprintf('Position must be positive non-zero number. Got %s', $position));
        }

        $current = $this->getFirst();
        if ($position === 1) {
            return $current;
        }

        $i = 1;
        do {
            if ($current === null) {
                return null;
            }

            $current = $current->getNext();
            $i++;
        } while ($i < $position);

        return $current;
    }

    public function getLast(): ?Node
    {
        $current = $this->getFirst();
        if ($current === null) {
            return null;
        }

        while ($current->getNext() !== null) {
            $current = $current->getNext();
        }

        return $current;
    }

    public function removeFirst(): void
    {
        $first = $this->getFirst();
        if ($first === null) {
            return;
        }

        $next = $first->getNext();
        if ($next === null) {
            return;
        }

        $this->head = $next;
    }

    public function removeLast(): void
    {
        $current = $this->getFirst();
        if ($current === null) {
            return;
        }

        $beforeCurrent = $current;
        while ($current->getNext() !== null) {
            $beforeCurrent = $current;
            $current = $current->getNext();
        }

        $beforeCurrent->setNext(null);
    }

    public function removeAt(int $position)
    {
        if ($position <= 0) {
            throw new LogicException(sprintf('Position must be positive non-zero number. Got %s', $position));
        }

        if ($position === 1) {
            $this->removeFirst();
            return;
        }

        $nodeForRemoval = $this->getAt($position);
        if ($nodeForRemoval === null) {
            return;
        }

        $next = $nodeForRemoval->getNext();
        $this->getAt($position - 1)->setNext($next);
    }

    public function clear(): void
    {
        $this->head = null;
    }

    public function printAll(): void
    {
        $current = $this->getFirst();
        if ($current === null) {
            echo 'EMPTY';
            return;
        }

        echo 'HEAD -> ';

        do {
            echo $current->getValue();
            echo ' -> ';
            $current = $current->getNext();
        } while ($current !== null);

        echo 'END';
    }
}
