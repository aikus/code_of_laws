<?php
namespace RulesBook\Parsers;
use \Exception;
/**
 *
 *
 * @author aikus
 */
class EmptyRule extends Exception
{
    public function __construct()
    {
        parent::__construct("Rule must have one condition");
    }
}
