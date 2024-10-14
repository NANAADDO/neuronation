<?php

namespace App\Traits;

use App\constant\DataTypes;
use App\constant\StatusCodes;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

trait DataSerialization
{

    public $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;

    }

    public function SerializeJson($data)
    {

    }

    public function DeserializeJson($request)
    {
        $requestData = $request->getContent();
        return $this->serializer->deserialize($requestData, DataTypes::JSON);
    }


}
