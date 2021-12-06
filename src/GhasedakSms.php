<?php

namespace EhsanMoradi\LaravelSms;

use Illuminate\Support\Facades\Http;

class GhasedakSms
{
    protected $http;

    public function __construct()
    {
        $this->http = Http::baseUrl('https://api.ghasedak.me/v2/')
            ->asForm()
            ->withHeaders([
                'apikey' => config('laravel-sms.ghasedak.api_key'),
            ]);
    }

    public function simple(string $message, string $receptor, string $lineNumber = null, $sendDate = null, $checkId = null)
    {
        $params = [
            'message'    => $message,
            'receptor'   => $receptor,
            'linenumber' => $lineNumber,
            'senddate'   => $sendDate,
            'checkid'    => $checkId,
        ];

        return $this->http->post('sms/send/simple', $params);
    }

    public function bulk(array $message, array $receptor, array $lineNumber = null, array $sendDate = null, array $checkId = null)
    {
        $params = [
            'message'    => implode(',', $message),
            'receptor'   => implode(',', $receptor),
            'linenumber' => implode(',', $lineNumber),
            'senddate'   => implode(',', $sendDate),
            'checkid'    => implode(',', $checkId),
        ];

        return $this->http->post('sms/send/bulk', $params);
    }

    public function pair(string $message, array $receptors, string $lineNumber = null, array $sendDate = null, array $checkId = null)
    {
        $params = [
            'message'    => $message,
            'receptor'   => implode(',', $receptors),
            'linenumber' => $lineNumber,
            'senddate'   => $sendDate,
            'checkid'    => implode(',', $checkId),
        ];

        return $this->http->post('sms/send/pair', $params);
    }

    public function voice(string $message, $receptor, string $sendDate = null)
    {
        if (is_array($receptor)) $receptor = implode(',', $receptor);

        $params = [
            'message'  => $message,
            'receptor' => $receptor,
            'senddate' => $sendDate,
        ];

        return $this->http->post('voice/send/simple', $params);
    }

    public function verification(
        string $message,
               $receptor,
        int    $type,
        string $template,
        string $checkId = null,
        string $param1,
        string $param2 = null,
        string $param3 = null,
        string $param4 = null,
        string $param5 = null,
        string $param6 = null,
        string $param7 = null,
        string $param8 = null,
        string $param9 = null,
        string $param10 = null
    )
    {
        if (is_array($receptor)) $receptor = implode(',', $receptor);

        $params = [
            'message'  => $message,
            'receptor' => $receptor,
            'type'     => $type,
            'template' => $template,
            'param1'   => $param1,
            'param2'   => $param2,
            'param3'   => $param3,
            'param4'   => $param4,
            'param5'   => $param5,
            'param6'   => $param6,
            'param7'   => $param7,
            'param8'   => $param8,
            'param9'   => $param9,
            'param1'   => $param1,
            'checkid'  => $checkId,
        ];

        return $this->http->post('verification/send/simple', $params);
    }

    public function status($id, int $type)
    {
        if (is_array($id)) $id = implode(',', $id);

        $params = [
            'id'   => $id,
            'type' => $type,
        ];

        return $this->http->post('sms/status', $params);
    }

    public function accountInfo()
    {
        return $this->http->post('account/info');
    }
}