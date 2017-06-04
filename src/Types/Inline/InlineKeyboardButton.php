<?php

namespace YaroslavMolchan\TelegramBotApi\Types\Inline;

use YaroslavMolchan\TelegramBotApi\BaseType;

class InlineKeyboardButton extends BaseType
{
    /**
     * @var array
     */
    static protected $requiredParams = ['text'];

    /**
     * @var array
     */
    static protected $map = [
        'text' => true,
        'url' => true,
        'callback_data' => true,
        'switch_inline_query' => true,
        'switch_inline_query_current_chat' => true,
        'pay' => true
    ];

    /**
     * Label text on the button
     *
     * @var string
     */
    protected $text;

    /**
     * Optional. HTTP url to be opened when button is pressed
     *
     * @var string
     */
    protected $url;

    /**
     * Optional. Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes
     *
     * @var string
     */
    protected $callbackData;

    /**
     * Optional. If set, pressing the button will prompt the user to select one of their chats, open that chat and insert the bot‘s username and the specified inline query in the input field.
     *
     * @var string
     */
    protected $switchInlineQuery;

    /**
     * Optional. If set, pressing the button will insert the bot‘s username and the specified inline query in the current chat's input field.
     *
     * @var string
     */
    protected $switchInlineQueryCurrentChat;

    /**
     * Optional. Specify True, to send a Pay button.
     * NOTE: This type of button must always be the first button in the first row.
     *
     * @var bool
     */
    protected $pay;

    /**
     * @author MY
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @author MY
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @author MY
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @author MY
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @author MY
     * @return string
     */
    public function getCallbackData()
    {
        return $this->callbackData;
    }

    /**
     * @author MY
     * @param string $callbackData
     */
    public function setCallbackData($callbackData)
    {
        $this->callbackData = $callbackData;
    }

    /**
     * @author MY
     * @return string
     */
    public function getSwitchInlineQuery()
    {
        return $this->switchInlineQuery;
    }

    /**
     * @author MY
     * @param string $switchInlineQuery
     */
    public function setSwitchInlineQuery($switchInlineQuery)
    {
        $this->switchInlineQuery = $switchInlineQuery;
    }

    /**
     * @author MY
     * @return string
     */
    public function getSwitchInlineQueryCurrentChat()
    {
        return $this->switchInlineQueryCurrentChat;
    }

    /**
     * @author MY
     * @param string $switchInlineQueryCurrentChat
     */
    public function setSwitchInlineQueryCurrentChat($switchInlineQueryCurrentChat)
    {
        $this->switchInlineQueryCurrentChat = $switchInlineQueryCurrentChat;
    }

    /**
     * @author MY
     * @return bool
     */
    public function isPay()
    {
        return $this->pay;
    }

    /**
     * @author MY
     * @param bool $pay
     */
    public function setPay($pay)
    {
        $this->pay = $pay;
    }
}
