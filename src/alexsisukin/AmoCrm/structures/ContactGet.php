<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 20.02.18
 * Time: 16:53
 */

namespace alexsisukin\AmoCrm\structures;


class ContactGet extends Structure
{

    public function setLimitRows($limit_rows)
    {
        return parent::setLimitRows($limit_rows);
    }

    public function setLimitOffset($limit_offset)
    {
        return parent::setLimitOffset($limit_offset);
    }

    public function setResponsibleUserId($responsible_user_id)
    {
        return parent::setResponsibleUserId($responsible_user_id);
    }

    public function setQuery($query)
    {
        return parent::setQuery($query);
    }
}