<?php
/*
 * Copyright (c) Nate Brunette.
 * Distributed under the MIT License (http://opensource.org/licenses/MIT)
 */

namespace Tebru\Collection;

use ArrayIterator;
use Traversable;

/**
 * Class ArraySet
 *
 * @author Nate Brunette <n@tebru.net>
 */
class ArraySet extends AbstractSet
{
    /**
     * The set elements
     *
     * @var array
     */
    private $elements = [];

    /**
     * Constructor
     *
     * @param array $elements
     */
    public function __construct(array $elements = [])
    {
        $this->addAllArray($elements);
    }

    /**
     * Ensure the element exists in the collection
     *
     * Returns true if the collection can contain duplicates,
     * and false if it cannot.
     *
     * @param mixed $element
     * @return bool
     */
    public function add($element): bool
    {
        if ($this->contains($element)) {
            return false;
        }

        $this->elements[] = $element;

        return true;
    }

    /**
     * Removes all elements from a collection
     *
     * @return void
     */
    public function clear()
    {
        $this->elements = [];
    }

    /**
     * Removes object if it exists
     *
     * Returns true if the element was removed
     *
     * @param mixed $element
     * @return bool
     */
    public function remove($element): bool
    {
        if (!$this->contains($element)) {
            return false;
        }

        unset($this->elements[array_search($element, $this->elements, true)]);

        return true;
    }

    /**
     * Returns an array of all elements in the collection
     *
     * @return array
     */
    public function toArray(): array
    {
        return array_values($this->elements);
    }

    /**
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        return new ArrayIterator($this->toArray());
    }
}
