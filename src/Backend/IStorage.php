<?php

namespace MonoRef\Backend;

Interface IStorage {
    public function increment (string $key, int $step = 1): int;
    public function get (string $key): int;
}