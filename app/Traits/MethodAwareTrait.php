<?php

namespace App\Traits;

trait MethodAwareTrait
{
    public function __call($name, $arguments)
    {
        if (\method_exists($this, $name)) {
            return $this->$name(...$arguments);
        }

        $trace = debug_backtrace();
        $fileName = $trace[0]['file'] ?? __FILE__;
        $line = $trace[0]['line'] ?? __LINE__;
        trigger_error(\sprintf(
            'Attempted to call an undefined method named "%s" of class "%s" in %s on line %d',
            $name,
            \get_class($this),
            $fileName,
            $line
        ));

        return null;
    }
}
