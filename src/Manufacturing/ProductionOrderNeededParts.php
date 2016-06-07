<?php

	namespace Zahmetsizce\Manufacturing;

	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;

	class ProductionOrderNeededParts extends Model {

		protected $table = 'production_order_needed_parts';

		protected $primaryKey = 'id';

		protected $fillable = [ 'id', 'production_order_id', 'part_id', 'quantity', 'reserved', 'remainder', 'upper_part_id', 'coefficient', 'is_lower_part' ];

		public $timestamps = true;

		use SoftDeletes;

		protected $dates = [ 'created_at', 'updated_at', 'deleted_at' ];

		public function scopeEmirId($query, $type)
		{
			return $query->where('production_order_id', $type);
		}

		public function scopeItemId($query, $type)
		{
			return $query->where('upper_part_id', $type);
		}

		public function getEmir()
		{
			return $this->hasOne('Zahmetsizce\Manufacturing\ProductionOrders', 'id', 'production_order_id');
		}

		public function getPart()
		{
			return $this->hasOne('Zahmetsizce\Production\Parts\Parts', 'id', 'part_id');
		}

		public function getUstItem()
		{
			return $this->hasOne('Zahmetsizce\Production\Parts\Parts', 'id', 'upper_part_id');
		}

		public function getUygunLotlar()
		{
			return $this->hasMany('Zahmetsizce\Inventory\Lots', 'part_id', 'part_id')
						->where('quantity', '>', 0);
		}
	}
