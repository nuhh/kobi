<?php

	namespace Zahmetsizce\Commands;

	use Zahmetsizce\Facades\PredefineProductionOrder;
	use Zahmetsizce\Facades\BomComposedParts;
	use Zahmetsizce\Facades\BomNeededParts;
	use Zahmetsizce\Facades\BomRoute;
	use Zahmetsizce\Facades\Boms;
	use Zahmetsizce\Facades\Lots;

	use Faker\Generator;

	use Illuminate\Support\Facades\DB;

	use Zahmetsizce\Facades\PartBom;
	use Zahmetsizce\Facades\Parts;
	use Zahmetsizce\Facades\RouteDetails;
	use Zahmetsizce\Facades\Routes;
	use Zahmetsizce\Facades\ProductionOrders;
	use Zahmetsizce\Facades\ProductionOrderNeededParts;
	use Zahmetsizce\Facades\ProductionOrderRotations;
	use Zahmetsizce\Facades\ProductionOrderComposedParts;

	/**
	 * Demo veritabanı oluşturmaya yarayan komut
	 */
	class CreateDemo
	{
		/**
		 * Komutta çalışan method
		 *
		 * @return mixed
		 */
		public function fire()
		{
			$start = microtime(true);

			$musteri = 45;
			$siparis = 100;
			$OrderDetails = 250;
			$lot = 100;
			$emir = 50;


			$faker = \Faker\Factory::create();

			$versiyon = '1.0.0';
			$musteriSayisi = $musteri;
			$siparisSayisi = $siparis;
			$siparisDetaySayisi = $OrderDetails;
			$adetler = [1,2,3,4,5,10,20,25,30,50,100,250,500,600,1000];
			$lotSayisi = $lot;
			$emirSayisi = $emir;


			# Tablolar boşaltılıyor.
			BomNeededParts::truncate();
			BomComposedParts::truncate();
			BomRoute::truncate();
			Boms::truncate();
			PartBom::truncate();
			Parts::truncate();
			RouteDetails::truncate();
			Routes::truncate();
			Lots::truncate();
			ProductionOrders::truncate();
			ProductionOrderNeededParts::truncate();
			ProductionOrderRotations::truncate();
			ProductionOrderComposedParts::truncate();

			# System tablosu

			# İtemler
			$Parts = [
				'A' => [],
				'B' => [],
				'C' => [],
				'D' => [],
				'E' => [],
				'F' => [],
				'G' => [],
				'H' => [],
				'J' => [],
				'K' => [],
				'L' => [],
				'M' => [],
				'N' => [],
				'O' => [],
				'P' => [],
				'R' => [],
				'S' => [],
				'T' => [],
				'V' => [],
				'Y' => [],
				'Z' => [],
				'X' => []
			];

			foreach ($Parts as $key => $value) {
				$rand = rand(1, 99999999);
				$valuee = [
					'id'		=> $rand,
					'part_code'	=> 'I-'.$rand,
					'title'	=> 'Item '.$key
				];
				$Parts[$key] = $valuee;
			}

			foreach($Parts as $key => $value) {
				Parts::create($value);
			}


			# Ürün Ağacı aşağıdaki gibi olacaktır.
			# A1 => B2, C3
			# B1 => D2, E4, F4
			# C1 => G1, F3
			# G1 => H2, J3, K5
			# K1 => L1, M3
			# D1 => N3, O4
			# E1 => P1, R3

			$bomlar = [
				'A' => [],
				'B' => [],
				'C' => [],
				'G' => [],
				'K' => [],
				'D' => [],
				'E' => []
			];

			foreach ($bomlar as $key => $value) {
				$rand = rand(1, 99999999);
				$valuee = [
					'id'		=> $rand,
					'bom_code'	=> 'B-'.$rand,
					'title'	=> 'BOM for '.$key
				];
				$bomlar[$key] = $valuee;
			}

			foreach($bomlar as $key => $value) {
				Boms::create($value);
			}

			# Ürün Ağacı aşağıdaki gibi olacaktır.
			# A1 => B2, C3
			# B1 => D2, E4, F4
			# C1 => G1, F3
			# G1 => H2, J3, K5
			# K1 => L1, M3
			# D1 => N3, O4
			# E1 => P1, R3
			$BomNeededParts = [
				[
					'bom'	=> 'A',
					'item'	=> 'B',
					'adet'	=> 2
				],
				[
					'bom'	=> 'A',
					'item'	=> 'C',
					'adet'	=> 3
				],
				[
					'bom'	=> 'B',
					'item'	=> 'D',
					'adet'	=> 2
				],
				[
					'bom'	=> 'B',
					'item'	=> 'E',
					'adet'	=> 4
				],
				[
					'bom'	=> 'B',
					'item'	=> 'F',
					'adet'	=> 4
				],
				[
					'bom'	=> 'C',
					'item'	=> 'G',
					'adet'	=> 1
				],
				[
					'bom'	=> 'C',
					'item'	=> 'F',
					'adet'	=> 3
				],
				[
					'bom'	=> 'G',
					'item'	=> 'H',
					'adet'	=> 2
				],
				[
					'bom'	=> 'G',
					'item'	=> 'J',
					'adet'	=> 3
				],
				[
					'bom'	=> 'G',
					'item'	=> 'K',
					'adet'	=> 5
				],
				[
					'bom'	=> 'K',
					'item'	=> 'L',
					'adet'	=> 1
				],
				[
					'bom'	=> 'K',
					'item'	=> 'M',
					'adet'	=> 3
				],
				[
					'bom'	=> 'D',
					'item'	=> 'N',
					'adet'	=> 3
				],
				[
					'bom'	=> 'D',
					'item'	=> 'O',
					'adet'	=> 4
				],
				[
					'bom'	=> 'E',
					'item'	=> 'P',
					'adet'	=> 1
				],
				[
					'bom'	=> 'E',
					'item'	=> 'R',
					'adet'	=> 3
				],
			];

			$eklenecekBomNeededParts = [];
			foreach ($BomNeededParts as $e) {
				$rand = rand(1, 99999999);
				$eklenecekBomNeededParts[] = [
					'id' => $rand,
					'bom_id' => $bomlar[$e['bom']]['id'],
					'part_id' => $Parts[$e['item']]['id'],
					'quantity' => $e['adet']
				];
			}

			foreach ($eklenecekBomNeededParts as $e) {
				BomNeededParts::create($e);
			}
			# Üretim sonucu oluşanlar
			# A => S, T
			# C => V, Y, Z
			# E => X
			$bomSonucuOlusacaklar = [
				[
					'bom' 	=> 'A',
					'item'	=> 'S'
				],
				[
					'bom' 	=> 'A',
					'item'	=> 'T'
				],
				[
					'bom' 	=> 'C',
					'item'	=> 'V'
				],
				[
					'bom' 	=> 'C',
					'item'	=> 'Y'
				],
				[
					'bom' 	=> 'C',
					'item'	=> 'Z'
				],
				[
					'bom' 	=> 'E',
					'item'	=> 'X'
				]
			];

			$eklenecekBomSonucuOlusanlar = [];
			foreach ($bomSonucuOlusacaklar as $e) {
				$rand = rand(1, 99999999);
				$eklenecekBomSonucuOlusanlar[] = [
					'id' => $rand,
					'bom_id' => $bomlar[$e['bom']]['id'],
					'part_id' => $Parts[$e['item']]['id']
				];
			}

			foreach ($eklenecekBomSonucuOlusanlar as $e){
				BomComposedParts::create($e);
			}
			# A1 => B2, C3
			# B1 => D2, E4, F4
			# C1 => G1, F3
			# G1 => H2, J3, K5
			# K1 => L1, M3
			# D1 => N3, O4
			# E1 => P1, R3
			$Routes = [
				'A' => [],
				'B' => [],
				'C' => [],
				'G' => [],
				'D' => [],
				'E' => []
			];

			foreach ($Routes as $k => $e) {
				$rand = rand(1, 99999999);
				$ee = [
					'id' => $rand,
					'route_code' => 'R-'.$rand,
					'title' => 'Rota for '.$k
				];
				$Routes[$k] = $ee;
			}

			foreach($Routes as $k => $e) {
				Routes::create($e);
			}
			foreach($Routes as $k => $e) {
				$vv = [
					'id' => rand(1,99999999),
					'bom_id' => $bomlar[$k]['id'],
					'route_id' => $Routes[$k]['id'],
					'default' => 2
				];
				BomRoute::create($vv);
			}
			foreach ($bomlar as $k => $e) {
				$vvv = [
					'id' => rand(1, 99999999),
					'part_id' => $Parts[$k]['id'],
					'bom_id' => $e['id'],
					'default' => 2
				];
				PartBom::create($vvv);
			}
			$RouteDetails = [
				[ 'rota' => 'A', 'islem' => 'İşlem 1' ],
				[ 'rota' => 'A', 'islem' => 'İşlem 2' ],
				[ 'rota' => 'A', 'islem' => 'İşlem 3' ],
				[ 'rota' => 'B', 'islem' => 'İşlem 4' ],
				[ 'rota' => 'C', 'islem' => 'İşlem 5' ],
				[ 'rota' => 'C', 'islem' => 'İşlem 6' ],
				[ 'rota' => 'G', 'islem' => 'İşlem 7' ],
				[ 'rota' => 'G', 'islem' => 'İşlem 8' ],
				[ 'rota' => 'G', 'islem' => 'İşlem 9' ],
				[ 'rota' => 'G', 'islem' => 'İşlem 10' ],
				[ 'rota' => 'D', 'islem' => 'İşlem 11' ],
				[ 'rota' => 'D', 'islem' => 'İşlem 12' ],
				[ 'rota' => 'E', 'islem' => 'İşlem 13' ],
				[ 'rota' => 'E', 'islem' => 'İşlem 14' ]
			];

			foreach ($RouteDetails as $e) {
				$vvvv = [
					'id' => rand(1, 99999999),
					'route_id' => $Routes[$e['rota']]['id'],
					'operation' => $e['islem'] . ' for '. $e['rota']
				];
				RouteDetails::create($vvvv);
			}


			$lotlar = [];
			for ($i=0;$i<$lotSayisi;$i++) {
				$rand = rand(1, 99999999);
				$veriler = [
					'id' => $rand,
					'lot_code' => 'L-'.$rand,
					'part_id' => array_column($Parts, 'id')[rand(0, count($Parts)-1)],
					'quantity' => $adetler[rand(0, count($adetler)-1)]
				];
				$lotlar[] = $veriler;
				Lots::create($veriler);
			}

			$emirler = [];
			for ($i=0;$i<$emirSayisi;$i++) {
				$rand = rand(1, 99999999);
				$okunakli = [
					'id' => $rand,
					'production_order_code'	=> 'E-'.$rand,
					'quantity'		=> $adetler[rand(0, count($adetler)-1)],
					'part_id' => $Parts[array_rand($bomlar, 1)]['id']
				];
				$emirler[] = $okunakli;
				ProductionOrders::create($okunakli);
			}

			foreach(ProductionOrders::all() as $emem) {
				PredefineProductionOrder::fire($emem['id']);
			}


			$toplamGirdi = DB::select('SELECT SUM(TABLE_ROWS) as toplam
	 FROM INFORMATION_SCHEMA.TABLES 
	 WHERE TABLE_SCHEMA = "fuar"');

			$end = microtime(true);
			$farki = $end-$start;
			$dakika = floor($farki/60);
			if ($farki<60) $saniye = $farki; else $saniye = $farki%60;
		}
	}
