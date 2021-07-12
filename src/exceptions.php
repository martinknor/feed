<?php

declare(strict_types=1);

namespace Mk\Feed;


use Mk;

class LogicException extends \LogicException
{
}

class FileEmptyException extends LogicException
{
}

class ItemIncompletedException extends LogicException
{
}
