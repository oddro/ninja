<?php
class General extends Elegant\Model {

  	/* device variable statis for table*/
	public static $table;

	/* construct function for contentGeneral table */
	public static function constructor ($ctable){
		self::$table = $ctable;

		$generalModel = new General;

		return $generalModel;
	}
}