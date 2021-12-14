<?php
/*
 * DiscordBot, PocketMine-MP Plugin.
 *
 * Licensed under the Open Software License version 3.0 (OSL-3.0)
 * Copyright (C) 2020-2021 JaxkDev
 *
 * Twitter :: @JaxkDev
 * Discord :: JaxkDev#2698
 * Email   :: JaxkDev@gmail.com
 */

namespace JaxkDev\DiscordBot\Communication\Packets\Plugin;

use JaxkDev\DiscordBot\Communication\Packets\Packet;
use Discord\Builders\Components\SelectMenu;
use Discord\Builders\MessageBuilder;
use JaxkDev\DiscordBot\Models\Messages\Message;

class RequestModifySelectMenu extends Packet
{

    /** @var MessageBuilder */
    private $response;

    /** @var Message */
    private $message;

    /** @var string */
    private $channelId;

    /** @var SelectMenu */
    private $select;

    /** @var bool */
    private $ephemeral;

    /** @var bool */
    private $doNothing;

    public function __construct(MessageBuilder $response, Message $message, string $channelId, SelectMenu $select, bool $ephemeral, bool $doNothing)
    {
        parent::__construct();
        $this->response = $response;
        $this->message = $message;
        $this->channelId = $channelId;
        $this->select = $select;
        $this->ephemeral = $ephemeral;
        $this->doNothing = $doNothing;
    }
    public function getMessageBuilder(): MessageBuilder
    {
        return $this->response;
    }
    public function getMessage(): Message
    {
        return $this->message;
    }
    public function getChannelId(): string
    {
        return $this->channelId;
    }
    public function getSelectMenu(): SelectMenu
    {
        return $this->select;
    }
    public function isEphemeral(): bool
    {
        return $this->ephemeral;
    }
    public function doNothing(): bool
    {
        return $this->doNothing;
    }
    public function serialize(): ?string
    {
        return serialize([
            $this->UID,
            $this->response,
            $this->message,
            $this->channelId,
            $this->select,
            $this->ephemeral,
            $this->doNothing
        ]);
    }

    public function unserialize($data): void
    {
        [
            $this->UID,
            $this->response,
            $this->message,
            $this->channelId,
            $this->select,
            $this->ephemeral,
            $this->doNothing
        ] = unserialize($data);
    }
}
