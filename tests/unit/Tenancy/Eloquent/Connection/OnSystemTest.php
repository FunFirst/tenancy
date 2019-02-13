<?php

/*
 * This file is part of the tenancy/tenancy package.
 *
 * (c) Daniël Klabbers <daniel@klabbers.email>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://laravel-tenancy.com
 * @see https://github.com/tenancy
 */

namespace Tenancy\Tests\Eloquent\Connection;

use Tenancy\Environment;
use Tenancy\Testing\Mocks\OnSystemModel;
use Tenancy\Testing\TestCase;

class OnSystemTest extends TestCase
{
    /**
     * @test
     */
    public function uses_system_connection()
    {
        $this->assertEquals(
            Environment::getDefaultSystemConnectionName(),
            (new OnSystemModel())->getConnectionName()
        );
    }
}