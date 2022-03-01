<?php

namespace FW\core\Type;

use IteratorAggregate;
use ArrayAccess;
use Countable;

class Dictionary implements IteratorAggregate, ArrayAccess, Countable
{
    private $container = array();
    private $server;
    private $request;

    public function __construct()
    {

    }

    /// IteratorAggregate
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this);
    }
    /// ArrayAccess
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    public function offsetGet($offset): mixed
    {
        return isset ($this->container[$offset]) ? $this->container[$offset] : null;
    }

    public function offsetSet( $offset, $value)
    {
        if (is_null($offset))
        {
            $this->container[] = $value;
        }
        else
        {
            $this->container[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /// Countable
    public function count(): int
    {
        return $this->myCount;
    }
}

?>
