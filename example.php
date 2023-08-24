<?php

require_once('vendor/autoload.php');

use EnterV\DiscordWebhooks\Client;
use EnterV\DiscordWebhooks\Embed;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

$embed = new Embed();
$embed->description('This is an embed');



$url = $_ENV["WEBHOOK_URL"];

$webhook = new Client($url);
$webhook->avatar("https://images-ext-1.discordapp.net/external/cKeFbq5tN63l6SZo5JOutUGzYFqsoAnLRr0jEGJw0b8/%3Ftype%3Dsm/https/cataas.com/cat/TmXWvrXQekP0usfx")
    ->username("Jednorożokot")
    ->message("Ciruciu")
    ->embed($embed)
    ->send();
