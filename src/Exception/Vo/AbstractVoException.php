<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Exception\Vo;

use EnterV\DiscordWebhooks\Exception\Interface\WebhookVoThrowableInterface;

abstract class AbstractVoException extends \Exception implements WebhookVoThrowableInterface
{
}
