<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 19.02.18
 * Time: 13:30
 */

namespace alexsisukin\AmoCrm\structures;

class CompanyAdd extends Structure
{
    public function __construct($name)
    {
        $this->name = $name;
        $this->created_at = time();
    }


}