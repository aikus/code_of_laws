<?php
namespace RulesBook;
use RulesBook\Providers\Provider;

/**
 * Description of Book
 *
 * @author aikus
 */
class Book
{
    private $rules = [];

    public function addRule(Rule $rule): Book
    {
        $this->rules[] = $rule;
        return $this;
    }
    
    public function resolve(Provider $provider): ?string
    {
        /* @var $rule Rule */
        foreach($this->rules as $rule) {
            if($rule->when($provider)) {
                return $rule->getAnswerKey();
            }
        }
        return null;
    }
}
