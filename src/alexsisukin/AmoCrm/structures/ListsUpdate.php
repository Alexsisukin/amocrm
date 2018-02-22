<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22.02.18
 * Time: 15:51
 */

namespace alexsisukin\AmoCrm\structures;

class ListsUpdate extends Structure
{
    public function __construct($id)
    {
        $this->id = (int)$id;
    }
}