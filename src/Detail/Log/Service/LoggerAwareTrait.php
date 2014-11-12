<?php

namespace Detail\Log\Service;

use Psr\Log\LogLevel;

trait LoggerAwareTrait
{
    use \Psr\Log\LoggerAwareTrait;

    private $loggerPrefix = null;

    protected function log($message, $level = LogLevel::DEBUG, array $context = array())
    {
        if ($this->logger !== null) {
            $this->logger->log($level, $this->getLoggerPrefix() . $message, $context);
        }
    }

    protected function setLoggerPrefix($prefix)
    {
        $this->loggerPrefix = $prefix;
    }

    protected function getLoggerPrefix($formatted = true)
    {
        if ($this->loggerPrefix === null) {
            $classNameParts = explode('\\', get_class($this));

            $this->loggerPrefix = $classNameParts[count($classNameParts) - 1];
        }

        return ($formatted === false) ? $this->loggerPrefix : sprintf('[%s] ', $this->loggerPrefix);
    }
}
