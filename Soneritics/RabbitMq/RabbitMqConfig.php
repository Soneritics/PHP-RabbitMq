<?php
namespace RabbitMq;

/**
 * Class RabbitMqConfig
 */
class RabbitMqConfig
{
    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $host = 'localhost';

    /**
     * @var int
     */
    private $port = 5672;

    /**
     * @var string
     */
    private $vhost = '/';

    /**
     * @var bool
     */
    private $debug = false;

    /**
     * RabbitMQConfig constructor.
     * @param string $user
     * @param string $password
     */
    public function __construct(string $user, string $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return RabbitMqConfig
     */
    public function setUser(string $user): RabbitMqConfig
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return RabbitMqConfig
     */
    public function setPassword(string $password): RabbitMqConfig
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     * @return RabbitMqConfig
     */
    public function setHost(string $host): RabbitMqConfig
    {
        $this->host = $host;
        return $this;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * @param int $port
     * @return RabbitMqConfig
     */
    public function setPort(int $port): RabbitMqConfig
    {
        $this->port = $port;
        return $this;
    }

    /**
     * @return string
     */
    public function getVhost(): string
    {
        return $this->vhost;
    }

    /**
     * @param string $vhost
     * @return RabbitMqConfig
     */
    public function setVhost(string $vhost): RabbitMqConfig
    {
        $this->vhost = $vhost;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDebug(): bool
    {
        return $this->debug;
    }

    /**
     * @param bool $debug
     * @return RabbitMqConfig
     */
    public function setDebug(bool $debug): RabbitMqConfig
    {
        $this->debug = $debug;
        return $this;
    }
}
