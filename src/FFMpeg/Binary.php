<?php

/*
 * This file is part of PHP-FFmpeg.
 *
 * (c) Alchemy <info@alchemy.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FFMpeg;

use FFMpeg\Exception\BinaryNotFoundException;
use Monolog\Logger;
use Symfony\Component\Process\ExecutableFinder;

/**
 * Binary abstract class
 *
 * @author Romain Neutron imprec@gmail.com
 */
abstract class Binary implements AdapterInterface
{
    protected $binary;

    /**
     *
     * @var Logger
     */
    protected $logger;

    /**
     * Binary constructor
     *
     * @param type   $binary The path file to the binary
     * @param Logger $logger A logger
     */
    public function __construct($binary, Logger $logger)
    {
        $this->binary = $binary;
        $this->logger = $logger;
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        $this->binary = $binary = $this->logger = null;
    }

    /**
     * {@inheritdoc}
     *
     * @param  Logger $logger A logger
     * @return Binary The binary
     *
     * @throws Exception\BinaryNotFoundException
     */
    public static function load(Logger $logger)
    {
        $finder = new ExecutableFinder();
        $binary = null;

        foreach (static::getBinaryName() as $candidate) {
            if (null !== $binary = $finder->find($candidate)) {
                break;
            }
        }

        if (null === $binary) {
            throw new BinaryNotFoundException('Binary not found');
        }

        return new static($binary, $logger);
    }

    /**
     * Return the binary name
     */
    protected static function getBinaryName()
    {
        throw new \Exception('Should be implemented');
    }
}
