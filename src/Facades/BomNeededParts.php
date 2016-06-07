<?php

	namespace Zahmetsizce\Facades;

	use Illuminate\Support\Facades\Facade;

	class BomNeededParts extends Facade {

		protected static function getFacadeAccessor() { return 'Zahmetsizce\Production\Boms\Details\BomNeededParts'; }

	}
