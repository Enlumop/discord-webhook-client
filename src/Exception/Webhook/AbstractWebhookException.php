<?php

declare(strict_types=1);

namespace Enlumop\DiscordWebhooks\Exception\Webhook;

use Enlumop\DiscordWebhooks\Exception\Interface\WebhookThrowableInterface;

abstract class AbstractWebhookException extends \Exception implements WebhookThrowableInterface {}
