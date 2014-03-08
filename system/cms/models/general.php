<?php
class General extends Elegant\Model {

  	/* device variable statis for table*/
	protected $table;

	/* construct function for contentGeneral table */
	public static function constructor ($ctable) {
		$generalModel = new General;
		$generalModel->table = $ctable;
		return $generalModel;
	}
}