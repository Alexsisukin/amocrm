<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 20.02.18
 * Time: 17:25
 */

namespace alexsisukin\AmoCrm\structures;

class ContactUpdate extends Structure
{


    public function __construct($id)
    {
        $this->updated_at = time();
        $this->setId($id);
    }

}