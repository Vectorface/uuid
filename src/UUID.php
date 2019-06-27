<?php

namespace Vectorface\UUID;

class UUID
{
    /**
     * Generate a random universally unique identifier; a UUIDv4
     *
     * @return string A UUID, This should look something like c2b134ae-04a4-4e82-89e0-51cbe9639dfb
     */
    public static function v4()
    {
        $uuidStr = random_bytes(16); // 128 bits
        $uuidStr[6] = chr(0x40 | (ord($uuidStr[6]) & 0x0f)); // Set the high nibble of the 7th byte to 4
        $uuidStr[8] = chr(0x80 | (ord($uuidStr[8]) & 0x3f)); // Set highest two bits of the 9th byte to 0b10
        $uuidStr = bin2hex($uuidStr);

        return sprintf("%s%s-%s-%s-%s-%s%s%s", ...str_split($uuidStr, 4));
    }
}

