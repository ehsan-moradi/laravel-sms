<?php

namespace EhsanMoradi\LaravelSms\Facade;

use Illuminate\Support\Facades\Facade;
use EhsanMoradi\LaravelSms\GhasedakSms;

/**
 * @method static simple(string $message, string $receptor, string $lineNumber = null, $sendDate = null, $checkId = null)
 * @method static accountInfo()
 * @method static status(string|array $id, int $type)
 * @method static voice(string $message, string|array $receptor, string $sendDate = null)
 * @method static pair(string $message, array $receptors, string $lineNumber = null, array $sendDate = null, array $checkId = null)
 * @method static bulk(array $messages, array $receptors, array $lineNumbers = null, array $sendDates = null, array $checkIds = null)
 * @method static verification(string $message, $receptor, int $type, string $template, string $checkId = null, string $param1, string $param2 = null, string $param3 = null, string $param4 = null, string $param5 = null, string $param6 = null, string $param7 = null, string $param8 = null, string $param9 = null, string $param10 = null)
 **/
class Ghasedak extends Facade
{
    protected static function getFacadeAccessor()
    {
        return new GhasedakSms();
    }
}