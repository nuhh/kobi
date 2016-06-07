<?php

	namespace Zahmetsizce\Facades;

	use Illuminate\Support\Facades\Facade;

	class ProductionOrders extends Facade {

		protected static function getFacadeAccessor() { return 'Zahmetsizce\Manufacturing\ProductionOrders'; }

	}
