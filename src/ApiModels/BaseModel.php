<?php

namespace Sashalenz\Zero\ApiModels;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Sashalenz\Zero\Exceptions\ZeroException;
use Sashalenz\Zero\Request;

abstract class BaseModel
{
    private bool $canBeCached = false;
    private int $cacheSeconds = -1;

    private ?array $params = [];
    private ?string $method = null;

    public function cache(int $seconds = -1) : self
    {
        $this->canBeCached = true;
        $this->cacheSeconds = $seconds;

        return $this;
    }

    protected function method(string $method) : self
    {
        $this->method = $method;

        return $this;
    }

    public function params(array $params): self
    {
        $this->params = array_merge($this->params, $params);

        return $this;
    }

    /**
     * @param array $rules
     * @return $this
     * @throws ZeroException
     */
    protected function validate(array $rules = []): self
    {
        $validator = Validator::make(
            $this->params,
            $rules
        );

        if ($validator->fails()) {
            throw new ZeroException('Validation exception ' . $validator->errors()->first());
        }

        return $this;
    }

    /**
     * @return Collection
     * @throws ZeroException
     */
    public function request() : Collection
    {
        if (is_null($this->method)) {
            throw new ZeroException('API Exception: Provide method first');
        }

        $request = new Request($this->method, $this->params);

        if ($this->canBeCached) {
            return $request->cache($this->cacheSeconds);
        }

        return $request->make();
    }
}
