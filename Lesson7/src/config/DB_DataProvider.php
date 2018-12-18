<?php

class DB_DataProvider
{
	/**
	 * @var Connection;
	 */
	private $_connection;
	private  $_table;

	function __construct($connection, $table) {
		$this->_connection = $connection;
		$this->_table = $table;
	}

	public function addItem($fieldsArray) {
		$fieldsString = $this->formQueryFields($fieldsArray);
		$valuesString = $this->formQueryValues($fieldsArray);

		$query = "INSERT INTO {$this->_table} ({$fieldsString}) VALUES ({$valuesString})";
		$this->_connection->sendQuery($query);
	}

	public function getItemByID($id, $fieldsArray = ['*' => '*']) {
		return $this->getItemsByField('id', $id, $fieldsArray)[0];
	}

	public function getItemsByField($fieldName, $fieldValue, $fieldsArray = ['*' => '*']) {
		$fieldsString = $this->formQueryFields($fieldsArray);
		$itemQuery = "SELECT {$fieldsString} FROM {$this->_table} WHERE {$fieldName} = '{$fieldValue}'";
		return mysqli_fetch_all($this->_connection->sendQuery($itemQuery), MYSQLI_ASSOC);
	}

	public function updateRecordById($id, $fieldName, $fieldValue) {
		$updQuery = "UPDATE {$this->_table} SET {$fieldName} = {$fieldValue} WHERE id = {$id}";
		$this->_connection->sendQuery($updQuery);
	}

	public function checkIfRecordExists($fieldName, $fieldValue) {
		return count($this->getItemsByField($fieldName, $fieldValue)) > 0;
	}

	public function getAllRecords($filter = '1', $fieldsArray = ['*' => '*'], $orderField = '1', $isAsc = true) {
		$fieldsString = $this->formQueryFields($fieldsArray);
		$query = "SELECT {$fieldsString} FROM {$this->_table} WHERE {$filter} ORDER BY {$orderField} " . ($isAsc ? "ASC" : "DESC");
		$result = $this->_connection->sendQuery($query);

		return $result ? mysqli_fetch_all ($result, MYSQLI_ASSOC) : [];
	}

	protected function formQueryFields($fieldsArray) {
		return implode(", ", array_keys($fieldsArray));
	}

	protected function formQueryValues($fieldsArray = ['*' => '*']) {
		$valuesString = array_values($fieldsArray);

		// for all array elements - stringify values and add commas
		array_walk(
			$valuesString,
			function (&$item, $key) {
				$item = "'" . DB_DataProvider::stringify($item) . "'";
			});
		return implode(", ", array_values($valuesString));
	}

	public static function stringify($str){
		return mysqli_real_escape_string(connect(), strip_tags(trim($str)));
	}
}
