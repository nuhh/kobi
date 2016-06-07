<?php

	namespace Zahmetsizce\Controllers\Production\Boms;

	use Illuminate\Routing\Controller;

	use Zahmetsizce\Facades\Parts;
	use Zahmetsizce\Facades\Boms;
	use Zahmetsizce\Facades\BomComposedParts;

	/**
	 * BOM ile ilgil işlemleri yapan sınıf
	 * 
	 */
	class BomComposedPartsController extends Controller
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
		 * BOM sonucu oluşacak olan item ekleme sayfasını derleyen method
		 *
		 * @version Eklenen ürünlerden sadece 1er tane oluşabiliyor. Bu güncellenebilir
		 * @param   integer $bomId BOM Id
		 * @return  view
		 */
		public function create($bomId)
		{
			$this->data['parts'] = Parts::all();
			$this->data['detail'] = Boms::find($bomId);

			return view('zahmetsizce::production.boms.details.additionalCreate', $this->data);
		}
		
		/**
		 * Veritabanına BOM sonucu oluşan itemi ekleyen method
		 *
		 * @param  integer $bomId BOM Id
		 * @return redirect
		 */
		public function store($bomId)
		{
			$result = BomComposedParts::setFromAllInput()->creation();

			if (!$result) {
				return redirectTo('addComposedPartToBom', $bomId);
			} else {
				return redirectTo('showBom', $bomId);
			}
		}
		
		/**
		 * Oluşan parçayı BOM dan kaldırmaya yarayan method
		 *
		 * @param  integer $uretimSonucuOlusanId Üretim Sonucu Oluşan Id
		 * @return redirect
		 */
		public function delete($bomComposedPartId)
		{
			BomComposedParts::find($bomComposedPartId)->delete();

			return redirectTo('boms');
		}
		
	}
