<?php

namespace Controller;


class ProfilerExample
{
    const RECURSION_MAX_LEVEL = 490;
    private $xhprof_href = '';

    public function __construct(string $xhprof_href = '')
    {
        $this->xhprof_href = $xhprof_href;
    }


    private function someLongLogic() : void
    {
        sleep(3);
    }

    public function longMethodExample() : string
    {
        $this->someLongLogic();
        return "Example with long time method " . $this->xhprof_href;
    }

    private function recursion(int $level = 0) : void
    {
        if ($level < static::RECURSION_MAX_LEVEL) {
            usleep(5);
            $this->recursion($level + 1);
        }
    }

    public function recursiveMethodExample() : string
    {
        $this->recursion();
        return "Recursive method " . $this->xhprof_href;
    }

    private function recursionA(int $level = 0) : void
    {
        if ($level < static::RECURSION_MAX_LEVEL) {
            usleep(5);
            $this->recursionB($level + 1);
        }
    }

    private function recursionB(int $level = 0) : void
    {
        if ($level < static::RECURSION_MAX_LEVEL) {
            usleep(5);
            $this->recursionA($level + 1);
        }
    }

    public function indirectRecursionMethod() : string
    {
        $this->recursionA();
        return "Indirect recursion " . $this->xhprof_href;
    }

}