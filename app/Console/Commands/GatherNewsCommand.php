<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\News;

class GatherNewsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

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
        $News=News::getLatest();
		News::query()->truncate();
	
		collect($News['articles'])
			->take(10)
			->each(function ($item, $key) {
				
				$item['source_name']=$item['source']['name'];
				unset($item['source']);
				$item['image']=$item['urlToImage'];
				unset($item['urlToImage']);
				
				News::create($item);
				
			});
	
    }
}
