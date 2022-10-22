<?php

namespace Top\Response;

class Response
{
    public const HTTP_NOT_FOUND = 404;

    public static function withStatusCode(int $statusCode)
    {
        http_response_code($statusCode);
    }
}