<?php

interface Command
{
    public function execute();
    public function undo();
}

class MicrosoftWord
{
    public function copy()
    {
        //реализация
    }

    public function replace()
    {
        //реализация
    }

    public function cut()
    {
        //реализация
    }

    public function insert()
    {
        //реализация
    }

    public function paste()
    {
        //реализация
    }

    public function delete()
    {
        //реализация
    }
}

class CopyCommand implements Command
{
    private $wordEditor;
    private $start;
    private $end;
    private $text;

    public function __construct(MicrosoftWord $wordEditor, $start, $end)
    {
        $this->wordEditor = $wordEditor;
        $this->start = $start;
        $this->end = $end;
    }

    public function execute()
    {
        $this->text = $this->wordEditor->copy($this->start, $this->end);
        $this->logAction("Copy from $this->start to $this->end: $this->text");
    }

    public function undo()
    {
        $this->wordEditor->replace($this->start, $this->end, $this->text);
        $this->logAction("Undo copy from $this->start to $this->end: $this->text");
    }

    private function logAction($action)
    {
        //логируем
    }
}

class CutCommand implements Command
{
    private $wordEditor;
    private $start;
    private $end;
    private $text;

    public function __construct(MicrosoftWord $wordEditor, $start, $end)
    {
        $this->wordEditor = $wordEditor;
        $this->start = $start;
        $this->end = $end;
    }

    public function execute()
    {
        $this->text = $this->wordEditor->cut($this->start, $this->end);
        $this->logAction("Cut from $this->start to $this->end: $this->text");
    }

    public function undo()
    {
        $this->wordEditor->insert($this->start, $this->text);
        $this->logAction("Undo cut from $this->start to $this->end: $this->text");
    }

    private function logAction($action)
    {
        //логируем
    }
}

class PasteCommand implements Command
{
    private $wordEditor;
    private $position;
    private $text;

    public function __construct(MicrosoftWord $wordEditor, $position)
    {
        $this->wordEditor = $wordEditor;
        $this->position = $position;
    }

    public function execute()
    {
        $this->text = $this->wordEditor->paste($this->position);
        $this->logAction("Paste at position $this->position: $this->text");
    }

    public function undo()
    {
        $this->wordEditor->delete($this->position, $this->position + strlen($this->text));
        $this->logAction("Undo paste at position $this->position: $this->text");
    }

    private function logAction($action)
    {
        //логируем
    }
}
