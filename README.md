# PHP Telegram Bot Api

[![Latest Version on Packagist](https://img.shields.io/packagist/v/yaroslav-molchan/telegram-bot-api.svg?style=flat-square)](https://packagist.org/packages/yaroslav-molchan/telegram-bot-api)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/TelegramBot/Api/master.svg?style=flat-square)](https://travis-ci.org/TelegramBot/Api)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/telegrambot/api.svg?style=flat-square)](https://scrutinizer-ci.com/g/telegrambot/api/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/telegrambot/api.svg?style=flat-square)](https://scrutinizer-ci.com/g/telegrambot/api)
[![Total Downloads](https://img.shields.io/packagist/dt/yaroslav-molchan/telegram-bot-api.svg?style=flat-square)](https://packagist.org/packages/yaroslav-molchan/telegram-bot-api)

An extended native php wrapper for [Telegram Bot API](https://core.telegram.org/bots/api) without requirements. Supports all methods and types of responses.

## Bots: An introduction for developers
>Bots are special Telegram accounts designed to handle messages automatically. Users can interact with bots by sending them command messages in private or group chats.

>You control your bots using HTTPS requests to [bot API](https://core.telegram.org/bots/api).

>The Bot API is an HTTP-based interface created for developers keen on building bots for Telegram.
To learn how to create and set up a bot, please consult [Introduction to Bots](https://core.telegram.org/bots) and [Bot FAQ](https://core.telegram.org/bots/faq).

## Install

Via Composer

``` bash
$ composer require yaroslav-molchan/telegram-bot-api
```

#### API Wrapper
``` php
$bot = new \YaroslavMolchan\TelegramBotApi\BotApi('YOUR_BOT_API_TOKEN');

$bot->sendMessage($chatId, $messageText);
```

```php
$bot = new \YaroslavMolchan\TelegramBotApi\BotApi('YOUR_BOT_API_TOKEN');

$document = new \CURLFile('document.txt');

$bot->sendDocument($chatId, $document);
```

```php
$bot = new \YaroslavMolchan\TelegramBotApi\BotApi('YOUR_BOT_API_TOKEN');

$keyboard = new \YaroslavMolchan\TelegramBotApi\Types\ReplyKeyboardMarkup(array(array("one", "two", "three")), true); // true for one-time keyboard

$bot->sendMessage($chatId, $messageText, false, null, $keyboard);
```

```php
$bot = new \YaroslavMolchan\TelegramBotApi\BotApi('YOUR_BOT_API_TOKEN');

$keyboard = new \YaroslavMolchan\TelegramBotApi\Types\Inline\InlineKeyboardMarkup(
            [
                [
                    ['switch_inline_query_current_chat' => '/answer', 'text' => 'Answer']
                ]
            ]
        );
        
$bot->sendMessage($chatId, $messageText, false, null, $keyboard);
```

#### Client

```php
require_once "vendor/autoload.php";

try {
    $bot = new \YaroslavMolchan\TelegramBotApi\Client('YOUR_BOT_API_TOKEN');
    // or initialize with botan.io tracker api key
    // $bot = new \YaroslavMolchan\TelegramBotApi\Client('YOUR_BOT_API_TOKEN', 'YOUR_BOTAN_TRACKER_API_KEY');
    

    $bot->command('ping', function ($message) use ($bot) {
        $bot->sendMessage($message->getChat()->getId(), 'pong!');
    });
    
    $bot->run();

} catch (\YaroslavMolchan\TelegramBotApi\Exception $e) {
    $e->getMessage();
}
```

### Botan SDK

[Botan](http://botan.io) is a telegram bot analytics system based on [Yandex.Appmetrica](http://appmetrica.yandex.com/).
In this document you can find how to setup Yandex.Appmetrica account, as well as examples of Botan SDK usage.

### Creating an account
 * Register at http://appmetrica.yandex.com/
 * After registration you will be prompted to create Application. Please use @YourBotName as a name.
 * Save an API key from settings page, you will use it as a token for Botan API calls.
 * Download lib for your language, and use it as described below. Don`t forget to insert your token!

Since we are only getting started, you may discover that some existing reports in AppMetriсa aren't properly working for Telegram bots, like Geography, Gender, Age, Library, Devices, Traffic sources and Network sections. We will polish that later.

## SDK usage

#### Standalone

```php
$tracker = new \YaroslavMolchan\TelegramBotApi\Botan('YOUR_BOTAN_TRACKER_API_KEY');

$tracker->track($message, $eventName);
```

#### API Wrapper
```php
$bot = new \YaroslavMolchan\TelegramBotApi\BotApi('YOUR_BOT_API_TOKEN', 'YOUR_BOTAN_TRACKER_API_KEY');

$bot->track($message, $eventName);
```

_You can use method `getUpdates()` and all incoming messages will be automatically tracked as `Message`-event_

#### Client
```php
$bot = new \YaroslavMolchan\TelegramBotApi\Client('YOUR_BOT_API_TOKEN', 'YOUR_BOTAN_TRACKER_API_KEY');
```

_All registered commands are automatically tracked as command name_

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email mail@igusev.ru instead of using the issue tracker.

## Credits

- [Yaroslav Molchan](https://github.com/YaroslavMolchan)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
