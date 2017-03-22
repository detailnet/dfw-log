<?php

namespace Detail\Log\Service;

use Psr\Log;

trait LoggerAwareTrait
{
    use Log\LoggerAwareTrait;

    /**
     * @var string
     */
    private $loggerPrefix = null;

    /**
     * @param string $message
     * @param string $level
     * @param array $context
     */
    protected function log($message, $level = Log\LogLevel::DEBUG, array $context = array())
    {
        if ($this->logger !== null) {
            $this->logger->log($level, $this->getLoggerPrefix() . $message, $context);
        }
    }

    /**
     * @param string $prefix
     */
    protected function setLoggerPrefix($prefix)
    {
        $this->loggerPrefix = $prefix;
    }

    /**
     * @param boolean $formatted
     * @return string
     */
    protected function getLoggerPrefix($formatted = true)
    {
        if ($this->loggerPrefix === null) {
            $classNameParts = explode('\\', get_class($this));

            $this->loggerPrefix = $classNameParts[count($classNameParts) - 1];
        }

        return ($formatted === false) ? $this->loggerPrefix : sprintf('[%s] ', $this->loggerPrefix);
    }
}
