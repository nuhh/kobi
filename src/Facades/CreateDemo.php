<?php

	namespace Zahmetsizce\Facades;

	use Illuminate\Support\Facades\Facade;

	class CreateDemo extends Facade {

		protected static function getFacadeAccessor() { return 'Zahmetsizce\Commands\CreateDemo'; }

	}
