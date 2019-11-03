<?php
namespace RulesBook;

use RulesBook\Conditions\Condition;
use RulesBook\Providers\Provider;
/**
 * @author aikus
 */
class Rule
{
    private $answerKey;
    private $condition;
    
    public function __construct(string $answerKey, Condition $condition)
    {
        $this->answerKey = $answerKey;
        $this->condition = $condition;
    }
    
    public function when(Provider $data): bool
    {
        return $this->condition->test($data);
    }
    
    public function getAnswerKey(): string
    {
        return $this->answerKey;
    }
}
