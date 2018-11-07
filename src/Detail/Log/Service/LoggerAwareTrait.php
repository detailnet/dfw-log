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
     * @param string|null $prefix
     */
    protected function log($message, $level = Log\LogLevel::DEBUG, array $context = [], $prefix = null)
    {
        if ($this->logger !== null) {
            if ($prefix === null) {
                $prefix = $this->getLoggerPrefix();
            }

            $this->logger->log($level, sprintf('[%s] %s', $prefix, $message), $context);
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
     * @return string
     */
    protected function getLoggerPrefix()
    {
        if ($this->loggerPrefix === null) {
            $classNameParts = explode('\\', get_class($this));

            $this->loggerPrefix = $classNameParts[count($classNameParts) - 1];
        }

        return $this->loggerPrefix;
    }
}
