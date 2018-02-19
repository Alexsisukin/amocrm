<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 16.02.18
 * Time: 18:52
 */
namespace alexsisukin\AmoCrm;

abstract class Essential
{
    /** @var Core  */
    protected $core;

    public function __construct(Core $core)
    {
        $this->core = $core;
    }
}