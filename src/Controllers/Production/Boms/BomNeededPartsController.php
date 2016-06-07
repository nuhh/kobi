<?php

	namespace Zahmetsizce\Controllers\Production\Boms;

	use Illuminate\Routing\Controller;

	use Zahmetsizce\Facades\Parts;
	use Zahmetsizce\Facades\Boms;

	use Zahmetsizce\Facades\BomNeededParts;

	/**
	 * BOM ile ilgil işlemleri yapan sınıf
	 * 
	 */
	class BomNeededPartsController extends Controller
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
		 * BOM için gerekli olan itemi eklemek için gerekli olan sayfayı derleyen method
		 * 
		 * @param  integer $bomId BOM Id
		 * @return view
		 */
		public function create($bomId)
		{
			$this->data['parts'] = Parts::all();
			$this->data['detail'] = Boms::find($bomId);

			return view('zahmetsizce::production.boms.details.requireCreate', $this->data);
		}
		
		/**
		 * BOM için gerekli olan itemi veritabanına eklemeye yarayan method
		 *
		 * @param  integer $bomId BOM Id
		 * @return redirect
		 */
		public function store($bomId)
		{
			$result = BomNeededParts::setFromAllInput()->creation();

			if (!$result) {
				return redirectTo('addNeededPartToBom', $bomId);
			} else {
				return redirectTo('showBom', $bomId);
			}
		}
		
		/**
		 * BOM için gerekli olan itemi düzenlemek için gerekli olan sayfayı derlemeyen method
		 *
		 * @param  integer $gerekenId BOM Gereken Item ID
		 * @return view
		 */
		public function edit($bomNeededPartId)
		{
			$this->data['parts'] = Parts::all();
			$this->data['detail'] = BomNeededParts::find($bomNeededPartId);

			return view('zahmetsizce::production.boms.details.requireEdit', $this->data);
		}
		
		/**
		 * BOM için gerekli olan itemi düzenlemeye yarayan method
		 *
		 * @param  integer $gerekenId BOM Gereken Item Id
		 * @return redirect
		 */
		public function update($bomNeededPartId)
		{
			$result = BomNeededParts::setFromAllInput()->setId($bomNeededPartId)->updation();

			if (!$result) {
				return redirectTo('editNeededPartForBom', $bomNeededPartId);
			} else {
				return redirectTo('boms');
			}
		}
		
		/**
		 * BOM için gerekli olan itemi silmeye yarayan method
		 * 
		 * @param  integer $gerekenId BOM Gereken Item Id
		 * @return redirect
		 */
		public function delete($bomNeededPartId)
		{
			BomNeededParts::find($bomNeededPartId)->delete();

			return redirectTo('boms');
		}

	}
