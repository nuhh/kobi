<?php

	namespace Zahmetsizce\Production\Routes;

	use Zahmetsizce\General\General;

	use Zahmetsizce\General\Modification;
	use Zahmetsizce\General\SetData;
	use Zahmetsizce\General\Validation;

	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;

	/**
	 * Rotasyon detayları ile ilgili işlemleri yürüten sınıf
	 */
	class RouteDetails extends Model
	{
		use SetData, Validation, Modification, SoftDeletes;

		protected $table = 'route_details';

		protected $primaryKey = 'id';

		protected $fillable = [ 'id', 'route_id', 'operation' ];

		public $timestamps = true;

		protected $dates = [ 'created_at', 'updated_at', 'deleted_at' ];
		/**
		 * Rotasyon detayı kayıt eden method
		 * 
		 * @return Collection
		 */
		public function store()
		{
			return self::create($this->data);
		}

		/**
		 * Rotasyon detayını düzenlemeye yarayan method
		 * 
		 * @return Collection
		 */
		public function updation()
		{
			return parent::find($this->whichOne)->update($this->data);
		}

		/**
		 * Rotasyon detayı silmeye yarayan method
		 * 
		 * @return boolean
		 */
		public function wipe()
		{
			return TableRouteDetails::find($this->which)->delete();
		}
	}
