<?php

	namespace Zahmetsizce\Manufacturing;

	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;

	class ProductionOrderRotations extends Model {

		protected $table = 'production_order_rotations';

		protected $primaryKey = 'id';

		protected $fillable = [ 'id', 'production_order_id', 'part_id', 'status', 'operation' ];

		public $timestamps = true;

		use SoftDeletes;

		protected $dates = [ 'created_at', 'updated_at', 'deleted_at' ];

		public function getPart()
		{
			return $this->hasOne('Zahmetsizce\Production\Parts\Parts', 'id', 'part_id');
		}
		
	}
