<?php

class DTO
{
    private $data = array();

    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
        return null;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }
}

$test = new DTO(
    array(
        'value' => 'key',
        'value2' => 'key2'
    )
);


$test->value2 = 'keyAASD2';

echo $test->value;
echo $test->value2;
