<?php

namespace HarmSmits\SendCloudClient\Models;

use HarmSmits\SendCloudClient\Exception\InvalidArgumentException ;

/**
 * Class AModel
 *
 * @package HarmSmits\SendCloudClient\Models
 */
abstract class AModel implements IModel
{
    /**
     * Map all items to a two dimensional array
     *
     * @param array $array
     *
     * @return array[]
     */
    protected function _convertPureArray(array $array) {
        return array_map(function (AModel $item) {
            return $item->__toArray();
        }, $array);
    }

    /**
     * Check if array is pure of type $type
     *
     * @param array  $array
     * @param string $type
     */
    protected function _checkIfPureArray(array $array, string $type): void {
        array_walk($array, function ($item) use ($type) {
            if (!is_a($item, $type)) {
                throw new InvalidArgumentException(sprintf("Unexpected class %s", get_class($item)));
            }
        });
    }

    /**
     * Check if an integer is in the correct range
     *
     * @param int $check
     * @param int $min
     * @param int $max
     *
     * @throws InvalidArgumentException
     */
    protected function _checkIntegerBounds(int $check, int $min, int $max) {
        if ($check < $min || $check > $max)
            throw new InvalidArgumentException("Integer is not in correct range");
    }

    /**
     * Check if a float is in the correct range
     *
     * @param float $check
     * @param float $min
     * @param float $max
     *
     * @throws \HarmSmits\SendCloudClient\Exception\InvalidArgumentException
     */
    protected function _checkFloatBounds(float $check, float $min, float $max) {
        if ($check < $min || $check > $max)
            throw new InvalidArgumentException("Float is not in correct range");
    }

    /**
     * Apply default value
     *
     * @param int|null $int
     * @param int      $default
     *
     * @return int
     */
    protected function _checkIntegerDefault(?int $int, int $default) {
        return is_null($int) ? $default : $int;
    }

    /**
     * Check if an array is of the correct size
     *
     * @param array $array
     * @param int   $min
     * @param int   $max
     *
     * @throws InvalidArgumentException
     */
    protected function _checkArrayBounds(array $array, int $min, int $max) {
        $this->_checkIntegerBounds(count($array), $min, $max);
    }

    /**
     * Check if an enum is valid
     *
     * @param string $enum
     * @param array  $enums
     */
    protected function _checkEnumBounds(string $enum, array $enums) {
        if (!in_array($enum, $enums))
            throw new \InvalidArgumentException("Unknown enum");
    }

    /**
     * Verify integer format
     *
     * @param int    $integer
     * @param string $format
     */
    protected function _checkIntegerFormat(int $integer, string $format) {

    }
}