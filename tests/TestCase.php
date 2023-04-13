<?php

namespace Tests;

use Illuminate\Foundation\Testing\{DatabaseTransactions, TestCase as BaseTestCase};
use Illuminate\Support\Facades\Http;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();

        Http::preventStrayRequests();
    }
}
