<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class QuotaPer extends Enum
{

    const Illimited = 0;
    const Day = 1;
    const Week = 7;
    const Month = 30;
    const twoMonths = 60;
    const threeMonths = 90;
    const fourMonths = 120;
    const fiveMonths = 150;
    const sixMonths = 180;
    const Year = 365;
    const twoYear = 740;
}