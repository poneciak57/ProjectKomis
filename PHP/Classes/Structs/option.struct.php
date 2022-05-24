<?php

class Option
{

    public function __construct(
        private int $value,
        private string $name
    ) {
    }
    public function display(): string
    {
        return "<option value={$this->value} >{$this->name}</option>";
    }
    public function pack(array &$table) {
        $table[$this->value] = $this->name;
    }
}
