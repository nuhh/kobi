<?php

	namespace Zahmetsizce\Production\Routes;

	use Zahmetsizce\General\General;

	use Zahmetsizce\General\Modification;
	use Zahmetsizce\General\SetData;
	use Zahmetsizce\General\Validation;

	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;

	/**
	 * Rotasyonlarla ilgili işlemleri yapan method
	 */
	class Routes extends Model
	{
		use SetData, Validation, Modification;

		protected $table = 'routes';

		protected $primaryKey = 'id';

		protected $fillable = [ 'id', 'route_code', 'title' ];

		public $timestamps = true;

		protected $dates = [ 'created_at', 'updated_at', 'deleted_at' ];
		
		/**
		 * Rotasyonu kaydetmeye yarayan method
		 * 
		 * @return Collection
		 */
		public function store()
		{
			return self::create($this->data);
		}

		/**
		 * Rotasyonu güncellemeye yarayan method
		 * 
		 * @return Collection
		 */
		public function updation()
		{
			return self::find($this->whichOne)->update($this->data);
		}

		public function getRotaDetaylari()
		{
			return $this->hasMany('Zahmetsizce\Production\Routes\RouteDetails', 'route_id', 'id');
		}

		public function getTanimliBomlar()
		{
			return $this->hasMany('Zahmetsizce\Production\PartBomRoute\BomRoute', 'route_id', 'id');
		}

	}
