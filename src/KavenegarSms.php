<?php

namespace EhsanMoradi\LaravelSms;

use Illuminate\Support\Facades\Http;

class KavenegarSms
{
    protected $http;

    public function __construct()
    {
        $this->http = Http::baseUrl('https://api.kavenegar.com/v1/' . config('laravel-sms.kavenegar.api_key'));
    }

    public function send($message, $receptor, $sender = null, $date = null, $type = null, $localId = null, $hide = null)
    {
        if (is_array($receptor)) $receptor = implode(',', $receptor);

        $params = [
            'message'  => $message,
            'receptor' => $receptor,
            'sender'   => $sender,
            'date'     => $date,
            'localid'  => $localId,
            'type'     => $type,
            'hide'     => $hide
        ];

        return $this->http->get('/sms/send.json', $params);
    }

    public function sendArray(array $messages, array $receptors, array $senders, $date = null, $type = null, $localMessageIds = null, $hide = null)
    {
        $params = [
            'message'  => $messages,
            'receptor' => $receptors,
            'sender'   => $senders,
            'date'     => $date,
            'localmessageids'  => $localMessageIds,
            'type'     => $type,
            'hide'     => $hide
        ];

        return $this->http->post('/sms/sendarray.json', $params);
    }

    public function lookUp($receptor, $template, $token, $token2 = null, $token3 = null, $type = 'sms')
    {
        if (is_array($receptor)) $receptor = implode(',', $receptor);

        $params = [
            'receptor' => $receptor,
            'template' => $template,
            'token'    => $token,
            'token2'   => $token2,
            'token3'   => $token3,
            'type'     => $type,
        ];

        return $this->http->get('/verify/lookup.json', $params);
    }

    public function tts($message, $receptor, $date = null, $localId = null, $repeat = null)
    {
        if (is_array($receptor)) $receptor = implode(',', $receptor);

        $params = [
            'message'  => $message,
            'receptor' => $receptor,
            'date'     => $date,
            'localid'  => $localId,
            'repeat'   => $repeat,
        ];

        return $this->http->get('/call/maketts.json', $params);
    }

    public function select($messageId)
    {
        if (is_array($messageId)) $messageId = implode(',', $messageId);

        $params = [
            'messageid' => $messageId
        ];

        return $this->http->get('/sms/select.json', $params);
    }

    public function selectOutbox($startDate, $endDate = null, $sender = null)
    {
        $params = [
            'startdate' => $startDate,
            'enddate'   => $endDate,
            'sender'    => $sender
        ];

        return $this->http->get('/sms/selectoutbox.json', $params);
    }

    public function latestOutBox($pageSize = null, $sender = null)
    {
        $params = [
            'pagesize' => $pageSize,
            'sender'   => $sender
        ];

        return $this->http->get('/sms/latestoutbox.json', $params);
    }

    public function countOutbox($startDate, $endDate = null, $status = null)
    {
        $params = [
            'startdate' => $startDate,
            'enddate'   => $endDate,
            'status'    => $status
        ];

        return $this->http->get('/sms/countoutbox.json', $params);
    }

    public function countInbox($startDate, $endDate = null, string $lineNumber = null, int $isRead = null)
    {
        $params = [
            'startdate'  => $startDate,
            'enddate'    => $endDate,
            'linenumber' => $lineNumber,
            'isread'     => $isRead,
        ];

        return $this->http->get('/sms/countinbox.json', $params);
    }

    public function receive($lineNumber, $isRead)
    {
        $params = [
            'linenumber' => $lineNumber,
            'isread'     => $isRead,
        ];

        return $this->http->get('/sms/receive.json', $params);
    }

    public function cancel($messageId)
    {
        if (is_array($messageId)) $messageId = implode(',', $messageId);

        $params = [
            'messageid' => $messageId
        ];

        return $this->http->get('/sms/cancel.json', $params);
    }

    public function status($messageId)
    {
        if (is_array($messageId)) $messageId = implode(',', $messageId);

        $params = [
            'messageid' => $messageId
        ];

        return $this->http->get('/sms/status.json', $params);
    }

    public function statusByLocalid($localId)
    {
        if (is_array($localId)) $localId = implode(',', $localId);

        $params = [
            'localid' => $localId
        ];

        return $this->http->get('/sms/statuslocalmessageid.json', $params);
    }

    public function info()
    {
        return $this->http->get('/account/info.json');
    }

    public function config()
    {
        return $this->http->get('/account/config.json');
    }
}