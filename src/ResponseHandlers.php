<?php

namespace FsiEngine;

class ResponseHandlers
{


    /**
     * @param null $message
     * @param array $data
     * @param null $request
     * @param bool $status
     * @param int $statusCode
     * @return false|string
     */
    static function validResponse($message = null, $data = [],  $request = null, $status = true, $statusCode = 200)
    {
        $body = [
            'message' => $message,
            'body' => $data,
            'status' => $status,
            'status_code' => $statusCode,
        ];

        return json_encode($body);
    }


    /**
     * @param null $message
     * @param null $status_code
     * @param null $request
     * @param \Exception|null $trace
     * @return false|string
     */
    static function errorResponse($message = null, $status_code = null,  $request = null, \Exception $trace = null)
    {
        $code = ($status_code != null) ? $status_code : "404";
        $body = [
            'message' => $message,
            'code' => $code,
            'status_code' => $code,
            'status' => false
        ];

        if (!is_null($request)) {
            if (!is_null($trace)) {
                $body['trace_message'] = $trace->getMessage();
//                $body['trace_debug'] = $trace->getTraceAsString();
            }
        }

        return json_encode($body);


    }

}