<?php

class Node
{
    public $value;
    public $left;
    public $right;

    public function __construct($value)
    {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}

class ExpressionTree
{
    private $expression;
    private $root;

    public function __construct($expression)
    {
        $this->expression = $expression;
        $this->root = null;
    }

    public function build()
    {
        $operators = ['+' => 1, '-' => 1, '*' => 2, '/' => 2, '^' => 3];
        $stack = [];
        $postfix = [];
        $tokens = explode(' ', $this->expression);
        foreach ($tokens as $token) {
            if (is_numeric($token)) {
                $postfix[] = $token;
            } elseif (array_key_exists($token, $operators)) {
                while (!empty($stack) && end($stack) != '(' && $operators[$token] <= $operators[end($stack)]) {
                    $postfix[] = array_pop($stack);
                }
                $stack[] = $token;
            } elseif ($token == '(') {
                $stack[] = $token;
            } elseif ($token == ')') {
                while (!empty($stack) && end($stack) != '(') {
                    $postfix[] = array_pop($stack);
                }
                array_pop($stack);
            }
        }
        while (!empty($stack)) {
            $postfix[] = array_pop($stack);
        }
        $stack = [];
        foreach ($postfix as $token) {
            if (is_numeric($token)) {
                $stack[] = new Node($token);
            } else {
                $node = new Node($token);
                $node->right = array_pop($stack);
                $node->left = array_pop($stack);
                $stack[] = $node;
            }
        }
        $this->root = $stack[0];
    }

    public function traversePreOrder($node = null)
    {
        if (!$node) {
            $node = $this->root;
        }
        echo $node->value . ' ';
        if ($node->left) {
            $this->traversePreOrder($node->left);
        }
        if ($node->right) {
            $this->traversePreOrder($node->right);
        }
    }
}
