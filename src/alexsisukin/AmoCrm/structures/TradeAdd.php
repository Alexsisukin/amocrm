<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 19.02.18
 * Time: 5:31
 */

namespace alexsisukin\AmoCrm\structures;

class TradeAdd extends Structure
{

    public function __construct($name)
    {
        $this->name = $name;
        $this->created_at = time();
    }

}