<?php

namespace Algorithms;

class Graph
{
    /** @var array<int, Node> */
    private $nodes = [];

    public function addNode(int $id, Node $node): void
    {
        $this->nodes[$id] = $node;
    }

    public function getNode(int $id): Node
    {
        return $this->nodes[$id];
    }

    public function addEdge(int $start, int $end): void
    {
        $startNode = $this->getNode($start);
        $endNode = $this->getNode($end);
        $startNode->adjacent->push($endNode);
        $endNode->adjacent->push($startNode);
    }

    public function hasPathDFS(int $start, int $end): bool
    {
        $startNode = $this->getNode($start);
        $endNode = $this->getNode($end);
        $visited = [];

        return $this->internalHasPathDFS($startNode, $endNode, $visited);
    }

    private function internalHasPathDFS(Node $start, Node $end, array $visited): bool
    {
        if (in_array($start->id, $visited)) {
            return false;
        }

        $visited[] = $start->id;

        if ($start->value === $end->value) {
            return true;
        }

        foreach ($start->adjacent as $child) {
            if ($this->internalHasPathDFS($child, $end, $visited)) {
                return true;
            }
        }

        return false;
    }

    public function hasPathBFS(int $start, int $end): bool
    {
        return $this->internalHasPathBFS($this->getNode($start), $this->getNode($end));
    }

    private function internalHasPathBFS(Node $start, Node $end): bool
    {
        $nextToVisit = new \SplQueue();
        $nextToVisit->enqueue($start);
        $visited = [];

        while (!$nextToVisit->isEmpty()) {
            $current = $nextToVisit->dequeue();

            if (in_array($current->id, $visited)) {
                continue;
            }

            if ($current->value === $end->value) {
                return true;
            }

            $visited[] = $current->id;

            foreach ($current->adjacent as $currentAdjacent) {
                $nextToVisit->enqueue($currentAdjacent);
            }
        }

        return false;
    }
}

class Node
{
    /** @var int */
    public $id;

    /** @var array */
    public $adjacent;

    /** @var string */
    public $value;

    public function __construct(int $id, string $value)
    {
        $this->id = $id;
        $this->value = $value;
        $this->adjacent = new \SplDoublyLinkedList();
    }
}
