<?php declare(strict_types=1);
require __DIR__ . '/src/Node.php';
require __DIR__ . '/src/LinkedList.php';

$linkedList = new LinkedList();
$linkedList->insertAtStart(5);
$linkedList->insertAtStart(15);
$linkedList->insertAtStart(7);
$linkedList->insertAtEnd(300);

$linkedList->removeAt(3);

$linkedList->insertAt(222, 3);
$linkedList->removeLast();
$linkedList->printAll();

$linkedList->removeFirst();
$linkedList->printAll();
$linkedList->removeFirst();
$linkedList->printAll();

$linkedList->clear();
$linkedList->printAll();

