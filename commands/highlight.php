<?php
use League\CLImate\TerminalObject\Basic\BasicTerminalObject;

class Highlight extends BasicTerminalObject
{
    protected $text;

    protected $search;

    public function __construct($text, $search)
    {
        $this->text   = $text;
        $this->search = $search;
    }

    public function result()
    {
        $replace = "<background-yellow>{$this->search}</background-yellow>";

        return str_replace($this->search, $replace, $this->text);
    }
}
