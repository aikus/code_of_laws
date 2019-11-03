<?php
namespace RulesBook\Conditions;

use \RulesBook\Providers\Provider;

/**
 * Description of OrCondition
 *
 * @author aikus
 */
class OrCondition implements Condition
{
    /**
     *
     * @var array
     */
    private $childConditions;

    public function __construct(array $childConditions)
    {
        $this->childConditions = $childConditions;
    }
    //put your code here
    public function test(Provider $data): bool
    {
        foreach ($this->childConditions as $condition) {
            if($condition->test($data)) {
                return true;
            }
        }
        return false;
    }

}
