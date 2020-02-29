<?php

namespace Tenancy\Tests\Hooks\Database\Unit;

use Tenancy\Hooks\Database\Hooks\DatabaseMutation;
use Tenancy\Identification\Events\Switched;
use Tenancy\Tenant\Events as Tenant;
use Tenancy\Testing\TestCase;

class DatabaseMutationTest extends TestCase
{
    protected function afterSetUp()
    {
        $this->hook = $this->app->make(DatabaseMutation::class);
    }

    /** @test */
    public function it_is_not_fired_for_switched()
    {
        $this->hook->for(new Switched($this->mockTenant()));

        $this->assertFalse(
            $this->hook->fires()
        );
    }

    /** @test */
    public function it_is_fired_for_created()
    {
        $this->hook->for(new Tenant\Created($this->mockTenant()));

        $this->assertTrue(
            $this->hook->fires()
        );
    }

    /** @test */
    public function it_is_fired_for_updated()
    {
        $this->hook->for(new Tenant\Updated($this->mockTenant()));

        $this->assertTrue(
            $this->hook->fires()
        );
    }

    /** @test */
    public function it_is_fired_for_deleted()
    {
        $this->hook->for(new Tenant\Deleted($this->mockTenant()));

        $this->assertTrue(
            $this->hook->fires()
        );
    }
}
