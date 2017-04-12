<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StackTest extends TestCase
{
	protected $stack;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function setUp()
    {
    	$this->stack = array();
    }

    public function testEmpty()
    {
    	$this->assertTrue(empty($this->stack));
    }

    public function testPush()
    {
    	array_push($this->stack, 'foo');
    	$this->assertEquals('foo', $this->stack[count($this->stack) - 1]);
    	$this->assertFalse(empty($this->stack));
    }

    public function testPop()
    {
    	array_push($this->stack, 'foo');
    	$this->assertEquals('foo', array_pop($this->stack));
    	$this->assertTrue(empty($this->stack));
    }
}
