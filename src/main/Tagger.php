<?php

namespace SIKessEm;

class Tagger {

    public function __construct(array $tags = []) {
        $this->setTags($tags);
    }

    /**
     * @var array The tags to be used for tagging
     */
    protected $tags = [];

    /**
     * Set tags list
     * 
     * @param array $tags
     */
    public function setTags(array $tags): void {
        foreach ($tags as $tag => $items) {
            $this->setTag($tag, $items);
        }
    }

    /**
     * Get tags list
     * 
     * @return array
     */
    public function getTags(): array {
        return $this->tags;
    }

    /**
     * Set a tag
     * 
     * @param string $tag
     * @param mixed  $value
     */
    public function setTag(int|string $tag, array $items): void {
        $this->tags[$tag] = new Items($items);
    }

    /**
     * Get a tag
     * 
     * @param  string $tag
     * @return mixed
     */

    public function getTag(int|string $tag): mixed {
        return $this->tags[$tag];
    }

    /**
     * Remove a tag
     * 
     * @param string $tag
     */
    public function removeTag(int|string $tag): void {
        unset($this->tags[$tag]);
    }

    /**
     * Check if a tag exists
     * 
     * @param  string $tag
     * @return bool
     */
    public function hasTag(int|string $tag): bool {
        return isset($this->tags[$tag]);
    }

    /**
     * Get an item from a tag to an other tag
     * 
     * @param  mixed      $item
     * @param  int|string $from
     * @param  int|string $to
     * @return mixed
     */
    public function getValue(mixed $item, int|string $from, null|int|string $to = null): mixed {
        if ($this->hasTag($from)) {
            $tag = $this->getTag($from);
            if ($to === null) {
                return $tag->getValue($item);
            } else {
                $key = $tag->getKey($item);
                if (is_int($key) || is_string($key)) {
                    if ($this->hasTag($to)) {
                        $tag = $this->getTag($to);
                        return $tag->getValue($key);
                    }
                }
            }
        }
        return null;
    }
}