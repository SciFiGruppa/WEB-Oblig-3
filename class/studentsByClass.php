<?php
	
class studentsByClass {

	private $_classStudents,
			$_classCode,
			$_dbh;

	/**
	 * @param string $klassekode
	 * @return array $return
	 */
	public function __construct ($klassekode, $db) {
		if ($this->validateClassCode($klassekode)) {

			$this->_classCode = $klassekode;
			$this->_dbh = $db;

			$this->getStudentsByClassCode($this->_classCode);

			return $_classStudents;
		}
	}

	/**
	 * @param string $cc (klassekode)
	 */
	private function getStudentsByClassCode($cc) {
		$sql = "";
	}

	/**
	 * @param string $cc (klassekode)
	 * @return boolean
	 */

	private function validateClassCode ($cc) {
        $cc = strtoupper(trim(strip_tags($cc)));
        return (strlen($cc) == 3 && ctype_digit(substr($cc, -1))) ? true : false;
    }
}