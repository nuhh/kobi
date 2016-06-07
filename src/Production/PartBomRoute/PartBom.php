<?php

	namespace Zahmetsizce\Production\PartBomRoute;

	use Zahmetsizce\General\General;

	use Zahmetsizce\General\Modification;
	use Zahmetsizce\General\SetData;
	use Zahmetsizce\General\Validation;

	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\SoftDeletes;

	class PartBom extends Model
	{
		use SetData, Validation, Modification, SoftDeletes;

		protected $table = 'part_bom';

		protected $primaryKey = 'id';

		protected $fillable = [ 'id', 'part_id', 'bom_id', 'default' ];

		public $timestamps = true;

		protected $dates = [ 'created_at', 'updated_at', 'deleted_at' ];

		public function store()
		{
			return self::create($this->data);
		}

		public function removeBomFromPart($TablePartBomId)
		{
			TablePartBom::find($TablePartBomId)->delete();
		}

		public function makeFreeDefaultBomForPart($partId)
		{
			TablePartBom::where('part_id', $partId)->update(['default'=>1]);
		}

		public function makeBomDefaultForPart($partId, $bomId)
		{
			$this->makeFreeDefaultBomForPart($partId);

			TablePartBom::where('part_id', $partId)->where('bom_id', $bomId)->first()->update(['default', 2]);
		}

		public function removeDefaultBomFromPart($partId, $bomId)
		{
			$this->makeFreeDefaultBomForPart($partId);
		}

		public function getItem()
		{
			return $this->hasOne('Zahmetsizce\Production\Parts\Parts', 'id', 'part_id');
		}

		public function getBom()
		{
			return $this->hasOne('Zahmetsizce\Production\Boms\Boms', 'id', 'bom_id');
		}
	}