<?php

namespace MonoRef\Backend;

Interface IStorage {
    public function increment (string $key, int $step = 1): int;
}