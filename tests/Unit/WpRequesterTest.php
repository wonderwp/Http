<?php

declare(strict_types=1);

namespace WonderWp\Component\Http\Tests\Unit;

use PHPUnit\Framework\TestCase;
use WonderWp\Component\Http\Request;
use WonderWp\Component\Http\WpRequester;

final class WpRequesterTest extends TestCase
{
    protected function tearDown(): void
    {
        unset($GLOBALS['wwp_test_http_error_message']);
    }

    public function testDoRequestMapsWpErrorTo500Response(): void
    {
        $GLOBALS['wwp_test_http_error_message'] = 'network down';
        $requester = new WpRequester();
        $response = $requester->doRequest(new Request('GET', 'https://example.test'));

        $this->assertSame(500, $response->getStatus());
        $this->assertSame('network down', $response->getMessage());
    }
}
