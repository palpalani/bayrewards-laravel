<?php

use Palpalani\BayRewards\Tests\TestCase;

uses(TestCase::class)->in('Unit');

/*
 * Workaround for Pest/PHPUnit/Laravel compatibility issue with HandleExceptions.
 * This ensures the error handler is properly initialized before tests run.
 */
if (!function_exists('handlePestErrorHandler')) {
    function handlePestErrorHandler(): void
    {
        if (class_exists(\PHPUnit\Runner\ErrorHandler::class)) {
            try {
                @\PHPUnit\Runner\ErrorHandler::enable();
            } catch (\Throwable $e) {
                // Silently ignore if it fails
            }
        }
    }
}

handlePestErrorHandler();
