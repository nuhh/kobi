<?php

	namespace Zahmetsizce\Facades;

	use Illuminate\Support\Facades\Facade;

	class Boms extends Facade {

		protected static function getFacadeAccessor() { return 'Zahmetsizce\Production\Boms\Boms'; }

	}
