<?php

use NodejsPhpFallback\Less;

class LessTest extends PHPUnit_Framework_TestCase
{
    public function testCompile()
    {
        $parser = new Less(__DIR__ . '/test.less');
        $css = trim(str_replace("\r", '', $parser->compile()));
        $expected = trim(str_replace("\r", '', file_get_contents(__DIR__ . '/test.css')));

        $this->assertSame($expected, $css, 'Less should be rendered with node.');
    }

    public function testFallback()
    {
        $parser = new Less(__DIR__ . '/test.less');
        $css = trim(str_replace("\r", '', $parser->fallback()));
        $expected = trim(str_replace("\r", '', file_get_contents(__DIR__ . '/test.css')));

        $this->assertSame($expected, $css, 'Less should be rendered with node.');
    }
}
