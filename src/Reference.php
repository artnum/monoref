<?php

namespace MonoRef;

use MonoRef\Backend\IStorage;

class Reference {
    public IStorage $storage;

    public function __construct(IStorage $storage) {
        $this->storage = $storage;
    }

    public function next(string $key, int $step = 1): int {
        return $this->storage->increment($key, $step);
    }
}