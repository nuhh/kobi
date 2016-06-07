<?php

	namespace Zahmetsizce\Production\Boms\Details;

	use Zahmetsizce\General\General;

	use Zahmetsizce\General\Modification;
	use Zahmetsizce\General\SetData;
	use Zahmetsizce\General\Validation;

	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;

	/**
	 * Ürün ağacında gerekli olan parçalarla ilgilenen sınıf
	 */
	class BomNeededParts extends Model
	{
		use Modification, SetData, Validation, SoftDeletes;

		protected $table = 'bom_needed_parts';

		protected $primaryKey = 'id';

		protected $fillable = [ 'id', 'bom_id', 'part_id', 'quantity' ];

		public $timestamps = true;

		protected $dates = [ 'created_at', 'updated_at', 'deleted_at' ];

		/**
		 * Ürün ağacı gerekli olan parça eklemeye yarayan method
		 * 
		 * @return boolean
		 */
		public function creation()
		{
			/*$veriler = [
				'bom_id'	=> $bomId,
				'part_id'	=> Input::get('partId'),
				'quantity'	=> Input::get('quantity')
			];*/

			$this->rules = [
				'quantity'	=> 'required|numeric|min:0',
				'part_id'	=> 'required'
			];

			$this->attributeNames = [
				'quantity'	=> 'Adet',
				'part_id'	=> 'Parça'
			];

			$this->validate();

			if ($this->validation->fails()) {
				return false;
			} else {
				self::create($this->data);

				return true;
			}
		}

		/**
		 * Gerekli parçayı düzenlemeye yarayan method
		 * 
		 * @return boolean
		 */
		public function updation()
		{
			/*$veriler = [
				'part_id'	=> Input::get('partId'),
				'quantity'	=> Input::get('quantity')
			];*/

			$this->rules = [
				'quantity'	=> 'required|numeric|min:0',
				'part_id'	=> 'required'
			];

			$this->attributeNames = [
				'quantity'	=> 'Adet',
				'part_id'	=> 'Parça'
			];

			$this->validate();

			if ($this->validation->fails()) {
				return false;
			} else {
				parent::find($this->whichOne)->update($this->data);

				return true;
			}
		}

		public function getPart()
		{
			return $this->hasOne('Zahmetsizce\Production\Parts\Parts', 'id', 'part_id');
		}
	}
