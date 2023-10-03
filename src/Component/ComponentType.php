<?php

declare(strict_types=1);

namespace Enlumop\DiscordWebhooks\Component;

enum ComponentType
{
    case ActionRow;
    case Button;
    case StringSelect;
    case TextInput;
    case UserSelect;
    case RoleSelect;
    case MentionableSelect;
    case ChannelSelect;

    /**
     * Create a ComponentType enum instance based on the provided type.
     *
     * @see https://discord.com/developers/docs/interactions/message-components#component-object-component-types
     *
     * @param int $type the type identifier for the component (must be within the range 1-8)
     *
     * @return ComponentType the corresponding ComponentType enum instance
     *
     * @throws \InvalidArgumentException if an invalid type is provided
     */
    public static function create(int $type): self
    {
        return match ($type) {
            1 => self::ActionRow,
            2 => self::Button,
            3 => self::StringSelect,
            4 => self::TextInput,
            5 => self::UserSelect,
            6 => self::RoleSelect,
            7 => self::MentionableSelect,
            8 => self::ChannelSelect,
            default => throw new \InvalidArgumentException("Invalid component type: {$type}. Must be between 1 and 8"),
        };
    }
}
