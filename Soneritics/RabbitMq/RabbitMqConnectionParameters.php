<?php
namespace Soneritics\RabbitMq;

/**
 * Class RabbitMqConnectionParameters
 */
class RabbitMqConnectionParameters
{
    /**
     * @var string
     */
    private $exchange = 'router';

    /**
     * @var string
     */
    private $queue = 'messages';

    /**
     * @return string
     */
    public function getExchange(): string
    {
        return $this->exchange;
    }

    /**
     * @param string $exchange
     * @return RabbitMqConnectionParameters
     */
    public function setExchange(string $exchange): RabbitMqConnectionParameters
    {
        $this->exchange = $exchange;
        return $this;
    }

    /**
     * @return string
     */
    public function getQueue(): string
    {
        return $this->queue;
    }

    /**
     * @param string $queue
     * @return RabbitMqConnectionParameters
     */
    public function setQueue(string $queue): RabbitMqConnectionParameters
    {
        $this->queue = $queue;
        return $this;
    }
}
