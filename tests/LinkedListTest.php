<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class LinkedListTest extends TestCase
{
    public function testEmpty(): void
    {
        $list = new LinkedList();
        $this->assertNull($list->getFirst());
        $this->assertNull($list->getLast());
    }

    public function testInserts(): void
    {
        $list = new LinkedList();
        $list->insertAtStart(2);
        $list->insertAtStart(3);
        $list->insertAtEnd(5);
        $list->insertAt(10, 2);

        $this->assertEquals(3, $list->getFirst()->getValue());
        $this->assertEquals(5, $list->getLast()->getValue());
        $this->assertEquals(10, $list->getAt(2)->getValue());
        $this->assertEquals(2, $list->getAt(3)->getValue());
    }

    public function testRemove(): void
    {
        $list = new LinkedList();
        $list->insertAtEnd(5);
        $list->insertAtEnd(55);
        $list->insertAtEnd(555);
        $list->insertAtEnd(5555);
        $list->insertAtEnd(55555);

        $this->assertEquals(5, $list->getFirst()->getValue());
        $list->removeFirst();
        $this->assertEquals(55, $list->getFirst()->getValue());

        $this->assertEquals(55555, $list->getLast()->getValue());
        $list->removeLast();
        $this->assertEquals(5555, $list->getLast()->getValue());

        $this->assertEquals(555, $list->getAt(2)->getValue());
        $list->removeAt(2);
        $this->assertEquals(5555, $list->getAt(2)->getValue());
    }
}
