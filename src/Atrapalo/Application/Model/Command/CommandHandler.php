<?php

namespace Atrapalo\Application\Model\Command;

/**
 * Interface CommandHandler
 */
interface CommandHandler
{
    /**
     * @param Command $command
     *
     * @return mixed
     */
    public function handle(Command $command);
}
