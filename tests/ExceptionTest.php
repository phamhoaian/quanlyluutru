<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExceptionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function divide($a, $b)
    {
        if ($b == 0) {
        	throw new InvalidArgumentException("can not divide for zero", 1);
        }
        return $a / $b;
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testInvalidArgument()
    {
    	$this->divide(4, 0);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage can not divide for zero
     */
    public function testExceptionMessage()
    {
    	$this->divide(4, 0);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessageRegExp /can not \w+/
     */
    public function testSubstringOfExceptionMessage()
    {
    	$this->divide(4, 0);
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionCode 1
     */
    public function testExceptionCode()
    {
    	$this->divide(4, 0);
    }
}
