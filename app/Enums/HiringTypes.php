<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class HiringTypes extends Enum
{
    const ESTAGIO =   0;
    const CLT =   1;
    const PJ = 2;
}
