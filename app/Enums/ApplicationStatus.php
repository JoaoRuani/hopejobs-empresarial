<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ApplicationStatus extends Enum
{
    const FAVORITE = 0;
    const IGNORED = 1;
    const NONE = 2;
}
