<?php

	namespace Zahmetsizce\Controllers\Production\PartBomRoute;

	use Illuminate\Routing\Controller;

	use Zahmetsizce\Facades\Parts;
	use Zahmetsizce\Facades\Boms;
	use Zahmetsizce\Facades\Routes;
	use Zahmetsizce\Facades\BomRoute;
	use Zahmetsizce\Facades\PartBom;

	class DefaultController extends Controller {


		/**
		 * Parça için ürün ağacını ön tanımlı yapmaya yarayan method
		 * 
		 * @param  integer $partId Parçanın ID değeri
		 * @param  integer $bomId  Ürün ağacının ID değeri
		 * @return redirect
		 */
		public function bomForPart($partBomId)
		{
			$find = PartBom::find($partBomId);

			PartBom::where('part_id', $find['part_id'])->update(['default' => 1]);

			$find->update(['default' => 2]);

			return redirectTo('parts');
		}

		/**
		 * Ön tanımlı ürün ağacı parçadan tanımı kaldıran method
		 * 
		 * @param  integer $partId Parçanın ID değeri
		 * @param  integer $bomId  Ürün ağacının ID değeri
		 * @return redirect
		 */
		public function removeBomForPart($partBomId)
		{
			$find = PartBom::find($partBomId);

			PartBom::where('part_id', $find['part_id'])->update(['default' => 1]);

			return redirectTo('showPart', $find['part_id']);
		}

		public function routeForBom($bomRouteId)
		{
			$find = BomRoute::find($bomRouteId);

			BomRoute::where('bom_id', $find['bom_id'])->update(['default' => 1]);

			$find->update(['default' => 2]);

			return redirectTo('boms');
		}

		/**
		 * BomRoute bağlantısını kalırma işlemini yapan method
		 * 
		 * @param  integer $BomRouteId BomRoute Id
		 * @return redirect
		 */
		public function removeRouteFromBom($bomRouteId)
		{
			$find = BomRoute::find($bomRouteId);

			BomRoute::where('bom_id', $find['bom_id'])->update(['default' => 1]);

			return redirectTo('boms');
		}

	}