<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \Guzzle\GuzzleHttp;
use Illuminate\Support\Facades\Cache;

class FetchInstagram extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'instagram:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetchs latest posts from Instagram and stores them in Cache';

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
        $client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('GET', 'https://www.instagram.com/escapetoshape/media/');
        $promise = $client->sendAsync($request)->then(function ($res) {
            if ($res->getStatusCode() === 200) {
                $this->info($res->getStatusCode());
                Cache::forever('instagram', $res->getBody()->getContents());
            } else {
                Cache::put('instagram', 'THERE WAS AN ERROR');
            }
        });
        $promise->wait();
    }
}
