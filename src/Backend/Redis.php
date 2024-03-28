<?php

namespace MonoRef\Backend;

use Redis AS RedisClient;

class Redis implements IStorage {
    public RedisClient $server;

    public function __construct(RedisClient|array $redis) {
        if ($redis instanceof RedisClient) {
            $this->server = $redis;
        } else {
            $this->server = new RedisClient($redis);
        }
    }

    public function increment(string $key, int $step = 1): int {
        return $this->server->incrBy($key, $step);
    }
}