<?php

	namespace Zahmetsizce\Inventory;

	use Zahmetsizce\General\General;

	use Zahmetsizce\General\Modification;
	use Zahmetsizce\General\SetData;
	use Zahmetsizce\General\Validation;

	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;

	/**
	 * Depo işlemlerini yapan sınıf
	 */
	class Lots extends Model
	{
		use SetData, Validation, Modification, SoftDeletes;

		protected $table = 'lots';

		protected $primaryKey = 'id';

		protected $fillable = [ 'id', 'lot_code', 'part_id', 'quantity' ];

		public $timestamps = true;

		protected $dates = [ 'created_at', 'updated_at', 'deleted_at' ];

		/**
		 * Yeni lot için gerekli olan parçaları dönderen method
		 *
		 * @todo   İlerki versiyonlarda parçalar için depolanabilir seçeneği olabilir
		 * @return Collection
		 */
		public function getPartsForNewLot()
		{
			return TableParts::all();
		}

		/**
		 * Lotu kaydeden method
		 * 
		 * @return Collection
		 */
		public function store()
		{
			return self::create($this->data);
		}

		/**
		 * Lotu getiren method
		 * 
		 * @return Collection
		 */
		public function take()
		{
			return TableLots::find($this->whichOne);
		}

		/**
		 * Lotu silmeye yarayan method
		 * 
		 * @return boolean
		 */
		public function wipe()
		{
			return TableLots::find($this->whichOne)->delete();
		}

		/**
		 * Depoyu dönderen method
		 * 
		 * @return Collection
		 */
		public function inventoryData()
		{
			return self::selectRaw('*, sum(`quantity`) as sumOf')
							->groupBy('part_id')
							->get();
		}

		/**
		 * Parçaya ait lotları dönderen method
		 * 
		 * @param  string $partId Parça ID değeri
		 * @return Collection
		 */
		public function lotsOfPart($partId)
		{
			return self::where('part_id', $partId)->get();
		}

		public function getPart()
		{
			return $this->hasOne('Zahmetsizce\Production\Parts\Parts', 'id', 'part_id');
		}
	}
