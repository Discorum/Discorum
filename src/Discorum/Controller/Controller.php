<?php

namespace Discorum\Controller;

use Psr\Container\ContainerInterface;

abstract class Controller
{
    /**
     * The container interface
     * 
     * @var \Psr\Container\ContainerInterface
     */
    protected $container;

    /**
     * Constructor
     * 
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Retrieve container items
     * 
     * @param string $property The property item
     */
    public function __get($property)
    {
        if ($this->container->has($property)) {
            return $this->container->get($property);
        }

        trigger_error('Undefined property: ' . $property);
    }
}
