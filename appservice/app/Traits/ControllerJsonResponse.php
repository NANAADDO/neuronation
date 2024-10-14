<?php

namespace App\Traits;

use App\constant\CrudMessages;
use Illuminate\Http\JsonResponse;

trait ControllerJsonResponse
{
    use ApiResTypes;

    const STATUS = 'status';
    const DATA = 'data';
    const MESSAGE = 'message';

    public function onFetch(array $data): JsonResponse
    {
        if ($data[self::STATUS]) {
            return $this->OK($data[self::DATA]);
        }
        return $this->InternalServerError($data[self::MESSAGE]);

    }

    public function fetch(array $data): JsonResponse
    {
        if ($data[self::STATUS]) {
            return $this->customOk($data[self::DATA]);
        }
        return $this->InternalServerError($data[self::MESSAGE]);

    }

    public function onCreate(array $data): JsonResponse
    {
        if ($data[self::STATUS]) {
            return $this->OK($data[self::DATA]);
        }
        return $this->InternalServerError($data[self::MESSAGE]);

    }

    public function onUpdate(array $data, string $message = ""): JsonResponse
    {
        if ($data[self::STATUS]) {
            return $this->OK($data[self::DATA]);
        }
        return $this->InternalServerError($data[self::MESSAGE]);

    }

    public function onDelete(array $data): JsonResponse
    {
        if ($data[self::STATUS]) {
            return $this->OK($data[self::DATA]);
        }
        return $this->InternalServerError($data[self::MESSAGE]);
    }


}
