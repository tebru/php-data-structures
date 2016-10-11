<?php
/*
 * Copyright (c) Nate Brunette.
 * Distributed under the MIT License (http://opensource.org/licenses/MIT)
 */

namespace Tebru\DataStructure;

use Countable;
use IteratorAggregate;
use Traversable;

/**
 * Interface MapInterface
 *
 * Represents an object with keys and values.  Keys must be unique.
 *
 * @author Nate Brunette <n@tebru.net>
 */
interface MapInterface extends IteratorAggregate, Countable
{
    /**
     * Removes all mappings from map
     *
     * @return void
     */
    public function clear();

    /**
     * Returns true if the key exists in the map
     *
     * @param string $key
     * @return bool
     */
    public function containsKey(string $key): bool;

    /**
     * Returns true if the value exists in the map
     *
     * By default this method will use strict comparison checking, passing false
     * in will use a double equals (==) instead.
     *
     * @param mixed $value
     * @param bool $strict
     * @return bool
     */
    public function containsValue($value, bool $strict = true): bool;

    /**
     * Return a set representation of map
     *
     * If a set is passed in, that set will be populated, otherwise
     * a default set will be used.
     *
     * @param SetInterface $set
     * @return SetInterface
     */
    public function entrySet(SetInterface $set = null): SetInterface;

    /**
     * Get the value at the specified key
     *
     * @param string $key
     * @return mixed
     */
    public function get(string $key);

    /**
     * Returns true if the map is empty
     *
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     * Returns a set of they keys in the map
     *
     * If a set is passed in, that set will be populated, otherwise
     * a default set will be used.
     *
     * @param SetInterface $set
     * @return SetInterface
     */
    public function keySet(SetInterface $set = null): SetInterface;

    /**
     * Returns the previous value or null if there was no value
     *
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    public function put(string $key, $value);

    /**
     * Adds all the mappings from specified map to this map
     *
     * @param MapInterface $map
     * @return void
     */
    public function putAll(MapInterface $map);

    /**
     * Returns the values as a collection
     *
     * If a collection is passed in, that collection will be populated, otherwise
     * a default collection will be used.
     *
     * @param CollectionInterface $collection
     * @return CollectionInterface
     */
    public function values(CollectionInterface $collection = null): CollectionInterface;

    /**
     * Retrieve an external iterator
     *
     * @return Traversable
     */
    public function getIterator(): Traversable;

    /**
     * Returns the number of mappings in the map
     *
     * @return int
     */
    public function count(): int;
}
