<?php

	Route::get('/', 'PagesController@index')->name('homePage');

	Route::group(
		[
			'prefix' => 'production',
			'namespace' => 'Production'
		],
		function() {
			Route::group(
				[
					'prefix' => 'parts',
					'namespace' => 'Parts'
				],
				function() {
					Route::get('/', 'PartsController@index')->name('parts');

					Route::get('new', 'PartsController@create')->name('newPart');
					Route::post('new', 'PartsController@store');

					Route::get('show/{partId}', 'PartsController@show')->name('showPart');

					Route::get('edit/{partId}', 'PartsController@edit')->name('editPart');
					Route::post('edit/{partId}', 'PartsController@update');

					Route::get('delete/{partId}', 'PartsController@delete')->name('deletePart');
				}
			);

			Route::group(
				[
					'prefix' => 'boms',
					'namespace' => 'Boms'
				],
				function() {
					Route::get('/', 'BomController@index')->name('boms');

					Route::get('new', 'BomController@create')->name('newBom');
					Route::post('new', 'BomController@store');

					Route::get('edit/{bomId}', 'BomController@edit')->name('editBom');
					Route::post('edit/{bomId}', 'BomController@update');

					Route::get('show/{bomId}', 'BomController@show')->name('showBom');

					Route::get('delete/{bomId}', 'BomController@delete')->name('deleteBom');

					Route::group(
						[
							'prefix' => 'composed',
						],
						function() {
							Route::get('add/{bomId}', 'BomComposedPartsController@create')->name('addComposedPartToBom');
							Route::post('add/{bomId}', 'BomComposedPartsController@store');

							Route::get('delete/{uretim_sonucu_olusan_id}', 'BomComposedPartsController@delete')->name('deleteComposedPartFromBom');
						}
					);

					Route::group(
						[
							'prefix' => 'needed'
						],
						function() {
							Route::get('add/{bomId}', 'BomNeededPartsController@create')->name('addNeededPartToBom');
							Route::post('add/{bomId}', 'BomNeededPartsController@store');

							Route::get('edit/{bomNeededPartId}', 'BomNeededPartsController@edit')->name('editNeededPartForBom');
							Route::post('edit/{bomNeededPartId}', 'BomNeededPartsController@update');

							Route::get('delete/{bomNeededPartId}', 'BomNeededPartsController@delete')->name('deleteNeededPartFromBom');
						}
					);
				}
			);

			Route::group(
				[
					'prefix' => 'routes',
					'namespace' => 'Routes'
				],
				function() {
					Route::get('/', 'RoutesController@index')->name('routes');

					Route::get('new', 'RoutesController@create')->name('newRoute');
					Route::post('new', 'RoutesController@store');

					Route::get('edit/{routeId}', 'RoutesController@edit')->name('editRoute');
					Route::post('edit/{routeId}', 'RoutesController@update');

					Route::get('show/{routeId}', 'RoutesController@show')->name('showRoute');

					Route::get('delete/{routeId}', 'RoutesController@delete')->name('deleteRoute');

					Route::group(
						[
							'prefix' => 'details'
						],
						function() {
							Route::get('new/{routeId}', 'RouteDetailsController@create')->name('newRouteDetail');
							Route::post('new/{routeId}', 'RouteDetailsController@store');

							Route::get('edit/{routeDetailId}', 'RouteDetailsController@edit')->name('editRouteDetail');
							Route::post('edit/{routeDetailId}', 'RouteDetailsController@update');
							
							Route::get('delete/{routeDetailId}', 'RouteDetailsController@delete')->name('deleteRouteDetail');
						}
					);
				}
			);

			Route::group(
				[
					'prefix' => 'partbomroute',
					'namespace' => 'PartBomRoute'
				],
				function() {
					Route::group(
						[
							'prefix' => 'define'
						],
						function() {
							Route::get('bomToPart/{partId}', 'DefineController@bomToPart')->name('defineBomToPart');
							Route::post('bomToPart/{partId}', 'DefineController@bomToPartStore');

							Route::get('routeToBom/{bomId}', 'DefineController@routeToBom')->name('defineRouteToBom');
							Route::post('routeToBom/{bomId}', 'DefineController@routeToBomStore');

							Route::get('partToBom/{bomId}', 'DefineController@partToBom')->name('definePartToBom');
							Route::post('partToBom/{bomId}', 'DefineController@partToBomStore');

							Route::get('bomToRoute/{routeId}', 'DefineController@bomToRoute')->name('defineBomToRoute');
							Route::post('bomToRoute/{routeId}', 'DefineController@bomToRouteStore');
						}
					);

					Route::group(
						[
							'prefix' => 'remove'
						],
						function() {
							Route::get('partbom/{partBomId}', 'RemoveController@partBom')->name('removeConnectionPartBom');
							Route::get('bomroute/{bomRouteId}', 'RemoveController@bomRoute')->name('removeConnectionBomRoute');
						}
					);

					Route::group(
						[
							'prefix' => 'default'
						],
						function() {
							Route::get('bomForPart/{partBomId}', 'DefaultController@bomForPart')->name('makeBomDefaultForPart');
							Route::get('removeDefaultBomFromPart/{partBomId}', 'DefaultController@removeBomForPart')->name('removeDefaultBomFromPart');

							Route::get('routeForBom/{bomRouteId}', 'DefaultController@routeForBom')->name('makeRouteDefaultForBom');
							Route::get('removeDefaultRouteFromBom/{bomRouteId}', 'DefaultController@removeRouteFromBom')->name('removeDefaultRouteFromRoute');
						}
					);
				}
			);
		}
	);

	Route::group(
		[
			'prefix' => 'inventory',
			'namespace'	=> 'Inventory'
		],
		function() {
			Route::get('/', 'StockController@index')->name('lots');

			Route::get('new', 'StockController@create')->name('newLot');
			Route::post('new', 'StockController@store');

			Route::get('show/{lotId}', 'StockController@show')->name('showLot');

			Route::get('delete/{lotId}', 'StockController@delete')->name('deleteLot');

			Route::get('inventory', 'StockController@inventory')->name('inventory');

			Route::get('lotsOf/{itemId}', 'StockController@lotsOf')->name('lotsOfPart');
		}
	);

	Route::group(
		[
			'prefix' => 'manufacturing',
			'namespace' => 'Manufacturing'
		],
		function() {
			Route::get('/', 'ManufacturingController@index')->name('productionOrders');

			Route::get('new', 'ManufacturingController@create')->name('newProductionOrder');
			Route::post('new', 'ManufacturingController@store');

			Route::get('show/{productionOrderId}', 'ManufacturingController@show')->name('showProductionOrder');

			Route::get('delete/{productionOrderId}', 'ManufacturingController@delete')->name('deleteProductionOrder');

			Route::get('work/finish/{productionRotationId}', 'ManufacturingController@workFinish')->name('finishProductionRotation');

			Route::get('consume/{productionNeededPartId}', 'ManufacturingController@consume')->name('consumeProductionNeededParts');
			Route::post('consume/{productionNeededPartId}', 'ManufacturingController@consumed');
		}
	);

	Route::get('asd', function() {
		$n = new Zahmetsizce\Manufacturing\ProductionControl;
		dd($n->fire(17));
	});

	Route::get('asdd', function() {
		dd(Zahmetsizce\Facades\ProductionControl::fire(17));
	});