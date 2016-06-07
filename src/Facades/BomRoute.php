<?php

	namespace Zahmetsizce\Facades;

	use Illuminate\Support\Facades\Facade;

	class BomRoute extends Facade {

		protected static function getFacadeAccessor() { return 'Zahmetsizce\Production\PartBomRoute\BomRoute'; }

	}
