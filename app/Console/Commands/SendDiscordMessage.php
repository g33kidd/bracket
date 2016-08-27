<?php

namespace App\Console\Commands;

use Discord\Discord;
use Discord\Parts\User\Game;
use Illuminate\Console\Command;

class SendDiscordMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'discord:send {message : Message to send}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $message = $this->argument('message');

        if(!config('services.discord.token')) {
            $this->error("You need to set the DISCORD_TOKEN in the .env file!");
            return false;
        }

        $discord = new Discord([
            'token' => config('services.discord.token')
        ]);
        
        $discord->on('ready', function($discord) {
            $discord->updatePresence($discord->factory(Game::class, ['name' => "with your minds!"]), false);
            $guild = $discord->guilds->first();

            foreach($guild->channels->getAll('type', 'text') as $channel) {
                if($channel->name == "discord-tests") {
                    $this->line($channel->name);
                    $channel->sendMessage($this->argument('message'));
                }
            }

            $discord->close();
            return true;
        });

        $discord->run();
    }
}
