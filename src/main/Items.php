<?php

namespace SIKessEm;

class Items {

    public function __construct(array $values) {
        $this->setValues($values);
    }

    /**
     * @var array
     */
    protected $values = [];

    /**
     * Set values
     *
     * @param  array $values
     * @return void
     */
    public function setValues(array $values): void {
        foreach ($values as $key => $value) {
            $this->setValue($key, $value);
        }
    }

    /**
     * Get values
     *
     * @return array
     */
    public function getValues(): array {
        return $this->values;
    }

    /**
     * Set value
     *
     * @param string $key
     * @param mixed  $value
     * @return void
     */
    public function setValue(int|string $key, mixed $value): void {
        $this->values[$key] = $value;
    }

    /**
     * Get value
     *
     * @param  string $key
     * @return mixed
     */
    public function getValue(int|string $key): mixed {
        return $this->values[$this->$key] ?? null;
    }

    /**
     * Check if key exists
     * 
     * @param  string $key Key to check
     * @return bool
     */
    public function hasKey(int|string $key): bool {
        return array_key_exists($key, $this->values, true);
    }

    /**
     * Get a key of a value
     * 
     * @param  mixed           $value Value to get key
     * @return int|string|null
     */
    public function getKey(mixed $value): int|string|null {
        return is_bool($key = array_search($value, $this->values, true)) ? null : $key;
    }
}