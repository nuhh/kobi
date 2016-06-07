<?php

	namespace Zahmetsizce\Facades;

	use Illuminate\Support\Facades\Facade;

	class SetupDatabase extends Facade {

		protected static function getFacadeAccessor() { return 'Zahmetsizce\Commands\SetupDatabase'; }

	}
