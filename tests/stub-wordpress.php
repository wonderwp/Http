<?php

declare(strict_types=1);

class WP_Error
{
    public function __construct(
        private readonly string $code,
        private readonly string $message,
    ) {
    }

    public function get_error_message(): string
    {
        return $this->message;
    }
}

class WwpTestHttpHeaders
{
    public function __construct(private array $headers)
    {
    }

    public function getAll(): array
    {
        return $this->headers;
    }
}

class WP_Http
{
    public function request(string $url, array $args = [])
    {
        if (!empty($GLOBALS['wwp_test_http_error_message'])) {
            return new WP_Error('http_request_failed', (string) $GLOBALS['wwp_test_http_error_message']);
        }

        return [
            'response' => ['code' => 200, 'message' => 'OK'],
            'headers' => new WwpTestHttpHeaders([]),
            'body' => 'ok',
        ];
    }
}
