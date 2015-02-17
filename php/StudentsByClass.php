<?php
class StudentsByClass {

	private $_classStudents = array(),
			$_classCode,
			$_dbh;

	public $result;

	/**
	 * @param string $klassekode
	 * @return array $return
	 */
	public function __construct ($klassekode, $db) {
		if ($this->validateClassCode($klassekode)) {

			$this->_classCode = $klassekode;
			$this->_dbh = $db;

			$this->getStudentsByClassCode($this->_classCode);
		}

		return false;
	}

	/**
	 * @param string $cc (klassekode)
	 */
	private function getStudentsByClassCode($cc) {
		$sql = "SELECT student.fornavn, student.etternavn
				FROM student
				WHERE student.klassekode = ?";
		if ($stmt = mysqli_prepare($this->_dbh, $sql)) {

			mysqli_stmt_bind_param($stmt, 's', $cc);
			mysqli_stmt_execute($stmt);

			mysqli_stmt_bind_result($stmt, $fn, $ln);

			while (mysqli_stmt_fetch($stmt)) {
				$this->_classStudents[] = $fn . " " . $ln;
			}

			mysqli_stmt_close($stmt);

			$this->result = $this->_classStudents;
		}
	}

	/**
	 * @param string $cc (klassekode)
	 * @return boolean
	 */

	private function validateClassCode ($cc) {
        $cc = strtoupper(trim(strip_tags($cc)));
        return (strlen($cc) >= 3 && ctype_digit(substr($cc, -1))) ? true : false;
    }
}