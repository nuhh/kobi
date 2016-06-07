<?php

	namespace Zahmetsizce\Commands;

	use Illuminate\Support\Facades\Schema;
	use Illuminate\Support\Facades\DB;

	use Zahmetsizce\General\General;

	/**
	 * Veritabanı kurulumunu yapan sınıfı
	 */
	class SetupDatabase extends General
	{
		/**
		 * Sınıfın ana methodu
		 *
		 * @return boolean Eğer yükleme başarıyla tamamlanırsa true
		 *         hata olursa false
		 */
		public function fire()
		{
			$tables = [
				'parts',
				'lots',
				'boms',
				'part_bom',
				'bom_composed_parts',
				'bom_needed_parts',
				'routes',
				'bom_route',
				'route_details',
				'production_orders',
				'production_order_needed_parts',
				'production_order_composed_parts',
				'production_order_rotations'
			];

			$work = true;

			foreach($tables as $table) {
				if(Schema::hasTable($table)) {
					$work = false;
					break;
				}
			}

			if($work) {
				Schema::create('parts', function($table){
					$table->increments('id');
					$table->string('part_code', 16);
					$table->string('title', 128);
					$table->timestamps();
					$table->softDeletes();
				});

				Schema::create('lots', function($table) {
					$table->increments('id');
					$table->string('lot_code', 16);
					$table->integer('part_id');
					$table->decimal('quantity', 65, 5);
					$table->timestamps();
					$table->softDeletes();
				});


				Schema::create('boms', function($table) {
					$table->increments('id');
					$table->string('bom_code', 16);
					$table->string('title', 64);
					$table->timestamps();
					$table->softDeletes();
				});

				Schema::create('part_bom', function($table) {
					$table->increments('id');
					$table->integer('part_id');
					$table->integer('bom_id');
					$table->tinyInteger('default')->default('1');
					$table->timestamps();
					$table->softDeletes();
				});

				Schema::create('bom_composed_parts', function($table) {
					$table->increments('id');
					$table->integer('bom_id');
					$table->integer('part_id');
					$table->timestamps();
					$table->softDeletes();
				});

				Schema::create('bom_needed_parts', function($table) {
					$table->increments('id');
					$table->integer('bom_id');
					$table->integer('part_id');
					$table->decimal('quantity', 65, 5);
					$table->timestamps();
					$table->softDeletes();
				});

				Schema::create('routes', function($table) {
					$table->increments('id');
					$table->string('route_code', 16);
					$table->string('title', 64);
					$table->timestamps();
					$table->softDeletes();
				});

				Schema::create('bom_route', function($table) {
					$table->increments('id');
					$table->integer('bom_id');
					$table->integer('route_id');
					$table->tinyInteger('default')->default('1');
					$table->timestamps();
					$table->softDeletes();
				});

				Schema::create('route_details', function($table) {
					$table->increments('id');
					$table->integer('route_id');
					$table->string('operation', 128);
					$table->timestamps();
					$table->softDeletes();
				});

				Schema::create('production_orders', function($table) {
					$table->increments('id');
					$table->string('production_order_code', 16);
					$table->integer('part_id');
					$table->decimal('quantity', 65, 5);
					$table->tinyInteger('status');
					$table->timestamps();
					$table->softDeletes();
				});

				Schema::create('production_order_needed_parts', function($table) {
					$table->increments('id');
					$table->integer('production_order_id');
					$table->integer('part_id');
					$table->decimal('quantity', 65, 5);
					$table->decimal('reserved', 65, 5);
					$table->decimal('remainder', 65, 5);
					$table->integer('upper_part_id');
					$table->decimal('coefficient', 65, 5);
					$table->tinyInteger('is_lower_part');
					$table->timestamps();
					$table->softDeletes();
				});

				Schema::create('production_order_composed_parts', function($table) {
					$table->increments('id');
					$table->integer('production_order_id');
					$table->integer('part_id');
					$table->decimal('quantity', 65, 5);
					$table->timestamps();
					$table->softDeletes();
				});

				Schema::create('production_order_rotations', function($table) {
					$table->increments('id');
					$table->integer('production_order_id');
					$table->integer('part_id');
					$table->tinyInteger('status');
					$table->string('operation', 128);
					$table->timestamps();
					$table->softDeletes();
				});
			}

			return $work;
		}
	}
