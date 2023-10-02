<?php

declare(strict_types=1);

namespace Enlumop\DiscordWebhooks\Exception\Color;

use Enlumop\DiscordWebhooks\Exception\Interface\WebhookThrowableInterface;

abstract class AbstractColorException extends \Exception implements WebhookThrowableInterface {}
