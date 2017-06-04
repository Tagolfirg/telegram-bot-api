<?php


namespace YaroslavMolchan\TelegramBotApi\Test\Types\Payments\Query;


use YaroslavMolchan\TelegramBotApi\Types\Payments\ArrayOfLabeledPrice;
use YaroslavMolchan\TelegramBotApi\Types\Payments\LabeledPrice;
use YaroslavMolchan\TelegramBotApi\Types\Payments\Query\AnswerShippingQuery;

class AnswerShippingQueryTest extends \PHPUnit_Framework_TestCase
{
    protected $trueQueryFixture = [
        'shipping_query_id' => 'unique_id',
        'ok' => true,
        'shipping_options' => [
            [
                'label' => 'Item 1',
                'amount' => 150
            ],
            [
                'label' => 'Item 2',
                'amount' => 250
            ]
        ]
    ];

    protected $falseQueryFixture = [
        'shipping_query_id' => 'unique_id',
        'ok' => false,
        'shipping_options' => [
            [
                'label' => 'Item 1',
                'amount' => 150
            ],
            [
                'label' => 'Item 2',
                'amount' => 250
            ]
        ],
        'error_message' => 'Sorry'
    ];

    public function testFromResponse1()
    {
        $item = AnswerShippingQuery::fromResponse($this->trueQueryFixture);

        $this->assertInstanceOf(AnswerShippingQuery::class, $item);
        $this->assertEquals('unique_id', $item->getShippingQueryId());
        $this->assertEquals(true, $item->getOk());
        $this->assertInternalType('array', $item->getShippingOptions());
    }

    public function testFromResponse2()
    {
        $item = AnswerShippingQuery::fromResponse($this->falseQueryFixture);

        $this->assertInstanceOf(AnswerShippingQuery::class, $item);
        $this->assertEquals('unique_id', $item->getShippingQueryId());
        $this->assertEquals(false, $item->getOk());
        $this->assertInternalType('array', $item->getShippingOptions());
        $this->assertEquals('Sorry', $item->getErrorMessage());
    }

    /**
     * @expectedException \YaroslavMolchan\TelegramBotApi\InvalidArgumentException
     */
    public function testFromResponseException1() {
        unset($this->trueQueryFixture['shipping_query_id']);
        AnswerShippingQuery::fromResponse($this->trueQueryFixture);
    }

    /**
     * @expectedException \YaroslavMolchan\TelegramBotApi\InvalidArgumentException
     */
    public function testFromResponseException2() {
        unset($this->trueQueryFixture['ok']);
        AnswerShippingQuery::fromResponse($this->trueQueryFixture);
    }

    public function testSetShippingQueryId()
    {
        $item = new AnswerShippingQuery();
        $item->setShippingQueryId('testId');
        $this->assertAttributeEquals('testId', 'shippingQueryId', $item);
    }

    public function testGetShippingQueryId()
    {
        $item = new AnswerShippingQuery();
        $item->setShippingQueryId('testId');
        $this->assertEquals('testId', $item->getShippingQueryId());
    }

    public function testSetOk()
    {
        $item = new AnswerShippingQuery();
        $item->setOk('testOk');
        $this->assertAttributeEquals('testOk', 'ok', $item);
    }

    public function testGetOk()
    {
        $item = new AnswerShippingQuery();
        $item->setOk('testOk');
        $this->assertEquals('testOk', $item->getOk());
    }

    public function testSetErrorMessage()
    {
        $item = new AnswerShippingQuery();
        $item->setErrorMessage('testErrorMessage');
        $this->assertAttributeEquals('testErrorMessage', 'errorMessage', $item);
    }

    public function testGetErrorMessage()
    {
        $item = new AnswerShippingQuery();
        $item->setErrorMessage('testErrorMessage');
        $this->assertEquals('testErrorMessage', $item->getErrorMessage());
    }




    public function testSetShippingOptions()
    {
        $item = new AnswerShippingQuery();

        $items = ArrayOfLabeledPrice::fromResponse($this->trueQueryFixture['shipping_options']);
        $this->assertInternalType('array', $items);
        foreach($items as $item) {
            $this->assertInstanceOf(LabeledPrice::class, $item);
        }
    }

    public function testGetShippingOptions()
    {
        $item = new AnswerShippingQuery();

        $items = ArrayOfLabeledPrice::fromResponse($this->trueQueryFixture['shipping_options']);
        $this->assertInternalType('array', $items);
        foreach($items as $item) {
            $this->assertInstanceOf(LabeledPrice::class, $item);
        }
    }
}