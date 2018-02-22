<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22.02.18
 * Time: 17:05
 */

namespace alexsisukin\AmoCrm\structures;

class ListCreate extends Structure
{
    public function __construct($name)
    {
        $this->name = $name;
    }
}