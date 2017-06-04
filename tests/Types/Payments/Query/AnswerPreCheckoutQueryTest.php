<?php


namespace YaroslavMolchan\TelegramBotApi\Test\Types\Payments\Query;


use YaroslavMolchan\TelegramBotApi\Types\Payments\Query\AnswerPreCheckoutQuery;

class AnswerPreCheckoutQueryTest extends \PHPUnit_Framework_TestCase
{
    protected $trueQueryFixture = [
        'pre_checkout_query_id' => 'pre_checkout_query_id',
        'ok' => true
    ];

    protected $falseQueryFixture = [
        'pre_checkout_query_id' => 'pre_checkout_query_id',
        'ok' => false,
        'error_message' => 'Sorry'
    ];

    public function testFromResponse1()
    {
        $item = AnswerPreCheckoutQuery::fromResponse($this->trueQueryFixture);

        $this->assertInstanceOf(AnswerPreCheckoutQuery::class, $item);
        $this->assertEquals('pre_checkout_query_id', $item->getPreCheckoutQueryId());
        $this->assertEquals(true, $item->getOk());
    }

    public function testFromResponse2()
    {
        $item = AnswerPreCheckoutQuery::fromResponse($this->falseQueryFixture);

        $this->assertInstanceOf(AnswerPreCheckoutQuery::class, $item);
        $this->assertEquals('pre_checkout_query_id', $item->getPreCheckoutQueryId());
        $this->assertEquals(false, $item->getOk());
        $this->assertEquals('Sorry', $item->getErrorMessage());
    }

    /**
     * @expectedException \YaroslavMolchan\TelegramBotApi\InvalidArgumentException
     */
    public function testFromResponseException1() {
        unset($this->trueQueryFixture['pre_checkout_query_id']);
        AnswerPreCheckoutQuery::fromResponse($this->trueQueryFixture);
    }

    /**
     * @expectedException \YaroslavMolchan\TelegramBotApi\InvalidArgumentException
     */
    public function testFromResponseException2() {
        unset($this->trueQueryFixture['ok']);
        AnswerPreCheckoutQuery::fromResponse($this->trueQueryFixture);
    }

    public function testSetOk()
    {
        $item = new AnswerPreCheckoutQuery();
        $item->setOk('testOk');
        $this->assertAttributeEquals('testOk', 'ok', $item);
    }

    public function testGetOk()
    {
        $item = new AnswerPreCheckoutQuery();
        $item->setOk('testOk');
        $this->assertEquals('testOk', $item->getOk());
    }

    public function testSetErrorMessage()
    {
        $item = new AnswerPreCheckoutQuery();
        $item->setErrorMessage('testErrorMessage');
        $this->assertAttributeEquals('testErrorMessage', 'errorMessage', $item);
    }

    public function testGetErrorMessage()
    {
        $item = new AnswerPreCheckoutQuery();
        $item->setErrorMessage('testErrorMessage');
        $this->assertEquals('testErrorMessage', $item->getErrorMessage());
    }

    public function testSetPreCheckoutQueryId()
    {
        $item = new AnswerPreCheckoutQuery();
        $item->setPreCheckoutQueryId('testPreCheckoutQueryId');
        $this->assertAttributeEquals('testPreCheckoutQueryId', 'preCheckoutQueryId', $item);
    }

    public function testGetPreCheckoutQueryId()
    {
        $item = new AnswerPreCheckoutQuery();
        $item->setPreCheckoutQueryId('testPreCheckoutQueryId');
        $this->assertEquals('testPreCheckoutQueryId', $item->getPreCheckoutQueryId());
    }
}
