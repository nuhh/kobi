<?php

	namespace Zahmetsizce\Controllers\Production\Boms;

	use Illuminate\Routing\Controller;

	use Zahmetsizce\Facades\Boms;
	use Zahmetsizce\Facades\Routes;

	/**
	 * BOM ile ilgil işlemleri yapan sınıf
	 * 
	 */
	class BomController extends Controller
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
				'second'=> 'bom'
			];
		}

		/**
		 * BOM listesini derleyen method
		 * 
		 * @return view
		 */
		public function index()
		{
			$this->data['boms'] = Boms::all();

			return view('zahmetsizce::production.boms.list', $this->data);
		}
		
		/**
		 * BOM oluşturma sayfasını derlemeye yarayan method
		 * 
		 * @return view
		 */
		public function create()
		{
			$this->data['routes'] = Routes::all();

			return view('zahmetsizce::production.boms.create', $this->data);
		}
		
		/**
		 * BOM u veritabanına kayıt için kontrol eden ve ekleyen method
		 * 
		 * @return redirect
		 */
		public function store()
		{
			$result = Boms::setFromAllInput()->setRulesForTable('boms');

			if (!$result->autoCreate()) {
				return redirectTo('newBom');
			} else {
				return redirectTo('boms');
			}
		}
		
		/**
		 * BOM düzenlemesi için gerekli sayfayı derlemeye yarayan method
		 * 
		 * @param  integer $bomId BOM Id
		 * @return view
		 */
		public function edit($bomId)
		{
			$this->data['detail'] = Boms::find($bomId);

			return view('zahmetsizce::production.boms.edit', $this->data);
		}
		
		/**
		 * BOM güncellemesi için gerekli kontrolü yapan ve güncelleyen method
		 * 
		 * @param  integer $bomId BOM Id
		 * @return redirect
		 */
		public function update($bomId)
		{
			$result = Boms::setFromAllInput()->setId($bomId)->setRulesForTable('boms');

			if (!$result->autoUpdate()) {
				return redirectTo('editBom', $bomId);
			} else {
				return redirectTo('boms');
			}
		}
		
		/**
		 * BOM incelemek için gerekli sayfayı derleyen method
		 * 
		 * @param  integer $bomId BOM Id
		 * @return view
		 */
		public function show($bomId)
		{
			$this->data['detail'] = Boms::find($bomId);

			return view('zahmetsizce::production.boms.show', $this->data);
		}
		
		/**
		 * BOM silmeye yarayan method
		 *
		 * @param  integer $bomId BOM Id
		 * @return redirect
		 */
		public function delete($bomId)
		{
			Boms::find($bomId)->delete();

			return redirectTo('boms');
		}

	}
