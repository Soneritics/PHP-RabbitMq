<?php
namespace RabbitMq;

/**
 * Class RabbitMqConsumer
 */
class RabbitMqConsumer extends RabbitMq
{
    /**
     * @param string $consumerTag
     * @param \Closure $callback
     */
    public function subscribe(string $consumerTag, \Closure $callback): void
    {
        $this->channel->basic_consume($this->connectionParameters->getQueue(), $consumerTag, false, false, false, false, $callback);
    }

    /**
     * Listen to the messages on the bus
     */
    public function listen(): void
    {
        while (count($this->channel->callbacks)) {
            $this->channel->wait();
        }
    }
}
