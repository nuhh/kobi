<?php

	namespace Zahmetsizce\Facades;

	use Illuminate\Support\Facades\Facade;

	class PartBom extends Facade {

		protected static function getFacadeAccessor() { return 'Zahmetsizce\Production\PartBomRoute\PartBom'; }

	}
