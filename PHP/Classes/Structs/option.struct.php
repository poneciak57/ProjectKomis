<?php

class Option
{

    public function __construct(
        private int $value,
        private string $name
    ) {
    }
    public function display($selected): string
    {
        return $this->value == $selected ? "<option value={$this->value} selected>{$this->name}</option>" :"<option value={$this->value} >{$this->name}</option>";                                 
        return "<option value={$this->value} >{$this->name}</option>";
    }
    public function pack(array &$table) {
        $table[$this->value] = $this->name;
    }
}
