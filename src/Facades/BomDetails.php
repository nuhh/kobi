<?php

	namespace Zahmetsice\Facades;

	use Illuminate\Support\Facades\Facade;

	class BomDetails extends Facade {

		protected static function getFacadeAccessor() { return 'Zahmetsice\Production\Boms\BomDetails'; }

	}
