<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 19.02.18
 * Time: 5:31
 */

namespace alexsisukin\AmoCrm\structures;

abstract class Structure
{


    public function save()
    {
        $res = [];
        foreach ((array)$this as $key => $value) {
            if (is_null($value)) {
                continue;
            }
            $res[$key] = $value;
        }
        return $res;
    }

}