<?php

	namespace Zahmetsizce\Production\Parts;

	use Zahmetsizce\General\General;

	use Zahmetsizce\General\Modification;
	use Zahmetsizce\General\Validation;
	use Zahmetsizce\General\SetData;

	use Zahmetsizce\Facades\Boms;
	use Zahmetsizce\Facades\PartBom;

	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;

	/**
	 * Parçalarla ilgili işlemleri yapan sınıf
	 */
	class Parts extends Model
	{

		use Modification, Validation, SetData, SoftDeletes;

		protected $table = 'parts';

		protected $primaryKey = 'id';

		protected $fillable = [ 'id', 'part_code', 'title' ];

		public $timestamps = true;

		protected $dates = [ 'created_at', 'updated_at', 'deleted_at' ];

		/**
		 * Yeni parça için gerekli olan ürün ağaçlarını dönderen method
		 * 
		 * @return Collection
		 */
		public function getBomsForNewOrEditNewPart()
		{
			return Boms::all();
		}

		/**
		 * Parçayı kaydetmeye yarayan method
		 * 
		 * @return Collection
		 */
		public function store()
		{
			$id = parent::create($this->data);

			if ($this->data['default_bom']!='' AND $this->data['default_bom']!='0') {
				PartBom::create([
					'part_id'	=> $id['id'],
					'bom_id'	=> $this->data['default_bom'],
					'default'	=> 2
				]);
			}

			return true;
		}

		public function updation()
		{
			return parent::find($this->whichOne)->update($this->data);
		}

		public function getBomlar()
		{
			return $this->hasMany('Zahmetsizce\Production\PartBomRoute\PartBom', 'part_id', 'id');
		}

		public function getToplam()
		{
			return $this->hasOne('Zahmetsizce\Inventory\Lots', 'part_id', 'id')
						->selectRaw('SUM(`lots`.`quantity`) as sumOf');
		}

	}
