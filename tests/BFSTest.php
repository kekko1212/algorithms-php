<?php

namespace Algorithms\Test;

use Algorithms\Graph;
use Algorithms\Node;
use PHPUnit\Framework\TestCase;

class BFSTest extends TestCase
{
    public function testNodesHavePathDFS()
    {
        $graph = new Graph();
        $graph->addNode(1, new Node(1, 'A'));
        $graph->addNode(2, new Node(2, 'S'));
        $graph->addNode(3, new Node(3, 'T'));
        $graph->addNode(4, new Node(4, 'C'));
        $graph->addNode(5, new Node(5, 'D'));
        $graph->addNode(6, new Node(6, 'E'));
        $graph->addNode(7, new Node(7, 'R'));
        $graph->addNode(8, new Node(8, 'P'));

        $graph->addEdge(1, 2);
        $graph->addEdge(2, 5);
        $graph->addEdge(2, 3);
        $graph->addEdge(5, 8);
        $graph->addEdge(4, 7);
        $graph->addEdge(6, 2);
        $graph->addEdge(7, 8);

        self::assertTrue($graph->hasPathDFS(2, 4));
    }

    public function testNodesHavePathBFS()
    {
        $graph = new Graph();
        $graph->addNode(1, new Node(1, 'A'));
        $graph->addNode(2, new Node(2, 'S'));
        $graph->addNode(3, new Node(3, 'T'));
        $graph->addNode(4, new Node(4, 'C'));
        $graph->addNode(5, new Node(5, 'D'));
        $graph->addNode(6, new Node(6, 'E'));
        $graph->addNode(7, new Node(7, 'R'));
        $graph->addNode(8, new Node(8, 'P'));

        $graph->addEdge(1, 2);
        $graph->addEdge(2, 5);
        $graph->addEdge(2, 3);
        $graph->addEdge(5, 8);
        $graph->addEdge(4, 7);
        $graph->addEdge(6, 2);
        $graph->addEdge(7, 8);

        self::assertTrue($graph->hasPathBFS(2, 4));
    }
}
