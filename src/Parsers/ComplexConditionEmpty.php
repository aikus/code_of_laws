<?php
namespace RulesBook\Parsers;

use \Exception;

/**
 * Description of ComplexConditionEmpty
 *
 * @author aikus
 */
class ComplexConditionEmpty extends Exception
{
    public function __construct(string $complextTagName)
    {
        parent::__construct("The '$complextTagName' tag must have a child element");
    }
}
