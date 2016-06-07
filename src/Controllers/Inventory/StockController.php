<?php

	namespace Zahmetsizce\Controllers\Inventory;

	use Illuminate\Routing\Controller;

	use Zahmetsizce\Facades\Lots;
	use Zahmetsizce\Facades\Parts;

	/**
	 * Stoklarla alakalı işlemlerin yürülüğü sınıftır.
	 */
	class StockController extends Controller
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
				'second'=> 'lots'
			];
		}

		/**
		 * Stok lotlarının listelemesini yapan method
		 * 
		 * @return view
		 */
		public function index()
		{
			$this->data['lots'] = Lots::all();

			return view('zahmetsizce::inventory.list', $this->data);
		}
		
		/**
		 * Stok lotu oluşturmak için gerekli olan sayfayı derleyen method
		 *
		 * @see    burda depoya eklenecek olan parçaların depolanabilir gibi seçeneği olması lazım
		 * @return view
		 */
		public function create()
		{
			$this->data['parts'] = Parts::all();

			return view('zahmetsizce::inventory.create', $this->data);
		}
		
		/**
		 * Stok lotu ekleme işleminde verileri kontrol eden ve ekleyen method
		 *
		 * @return redirect
		 */
		public function store()
		{
			$result = Lots::setFromAllInput()->setRulesForTable('lots');

			if (!$result->autoCreate()) {
				return redirectTo('newLot');
			} else {
				return redirectTo('lots');
			}
		}
		
		/**
		 * Stok lotu inceleme sayfasını derleyen method
		 * 
		 * @param  integer $stokLotId Stok Lot Id
		 * @return view
		 */
		public function show($lotId)
		{
			$this->data['detail'] = Lots::find($lotId);

			return view('zahmetsizce::inventory.show', $this->data);
		}
		
		/**
		 * Stok lotunu silen method
		 *
		 * @version Stok lotu silindiği zaman ne olacağını belirlemek gerekli
		 * @param   integer $stokLotId Stok Lot Id
		 * @return  redirect
		 */
		public function delete($lotId)
		{
			Lots::find($lotId)->delete();

			return redirectTo('lots');
		}

		/**
		 * Depodaki genel durumu listeleyen method
		 *
		 * @version Daha sonraları içerik detaylarını lisstelenip hangi lotta olduğu gösterilebilir.
		 * @return  view
		 */
		public function inventory()
		{
			$this->data['parts'] = Lots::inventoryData();
			$this->data['theme']['second'] = 'inventory';
			
			return view('zahmetsizce::inventory.inventory', $this->data);
		}

		/**
		 * Belli bir itemin lotlarını listeleyen method
		 * 
		 * @param  integer $itemId Item ID
		 * @return view
		 */
		public function lotsOf($partId)
		{
			$this->data['partDetail'] = Parts::find($partId);
			$this->data['lots'] = Lots::lotsOfPart($partId);
			$this->data['theme']['second'] = 'inventory';

			return view('zahmetsizce::inventory.lots', $this->data);
		}

	}
