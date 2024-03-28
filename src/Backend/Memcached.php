<?php

namespace MonoRef\Backend;

use Memcached AS MemcachedClient;

class Memcached implements IStorage {
    public MemcachedClient $server;

    public function __construct(MemcachedClient|array $memcached) {
        if ($memcached instanceof MemcachedClient) {
            $this->server = $memcached;
        } else {
            $this->server = new MemcachedClient();
            $this->server->setOption(MemcachedClient::OPT_BINARY_PROTOCOL, true);
            $this->server->addServer($memcached['host'], $memcached['port']);
        }
    }

    public function increment(string $key, int $step = 1): int {
        return $this->server->increment($key, $step, 0);
    }
}