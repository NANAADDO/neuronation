<?php

namespace App\Traits;

use App\constant\StatusCodes;
use Illuminate\Http\JsonResponse;

trait ApiResTypes
{
    /**
     * Send response with specific status code
     * @param $data
     * @param $httpStatusCode
     * @return JsonResponse
     */
    public function customError($data, $httpStatusCode)
    {
        return response()->json([ "message" => $data, "Success" => false, "statuscode" => $httpStatusCode ], $httpStatusCode);
    }

    public function customSuccess($data, $httpStatusCode)
    {
        return response()->json([ $data, "Success" => true, "statuscode" => $httpStatusCode ], $httpStatusCode);
    }

    /**
     * 200: OK.
     * The standard success code and default option.
     *
     * @param $data
     * @return JsonResponse
     */
    public function Ok($data = [])
    {
        return $this->SuccessContent($data, StatusCodes::OK);
    }

    public function SuccessContent($data, $httpStatusCode): JsonResponse
    {
        return response()->json([ "data" => $data, "Success" => true, "statuscode" => $httpStatusCode ], $httpStatusCode);
    }

    public function customOk($data = [])
    {
        return $this->content($data, StatusCodes::OK);
    }

    public function content($data, $httpStatusCode): JsonResponse
    {
        return response()->json([ "history" => $data, "Success" => true, "statuscode" => $httpStatusCode ], $httpStatusCode);
    }

    /**
     * 201: Object created.
     * Useful for the store actions.
     *
     * @param $data
     * @return JsonResponse
     */
    public function ObjectCreated($data)
    {
        return $this->SuccessContent($data, StatusCodes::OBJECT_CREATED);
    }

    /**
     * 204: No content.
     * When an action was executed successfully, but there is no content to return.
     *
     * @return JsonResponse
     */
    public function NoContent()
    {
        return $this->FailedContent(null, StatusCodes::NO_CONTENT);
    }

    public function FailedContent($data, $httpStatusCode): JsonResponse
    {
        return response()->json([ "message" => $data, "Success" => false, "statuscode" => $httpStatusCode ], $httpStatusCode);
    }

    /**
     * 206: Partial content.
     * Useful when you have to return a paginated list of resources.
     *
     * @param $data
     * @return JsonResponse
     */
    public function PartialContent($data)
    {
        return $this->FailedContent($data, StatusCodes::PARTIAL_CONTENT);
    }

    /**
     * 400: Bad request.
     * The standard option for requests that fail to pass validation.
     *
     * @param $data
     * @return JsonResponse
     */
    public function BadRequest($data)
    {
        return $this->FailedContent($data, StatusCodes::BAD_REQUEST);
    }

    public function ValidationError($data)
    {

        return $this->FailedContent($data, StatusCodes::BAD_REQUEST);
    }

    /**
     * 401: Unauthorized.
     * The user needs to be authenticated.
     *
     * @return JsonResponse
     */
    public function Unauthorized($message = 'Unauthorized')
    {
        return $this->FailedContent($message, StatusCodes::UNAUTHORIZED);
    }

    /**
     * 403: Forbidden.
     * The user is authenticated, but does not have the permissions to perform an action.
     *
     * @return JsonResponse
     */
    public function Forbidden()
    {
        return $this->FailedContent("Forbidden", StatusCodes::FORBIDDEN);
    }

    /**
     * 404: Not found.
     * This will be returned automatically by SymFony when the resource is not found.
     *
     * @return JsonResponse
     */
    public function NotFound()
    {
        return $this->FailedContent("Resource not found", StatusCodes::NOT_FOUND);
    }

    /**
     * 500: Internal server error.
     * Ideally you're not going to be explicitly returning this, but if something unexpected breaks, this is what your user is going to receive.
     *
     * @return JsonResponse
     */
    public function InternalServerError($message = ' Internal server error')
    {
        return $this->FailedContent($message, StatusCodes::INTERNAL_SERVER_ERROR);
    }

    /**
     * 503: Service unavailable.
     * Pretty self explanatory, but also another code that is not going to be returned explicitly by the application.
     *
     * @return JsonResponse
     */
    public function ServiceUnavailable()
    {
        return $this->FailedContent("Service unavailable", StatusCodes::SERVICE_UNAVAILABLE);
    }


}
