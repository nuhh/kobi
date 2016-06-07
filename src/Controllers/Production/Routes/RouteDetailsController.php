<?php

	namespace Zahmetsizce\Controllers\Production\Routes;

	use Illuminate\Routing\Controller;

	use Zahmetsizce\Facades\Routes;
	use Zahmetsizce\Facades\RouteDetails;

	/**
	 * Üretim rotasyonları ile ilgili işlemleri yapan sınıf
	 */
	class RouteDetailsController extends Controller
	{

		/**
		 * Sınıf içerisinde dolaşacak veriler
		 * 
		 * @var array
		 */
		var $data = [];

		public function __construct() {
			$this->data['theme'] = [
				'first'	=> 'stock',
				'second'=> 'rotation'
			];
		}

		/**
		 * Rotasyona işlem eklemek için gerekli olan sayfayı derlemeye yarayan method
		 * 
		 * @param  integer $rotaId Rotasyon Id
		 * @return view
		 */
		public function create($routeId)
		{
			$this->data['detail'] = Routes::find($routeId);

			return view('zahmetsizce::production.routes.details.plusCreate', $this->data);
		}
		
		/**
		 * Rotasyona eklenmek istenen işlemi kontrol eden ve ekleyen method
		 * 
		 * @param  integer $rotaId Rotasyon Id
		 * @return redirect
		 */
		public function store($routeId)
		{
			$result = RouteDetails::setFromAllInput()->setRulesForTable('route_details')->autoCreate();

			if (!$result) {
				return redirectTo('newRouteDetail', $routeId);
			} else {
				return redirectTo('showRoute', $routeId);
			}
		}
		
		/**
		 * Rotasyona eklenmiş işlemi düzenleme işlemi için gerekli olan sayfayı derleyen method
		 * 
		 * @param  integer $rotaDetayId Rotasyon Detay Id
		 * @return view
		 */
		public function edit($routeDetailId)
		{
			$this->data['detail'] = RouteDetails::find($routeDetailId);

			return view('zahmetsizce::production.routes.details.plusEdit', $this->data);
		}
		
		/**
		 * Rotasyon işlemini veritabanında düzenleme işlemini gerçekleştiren method
		 * 
		 * @param  integer $rotaDetayId Rotasyon Detay Id
		 * @return redirect
		 */
		public function update($routeDetailId)
		{
			$result = RouteDetails::setFromAllInput()->setId($routeDetailId)->setRulesForTable('route_details')->autoUpdate();

			if (!$result) {
				return redirectTo('editRouteDetail', $routeDetailId);
			} else {
				return redirectTo('routes');
			}
		}

		/**
		 * Rotasyon detayını silmeye yarayan method
		 * 
		 * @param  integer $rotaDetayId Rotasyon Detay Id
		 * @return redirect
		 */
		public function delete($routeDetailId)
		{
			RouteDetails::find($routeDetailId)->delete();

			return redirectTo('routes');
		}

	}
