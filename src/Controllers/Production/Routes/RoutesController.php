<?php

	namespace Zahmetsizce\Controllers\Production\Routes;

	use Illuminate\Routing\Controller;

	use Zahmetsizce\Facades\Routes;

	/**
	 * Üretim rotasyonları ile ilgili işlemleri yapan sınıf
	 */
	class RoutesController extends Controller
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
		 * Rotasyonları listeleyen method
		 * 
		 * @return view
		 */
		public function index()
		{
			$this->data['routes'] = Routes::all();

			return view('zahmetsizce::production.routes.list', $this->data);
		}
		
		/**
		 * Rotasyon eklemek için gerekli olan sayfayı derleyen method
		 * 
		 * @return view
		 */
		public function create()
		{
			return view('zahmetsizce::production.routes.create', $this->data);
		}
		
		/**
		 * Rotasyon eklemek için gerekli kontrolleri yapan ve ekleyen method
		 * 
		 * @return redirect
		 */
		public function store()
		{
			$result = Routes::setFromAllInput()->setRulesForTable('routes')->autoCreate();

			if (!$result) {
				return redirectTo('newRoute');
			} else {
				return redirectTo('routes');
			}
		}

		/**
		 * Rotasyon düzenlemek için gerekli olan sayfayı derlemeye yarayan method
		 * 
		 * @param  integer $rotaId Rotasyon Id
		 * @return view
		 */
		public function edit($routeId)
		{
			$this->data['detail'] = Routes::find($routeId);

			return view('zahmetsizce::production.routes.edit', $this->data);
		}
		
		/**
		 * Rotasyonu veritabanında düzenleyen method
		 * 
		 * @param  integer $rotaId Rotasyon Id
		 * @return redirect
		 */
		public function update($routeId)
		{
			$result = Routes::setId($routeId)->setFromAllInput()->setRulesForTable('routes')->autoUpdate();

			if (!$result) {
				return redirectTo('editRoute', $routeId);
			} else {
				return redirectTo('routes');
			}
		}
		
		/**
		 * Rotasyon inceleme sayfasını derleyen mehod
		 * 
		 * @param  integer $rotaId Rotasyon Id
		 * @return view
		 */
		public function show($routeId)
		{
			$this->data['detail'] = Routes::find($routeId);

			return view('zahmetsizce::production.routes.show', $this->data);
		}
		
		/**
		 * Rotasyon silme işlemini yapan method
		 * 
		 * @param  integer $rotaId Rotasyon Id
		 * @return redirect
		 */
		public function delete($routeId)
		{
			Routes::find($routeId)->delete();

			return redirect()
					->route('routes');
		}

	}
