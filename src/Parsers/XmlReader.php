<?php

namespace RulesBook\Parsers;

use \RulesBook\Book;
use \DOMDocument;
use \ReflectionException;

/**
 * Description of XmlReader
 *
 * @author aikus
 */
class XmlReader
{

    /**
     * @var DOMDocument
     */
    private $document;

    public function load(string $file): self
    {
        $this->document = new DOMDocument();
        $this->document->load($file);
        return $this;
    }

    /**
     * @return Book
     * @throws ConditionNotFound
     * @throws EmptyRule
     * @throws ReflectionException
     */
    public function getBook(): Book
    {
        $book = new Book();
        foreach ($this->getRules() as $rule) {
            $book->addRule($rule);
        }
        return $book;
    }

    /**
     * @return array
     * @throws ConditionNotFound
     * @throws EmptyRule
     * @throws ReflectionException
     */
    private function getRules(): array
    {
        $result = [];
        $parser = new RuleParser(new XmlConditionFactory);
        foreach ($this->document->documentElement->childNodes as $rule) {
            if ($rule->nodeType != XML_ELEMENT_NODE) {
                continue;
            }
            $result[] = $parser->parse($rule);
        }
        return $result;
    }
}
