<?php

namespace Sashalenz\Zero;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Sashalenz\Zero\Exceptions\ZeroException;

final class Request
{
    private const TIMEOUT = 3;
    private const RETRY_TIMES = 3;
    private const RETRY_SLEEP = 100;

    private string $url;
    private string $token;
    private string $method;
    private ?array $params = [];

    public function __construct(string $method, ?array $params = [])
    {
        $this->method = $method;
        $this->params = $params;

        $this->url = Config::get('a20-zero-api.url');
        $this->token = Config::get('a20-zero-api.token');
    }

    /**
     * @return Collection
     * @throws ZeroException
     */
    public function make(): Collection
    {
        try {
            return Http::timeout(self::TIMEOUT)
                ->retry(
                    self::RETRY_TIMES,
                    self::RETRY_SLEEP
                )
                ->baseUrl($this->url)
                ->asJson()
                ->withHeaders([
                    'Authorization: Bearer ' . $this->token,
                ])
                ->get(
                    $this->method
                )
                ->throw()
                ->collect('data');
        } catch (RequestException $e) {
            throw new ZeroException('API Exception: ' . $e->getMessage());
        }
    }

    public function cache(int $seconds = -1): Collection
    {
        if ($seconds === -1) {
            return Cache::rememberForever($this->getCacheKey(), fn () => $this->make());
        }

        return Cache::remember($this->getCacheKey(), $seconds, fn () => $this->make());
    }

    private function getCacheKey(): string
    {
        return  collect($this->params)
            ->put('method', $this->method)
            ->filter()
            ->values()
            ->implode('_');
    }
}
