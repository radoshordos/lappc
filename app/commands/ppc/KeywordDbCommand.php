<?php

namespace Ppc;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Authority\Eloquent\PpcDb;
use Authority\Eloquent\PpcKeywords;

class KeywordDbCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'command:ppc:keyword-db';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate keywords from table ppc_db';

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
	public function fire()
	{

       $ppc_db = PpcDb::all()->take(10);
       foreach ($ppc_db as $db) {

            $keywords = new PpcKeywords();
            $keywords->name = strtr($db->name, array(" " => "-"));
            $keywords->save();
        }
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('example', InputArgument::OPTIONAL, 'An example argument.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
