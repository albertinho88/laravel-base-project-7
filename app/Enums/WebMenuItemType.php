<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class WebMenuItemType extends Enum
{
    const PAGE =   'PAGE';
    const PRODUCT_CATEGORY =   'PRODUCT_CATEGORY';
    const PRODUCT = 'PRODUCT';
}
