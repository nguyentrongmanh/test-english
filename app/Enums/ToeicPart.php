<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ToeicPart extends Enum
{
    const PART_ONE = 1;
    const PART_TWO = 2;
    const PART_THREE = 3;
    const PART_FOUR = 4;
    const PART_FIVE = 5;
    const PART_SIX = 6;
    const PART_SEVEN = 7;
}
