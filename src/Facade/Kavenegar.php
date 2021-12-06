<?php

namespace EhsanMoradi\LaravelSms\Facade;

use Illuminate\Support\Facades\Facade;
use EhsanMoradi\LaravelSms\KavenegarSms;

/**
 * @method static send(string $message, string|array  $receptor, string $sender = null, $date = null, string $type = null, string $localId = null, bool $hide = false)
 * @method static lookUp(string|array $receptor, $template, $token, $token2 = null, $token3 = null, $type = 'sms')
 * @method static tts($message, string|array $receptor, $date = null, $localId = null, $repeat= null)
 * @method static sendArray(array $messages, array $receptors, array $senders, $date = null, $type = null, $localMessageIds = null, $hide = null)
 * @method static status(string|array $messageId)
 * @method static select(string|array $messageId)
 * @method static cancel(string|array $messageId)
 * @method static receive(string $lineNumber,int $isRead)
 * @method static selectOutbox($startDate, $endDate = null, $sender = null)
 * @method static latestOutBox($pageSize = null, $sender = null)
 * @method static countOutbox($startDate, $endDate = null, $status = null)
 * @method static countInbox($startDate, $endDate = null, string $lineNumber = null, int $isRead = null)
 * @method static statusByLocalid(string|array $localId)
 * @method static info()
 * @method static config()
 */
class Kavenegar extends Facade
{
    protected static function getFacadeAccessor()
    {
        return new KavenegarSms;
    }
}