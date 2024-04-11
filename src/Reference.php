<?php

namespace MonoRef;

use MonoRef\Backend\IStorage;

class Reference {
    public IStorage $storage;

    public function __construct(IStorage $storage) {
        $this->storage = $storage;
    }

    /** get next key */
    public function next(string $key, int $step = 1): int {
        return $this->storage->increment($key, $step);
    }

    /** get the current key */
    public function current (string $key): int {
        return $this->storage->get($key);
    }

    /** indicate what would be the next key */
    public function indicate(string $key, $step = 1): int {
        return $this->storage->get($key) + $step;
    }
}