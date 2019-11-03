<?php


namespace RulesBook\Providers;


class ArrayPath
{
    private $steps;

    public function __construct(string $path)
    {
        $this->steps = $this->parse($path);
    }

    public function getSteps(): array
    {
        return $this->steps;
    }

    private function parse(string $path) : array
    {
        $length = strlen($path);
        $result = [];
        $slashed = false;
        $piece = '';
        for($i = 0; $i < $length; $i++) {
            $char = $path[$i];
            if($slashed) {
                $piece .= $char;
                $slashed = false;
                continue;
            }
            if($char == '\\') {
                $slashed = true;
                continue;
            }
            if($char == '.') {
                $result[] = $piece;
                $piece = '';
                continue;
            }
            $piece .= $char;
        }
        $result[] = $piece;
        return $result;
    }
}