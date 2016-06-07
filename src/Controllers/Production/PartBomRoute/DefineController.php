<?php

	namespace Zahmetsizce\Controllers\Production\PartBomRoute;

	use Illuminate\Routing\Controller;

	use Zahmetsizce\Facades\Parts;
	use Zahmetsizce\Facades\Boms;
	use Zahmetsizce\Facades\Routes;
	use Zahmetsizce\Facades\BomRoute;
	use Zahmetsizce\Facades\PartBom;

	class DefineController extends Controller {

		/**
		 * İteme BOM atamak için gerekli olan sayfayı derlemeye yarayan method
		 * 
		 * @param  integer $itemId Item Id
		 * @return view
		 */
		public function bomToPart($partId)
		{
			$this->data['boms'] = Boms::all();
			$this->data['detail'] = Parts::find($partId);

			return view('zahmetsizce::production.partbomroute.bomtopart', $this->data);
		}

		/**
		 * İteme bağlanmak istenen BOM'u veritabanına ekleyen method
		 *
		 * @param  integer $itemId Item Id
		 * @return redirect
		 */
		public function bomToPartStore($partId)
		{
			$result = PartBom::setFromAllInput()->setRulesForTable('part_bom')->autoCreate();

			if (!$result) {
				return redirectTo('showPart', $partId);
			} else {
				return redirectTo('parts');
			}
		}
		
		/**
		 * BOM a Rotasyon ilişkilendirme sayfasını derleyen method
		 * 
		 * @param  integer $bomId BOM Id
		 * @return view
		 */
		public function routeToBom($bomId)
		{
			$this->data['routes'] = Routes::all();
			$this->data['detail'] = Boms::find($bomId);

			return view('zahmetsizce::production.partbomroute.routetobom', $this->data);
		}

		/**
		 * BOM Rotasyon ilişkisini veritabanına ekleyen method
		 * 
		 * @param  integer $bomId BOM Id
		 * @return redirect
		 */
		public function routeToBomStore($bomId)
		{
			$result = BomRoute::setFromAllInput()->setRulesForTable('bom_route')->autoCreate();

			if (!$result) {
				return redirectTo('defineRouteToBom', $bomId);
			} else {
				return redirectTo('showBom', $bomId);
			}
		}

		/**
		 * BOM a İtem ilişkilendirme sayfasını derleyen method
		 * 
		 * @param  integer $bomId BOM Id
		 * @return view
		 */
		public function partToBom($bomId)
		{
			$this->data['parts'] = Parts::all();
			$this->data['detail'] = Boms::find($bomId);

			return view('zahmetsizce::production.partbomroute.parttobom', $this->data);
		}

		/**
		 * BOM İtem ilişkisini veritabanına ekleyen method
		 * 
		 * @param  integer $bomId BOM Id
		 * @return redirect
		 */
		public function partToBomStore($bomId)
		{
			$result = PartBom::setFromAllInput()->setRulesForTable('part_bom')->autoCreate();

			if (!$result) {
				return redirectTo('definePartToBom', $bomId);
			} else {
				return redirectTo('showBom', $bomId);
			}
		}

		/**
		 * Rotasyona BOM tanımlamak için gerekli olan sayfayı derleyen method
		 * 
		 * @param  integer $rotaId Rotasyon Id
		 * @return view
		 */
		public function bomToRoute($routeId)
		{
			$this->data['boms'] = Boms::all();
			$this->data['detail'] = Routes::find($routeId);

			return view('zahmetsizce::production.partbomroute.bomtoroute', $this->data);
		}

		/**
		 * Rotasyona BOM bağlayan method
		 * 
		 * @param  integer $rotaId Rotasyon Id
		 * @return redirect
		 */
		public function bomToRouteStore($routeId)
		{
			$result = BomRoute::setFromAllInput()->setRulesForTable('bom_route')->autoCreate();

			if (!$result) {
				return redirectTo('defineBomToRoute', $routeId);
			} else {
				return redirectTo('showRoute', $routeId);
			}
		}

	}