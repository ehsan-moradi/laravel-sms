# Requirements

- laravel >= 7

# Installation

    composer require ehsanmoradi/laravel-sms  

Publish the configuration file (this will create a `laravel-sms.php` file inside the `config/` directory):

    php artisan vendor:publish --tag=laravel-sms-config

variety of methods that may be used to inspect the response:

    $response->body() : string;
    $response->json() :array|mixed;
    $response->object() : object;
    $response->collect() : Illuminate\Support\Collection;
    $response->status() : int;
    $response->successful() : bool;
    $response->failed() : bool;
    $response->header($header) : string;
    $response->headers() : array;

# kavenegar

`.env` file.

    KAVENEGAR_API_KEY=api_key

### simple

    use EhsanMoradi\LaravelSms\Facade\Kavenegar;

    Kavenegar::send($message, $receptor, $sender, $date, $type, $localId, $hide);
    
    // example

    $response = Kavenegar::send('test message', '09010000000');
    or
    $response = Kavenegar::send('test message', ['09010000000', '09010000000']);
    
    $response->object();

### lookup

    use EhsanMoradi\LaravelSms\Facade\Kavenegar;

    Kavenegar::lookUp($receptor, $template, $token, $token2, $token3, $type);
    
    // example

    $response = Kavenegar::lookUp('09010000000', 'test-template', $token);
    or
    $response = Kavenegar::lookUp(['09010000000', '09010000000'], 'test-template', $token);

### tts

    use EhsanMoradi\LaravelSms\Facade\Kavenegar;

    $response = Kavenegar::tts($message, $receptor, $date, $localId, $repeat);

### status

    use EhsanMoradi\LaravelSms\Facade\Kavenegar;

    $response = Kavenegar::status($messageId);

### select

    use EhsanMoradi\LaravelSms\Facade\Kavenegar;

    $response = Kavenegar::select($messageId);

### cancel

    use EhsanMoradi\LaravelSms\Facade\Kavenegar;

    $response = Kavenegar::cancel($messageId);

### receive

    use EhsanMoradi\LaravelSms\Facade\Kavenegar;

    $response = Kavenegar::receive($lineNumber,$isRead);

### selectOutbox

    use EhsanMoradi\LaravelSms\Facade\Kavenegar;

    $response = Kavenegar::selectOutbox($startDate, $endDate, $sender);

### latestOutBox

    use EhsanMoradi\LaravelSms\Facade\Kavenegar;

    $response = Kavenegar::latestOutBox($pageSize, $sender);

### statusByLocalid

    use EhsanMoradi\LaravelSms\Facade\Kavenegar;

    $response = Kavenegar::statusByLocalid($localId);

### info

    use EhsanMoradi\LaravelSms\Facade\Kavenegar;

    $response = Kavenegar::info();

### config

    use EhsanMoradi\LaravelSms\Facade\Kavenegar;

    $response = Kavenegar::config();

# ghasedak

`.env` file.

    GHASEDAK_API_KEY=api_key
example:

    use EhsanMoradi\LaravelSms\Facade\Ghasedak;

    $response = Ghasedak::simple('test message', '09011000000');
    
    $response->object();

methods:

    use EhsanMoradi\LaravelSms\Facade\Ghasedak;

    Ghasedak::simple($message, $receptor, $lineNumber, $sendDate, $checkId);
    
    Ghasedak::verification($message, $receptor, $type, $template, $checkId, $param1, $param2, $param3, $param4, $param5, $param6, $param7, $param8, $param9, $param10);

    Ghasedak::voice($message, $receptor, $sendDate);

    Ghasedak::pair($message, $receptors, $lineNumber, $sendDate, $checkId);

    Ghasedak::bulk($messages, $receptors, $lineNumbers, $sendDates, $checkIds);

    Ghasedak::accountInfo();

    Ghasedak::status($id, $type);
