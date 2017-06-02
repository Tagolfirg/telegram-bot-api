<?php

namespace YaroslavMolchan\TelegramBotApi\Types;

use YaroslavMolchan\TelegramBotApi\BaseType;
use YaroslavMolchan\TelegramBotApi\InvalidArgumentException;
use YaroslavMolchan\TelegramBotApi\TypeInterface;

/**
 * Class User
 * This object represents a Telegram user or bot.
 *
 * @package YaroslavMolchan\TelegramBotApi\Types
 */
class User extends BaseType implements TypeInterface
{
    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $requiredParams = ['id', 'first_name'];

    /**
     * {@inheritdoc}
     *
     * @var array
     */
    static protected $map = [
        'id' => true,
        'first_name' => true,
        'last_name' => true,
        'username' => true,
        'language_code' => true
    ];

    /**
     * Unique identifier for this user or bot
     *
     * @var int
     */
    protected $id;

    /**
     * User‘s or bot’s first name
     *
     * @var string
     */
    protected $firstName;

    /**
     * Optional. User‘s or bot’s last name
     *
     * @var string
     */
    protected $lastName;

    /**
     * Optional. User‘s or bot’s username
     *
     * @var string
     */
    protected $username;

    /**
     * Optional. IETF language tag of the user's language
     * @link https://en.wikipedia.org/wiki/IETF_language_tag
     *
     * @var string
     */
    protected $language_code;

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @throws InvalidArgumentException
     */
    public function setId($id)
    {
        if (is_integer($id) || is_float($id)) {
            $this->id = $id;
        } else {
            throw new InvalidArgumentException();
        }
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getLanguageCode()
    {
        return $this->language_code;
    }

    /**
     * @param string $language_code
     */
    public function setLanguageCode($language_code)
    {
        $this->language_code = $language_code;
    }
}
