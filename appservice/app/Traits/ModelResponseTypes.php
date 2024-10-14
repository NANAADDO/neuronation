<?php

namespace App\Traits;

use App\constant\CrudMessages;

trait ModelResponseTypes
{
    const MESSAGE = "message";

    public function deleteSuccess(array $data, $message = "")
    {
        return $this->success($data);
    }

    public function success(array $data): array
    {
        return [ "status" => true, "data" => $data ];
    }

    public function deleteFailed(string $message = "")
    {
        $msg = CrudMessages::FAILED_DELETE . $message;
        return $this->error($msg);
    }

    public function error(string $message): array
    {
        return [ "status" => false, self::MESSAGE => $message ];
    }

    public function createSuccess(array $data, string $message = "")
    {
        return $this->success($data);
    }

    public function createFailed(string $message = "")
    {
        $msg = CrudMessages::FAILED_CREATE . $message;
        return $this->error($msg);
    }

    public function UpdateSuccess(array $data, string $message = "")
    {
        return $this->success($data);
    }

    public function UpdateFailed(string $message = "")
    {
        $msg = CrudMessages::FAILED_UPDATE . $message;
        return $this->error($msg);
    }

    public function FetchSuccess($data, string $message = "")
    {
        return $this->success($data);
    }

    public function FetchFailed(string $message = "")
    {
        $msg = CrudMessages::FAILED_SHOW . $message;
        return $this->error($msg);
    }


}
