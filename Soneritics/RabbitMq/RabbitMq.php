<?php
namespace Soneritics\RabbitMq;

use PhpAmqpLib\Connection\AMQPStreamConnection;

/**
 * Class RabbitMQ
 */
abstract class RabbitMq
{
    /**
     * @var RabbitMqConfig
     */
    private $config;

    /**
     * @var RabbitMqConnectionParameters
     */
    protected $connectionParameters;

    /**
     * @var AMQPStreamConnection
     */
    private $connection;

    /**
     * @var AMQPChannel
     */
    protected $channel;

    /**
     * RabbitMQ constructor.
     * @param RabbitMqConfig $config
     * @param RabbitMqConnectionParameters $connectionParameters
     */
    public function __construct(RabbitMqConfig $config, RabbitMqConnectionParameters $connectionParameters = null)
    {
        $this->config = $config;
        $this->connectionParameters = $connectionParameters ?? new RabbitMqConnectionParameters();
        $this->connect();
    }

    /**
     * Connect to RabbitMq
     */
    private function connect(): void
    {
        $this->connection = new AMQPStreamConnection($this->config->getHost(), $this->config->getPort(), $this->config->getUser(), $this->config->getPassword(), $this->config->getVhost());
        $this->channel = $this->connection->channel();
        $this->channel->queue_declare($this->connectionParameters->getQueue(), false, true, false, false);
        $this->channel->exchange_declare($this->connectionParameters->getExchange(), 'direct', false, true, false);
        $this->channel->queue_bind($this->connectionParameters->getQueue(), $this->connectionParameters->getExchange());
    }

    /**
     * Destructor, closes the channel and connection.
     */
    public function __destruct()
    {
        try { $this->channel->close(); } catch (\Exception $e) { }
        try { $this->connection->close(); } catch (\Exception $e) { }
    }
}
