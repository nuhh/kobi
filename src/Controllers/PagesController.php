<?php

	namespace Zahmetsizce\Controllers;

	use Illuminate\Routing\Controller;

	use Zahmetsizce\Facades\ProductionOrders;
	use Zahmetsizce\Facades\Parts;

	class PagesController extends Controller
	{
		/**
		 * İtemleri listelemeye yarayan method
		 * 
		 * @return view
		 */
		public function index()
		{
			$this->data = [
				'toplamEmir'	=> ProductionOrders::count(),
				'toplamParca'	=> Parts::count()
			];

			return view('zahmetsizce::welcome', $this->data);
		}

	}
