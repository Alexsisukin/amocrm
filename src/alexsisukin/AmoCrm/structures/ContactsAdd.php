<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 19.02.18
 * Time: 13:30
 */

namespace alexsisukin\AmoCrm\structures;

class ContactsAdd extends Structure
{
    public function __construct($name)
    {
        $this->name = $name;
        $this->created_at = time();
    }

    /**
     * @return mixed
     */
    public function getCustomFields()
    {
        return $this->custom_fields;
    }

    /**
     * @param mixed $custom_fields
     * @param mixed $server_fields
     */



}