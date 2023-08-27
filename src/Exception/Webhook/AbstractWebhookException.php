<?php

declare(strict_types=1);

namespace EnterV\DiscordWebhooks\Exception\Webhook;

use EnterV\DiscordWebhooks\Exception\Interface\WebhookThrowableInterface;

abstract class AbstractWebhookException extends \Exception implements WebhookThrowableInterface
{
}
