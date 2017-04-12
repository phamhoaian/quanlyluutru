<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DependenciesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function sumNumber($a, $b)
    {
        return $a + $b;
    }

    public function testAssert()
    {
    	$sampleArray = [
    		1 => 'Java',
    		2 => 'PHP',
    		3 => 'Python',
    		4 => 'C#',
    		5 => 'Ruby'
    	];

    	$emptyArray = [];

    	$this->assertEquals(5, $this->sumNumber(2, 3));
    	$this->assertCount(5, $sampleArray);
    	$this->assertNotEmpty($sampleArray);
    	$this->assertEmpty($emptyArray);
    	$this->assertArraySubset([1 => 'Java', 2 => 'PHP'], $sampleArray);
    	$this->assertArrayHasKey(3, $sampleArray);
    }
}
