<?php
namespace RabbitMq;

use PhpAmqpLib\Message\AMQPMessage;

/**
 * Class RabbitMqPublisher
 */
class RabbitMqPublisher extends RabbitMq
{
    public function publish($message): void
    {
        $message = new AMQPMessage(json_encode($message), array('content_type' => 'application/json', 'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT));
        $this->channel->basic_publish($message, $this->connectionParameters->getExchange());
    }
}
