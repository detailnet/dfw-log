<?php

namespace Detail\Log\Service;

use Psr\Log\LoggerAwareInterface;

use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;

class LoggerInitializer implements InitializerInterface
{
    /**
     * Initialize
     *
     * @param $instance
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        if ($instance instanceof LoggerAwareInterface) {
            if ($serviceLocator instanceof ServiceLocatorAwareInterface) {
                $serviceLocator = $serviceLocator->getServiceLocator();
            }

            /** @var \Detail\Log\Options\ModuleOptions $options */
            $options = $serviceLocator->get('Detail\Log\Options\ModuleOptions');

            /** @var \Psr\Log\LoggerInterface $logger */
            $logger = $serviceLocator->get($options->getLogger());
            $instance->setLogger($logger);
        }
    }
}
