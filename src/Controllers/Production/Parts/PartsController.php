<?php

	namespace Zahmetsizce\Controllers\Production\Parts;

	use Illuminate\Routing\Controller;

	use Zahmetsizce\Facades\Parts;

	/**
	 * Parçalarla alakalı işlemlerin yürütüldüğü sınıf
	 */
	class PartsController extends Controller
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
				'second'=> 'parts'
			];
		}

		/**
		 * İtemleri listelemeye yarayan method
		 * 
		 * @return view
		 */
		public function index()
		{
			$this->data['parts'] = Parts::all();

			return view('zahmetsizce::production.parts.list', $this->data);
		}
		
		/**
		 * İtem oluşturmak için gerekli olan sayfayı derleyen method
		 * 
		 * @return view
		 */
		public function create()
		{
			$this->data['boms'] = Parts::getBomsForNewOrEditNewPart();

			return view('zahmetsizce::production.parts.create', $this->data);
		}
		
		/**
		 * İtemi veritabanına eklemek için kontrol eden ve ekleyen method
		 *
		 * @return redirect
		 */
		public function store()
		{
			$result = Parts::setFromAllInput()->setRulesForTable('parts');

			if(!$result->autoCreate()) {
				return redirectTo('newPart')->withErrors($result->errors());
			} else {
				return redirectTo('parts');
			}
		}
		
		/**
		 * İtemi incelemek için gerekli olan sayfayı derlemeye yarayan method
		 * 
		 * @param  integer $itemId Item Id
		 * @return view
		 */
		public function show($partId)
		{
			$this->data['detail'] = Parts::find($partId);

			return view('zahmetsizce::production.parts.show', $this->data);
		}
		
		/**
		 * İtem düzenlemek için gerekli olan sayfayı derleyen method
		 * 
		 * @param  integer $itemId Item Id
		 * @return view
		 */
		public function edit($partId)
		{
			$this->data['detail'] = Parts::find($partId);

			return view('zahmetsizce::production.parts.edit', $this->data);
		}
		
		/**
		 * İtemi düzenleyen method
		 * 
		 * @param  integer $itemId Item Id
		 * @return redirect
		 */
		public function update($partId)
		{
			$result = Parts::setFromAllInput()->setId($partId)->setRulesForTable('parts');

			if (!$result->autoUpdate()) {
				return redirectTo('editPart', $partId);
			} else {
				return redirectTo('parts');
			}
		}
		
		/**
		 * Itemi silmeye yarayan method
		 * 
		 * @param  integer $itemId Item Id
		 * @return redirect
		 */
		public function delete($partId)
		{
			Parts::find($partId)->delete();
			
			return redirectTo('parts');
		}

	}
