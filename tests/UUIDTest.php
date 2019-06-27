<?php

namespace Vectorface\Tests\UUID;

use Vectorface\UUID\UUID;

class UUIDTest extends \PHPUnit\Framework\TestCase
{

    /**
     * Make sure a UUIDv4 resembles: XXXXXXXX-XXXX-4XXX-[8-B]XXX-XXXXXXXXXXXX
     *
     * @dataProvider tenTimes
     */
    public function testV4()
    {
        $v4 = UUID::v4();

        $this->assertEquals(36, strlen($v4));
        $this->assertEquals("", str_replace(
            str_split('-0123456789abcdef'),
            '',
            $v4
        ));

        $parts = explode('-', $v4);

        $this->assertCount(5, $parts);
        $this->assertEquals('4', $parts[2][0]);
        $this->assertTrue(in_array($parts[3][0], ['8', '9', 'a', 'b']));
        $this->assertEquals(
            [8, 4, 4, 4, 12],
            array_map('strlen', $parts)
        );
    }

    public function tenTimes()
    {
        return array_fill(0, 10, []);
    }
}
