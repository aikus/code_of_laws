<?php
namespace RulesBook\Parsers;
use \Exception;

/**
 * Description of ConditionNotFound
 *
 * @author aikus
 */
class ConditionNotFound extends Exception
{
    public function __construct(string $conditionKey)
    {
        parent::__construct("Not found condition for '$conditionKey' element");
    }
}
