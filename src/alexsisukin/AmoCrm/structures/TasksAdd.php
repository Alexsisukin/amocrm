<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 19.02.18
 * Time: 13:30
 */

namespace alexsisukin\AmoCrm\structures;

class TasksAdd extends Structure
{
    public function __construct($text)
    {
        $this->text = $text;
        $this->created_at = time();
    }


}