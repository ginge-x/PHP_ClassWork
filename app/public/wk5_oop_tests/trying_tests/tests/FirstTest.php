<?php

class FirstTest extends PHPUnit\Framework\TestCase
{
    function testConfirmAssertTrueSpotsFalse()
    {
        $this->assertTrue(false);
    }
    function testConfirmAssertTrueSeesTrueWhenSetCorrectly()
    {
        $this->assertTrue(true);
    }
}