<?php
namespace RulesBook\Conditions;

use \RulesBook\Providers\Provider;

/**
 * Description of NotCondition
 *
 * @author aikus
 */
class NotCondition implements Condition
{
    private $positiveCondition;
    
    public function __construct(Condition $positiveCondition)
    {
        $this->positiveCondition = $positiveCondition;
    }
    
    //put your code here
    public function test(Provider $data): bool
    {
        return !$this->positiveCondition->test($data);
    }

}
