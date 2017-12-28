<?php
/**
 * Global model for using in this application
 * @package Model
 * @author Chivorn VANN
 * @version 1.0
 */
if (!defined('BASEPATH'))
	exit('Permission Denied!');

class Globals extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	//GROUP OF FUNCTIONS QUERY TO SELECT//

	/**
	 * Function select to get custom field from table
	 * @param $table the string parameter to select (required)
	 * @param $arr_fields the array parameter store the fields you would to select
	 * @param $limit the string parameter store the limit record select separated by , (optional)
	 * @param $sort the string parameter for sort record (optional)
	 * @return table object
	 * @example select('tbl_users',array('use_id','use_name'))
	 */
	public function select($table, $arr_fields = array(), $limit = NULL,$sort=NULL) {
		if (!is_array($arr_fields) || count($arr_fields) <= 0)
			return FALSE;
		$this -> db -> select(join(',', $arr_fields));
		if ($limit != NULL) {
			if (strpos($limit, ',')) {
				$arr_limit = explode(',', $limit);
				if (is_numeric($arr_limit[0]) && is_numeric($arr_limit[1])) {
					$this -> db -> limit($arr_limit[0], $arr_limit[1]);
				}
			} else {
				if (is_numeric($limit)) {
					$this -> db -> limit($limit);
				}
			}
		}
		if($sort!=NULL){
			$this->db->order_by($sort);
		}
		return $this -> db -> get($table);
	}

	/**
	 * Function select all from table
	 * @param $table the string parameter to select (required)
	 * @param $limit the string parameter store the limit record select separated by , (optional)
	 * @param $sort the string parameter for sort record (optional)
	 * @return table object
	 * @example select_all('tbl_users',10)
	 */
	public function select_all($table, $limit = NULL,$sort=NULL) {

		if ($limit != NULL) {
			if (strpos($limit, ',')) {
				$arr_limit = explode(',', $limit);
				if (is_numeric($arr_limit[0]) && is_numeric($arr_limit[1])) {
					$this -> db -> limit($arr_limit[0], $arr_limit[1]);
				}
			} else {
				if (is_numeric($limit)) {
					$this -> db -> limit($limit);
				}
			}
		}
		if($sort!=NULL){
			$this->db->order_by($sort);
		}
		return $this -> db -> get($table);
	}

	/**
	 * Function select all from table
	 * @param $table the string parameter to select (required)
	 * @param $arr_item_like the array parameter for search record (required)
	 * @param $limit the string parameter store the limit record select separated by , (optional)
	 * @param $sort the string parameter for sort record (optional)
	 * @return table object
	 * @example select_all('tbl_users',10)
	 */
	public function select_all_like($table, $arr_item_like=array(),$limit = NULL,$sort=NULL) {

		if (!is_array($arr_item_like) || count($arr_item_where) <= 0)
			return FALSE;
		foreach ($arr_item_like as $field => $value) {
			$this -> db -> like($field, $value);
		}

		if ($limit != NULL) {
			if (strpos($limit, ',')) {
				$arr_limit = explode(',', $limit);
				if (is_numeric($arr_limit[0]) && is_numeric($arr_limit[1])) {
					$this -> db -> limit($arr_limit[0], $arr_limit[1]);
				}
			} else {
				if (is_numeric($limit)) {
					$this -> db -> limit($limit);
				}
			}
		}
		if($sort!=NULL){
			$this->db->order_by($sort);
		}
		return $this -> db -> get($table);
	}



	/**
	 * Function select to get custom field from table
	 * @param $table the string parameter to select (required)
	 * @param $arr_fields the array parameter store the fields you would to select
	 * @param $arr_item_like the array parameter for search record (required)
	 * @param $limit the string parameter store the limit record select separated by , (optional)
	 * @param $sort the string parameter for sort record (optional)
	 * @return table object
	 * @example select('tbl_users',array('use_id','use_name'))
	 */
	public function select_fields_like($table, $arr_fields = array(),$arr_item_like=array(),$limit = NULL,$sort=NULL) {
		if (!is_array($arr_fields) || count($arr_fields) <= 0)
			return FALSE;
		$this -> db -> select(join(',', $arr_fields));

		if (!is_array($arr_item_like) || count($arr_item_where) <= 0)
			return FALSE;
		foreach ($arr_item_like as $field => $value) {
			$this -> db -> like($field, $value);
		}

		if ($limit != NULL) {
			if (strpos($limit, ',')) {
				$arr_limit = explode(',', $limit);
				if (is_numeric($arr_limit[0]) && is_numeric($arr_limit[1])) {
					$this -> db -> limit($arr_limit[0], $arr_limit[1]);
				}
			} else {
				if (is_numeric($limit)) {
					$this -> db -> limit($limit);
				}
			}
		}
		if($sort!=NULL){
			$this->db->order_by($sort);
		}
		return $this -> db -> get($table);
	}


	/**
	 * Function select join with inner, left, right
	 * @param $table the string parameter to select (required)
	 * @param $arr_join the multi-array dimention parameter to store the table that need to join and the fields need tobe reference on (required)
	 * @param $join_type the string parameter to specify the join type of sql join. Value only inner, left, right, and full (default null)
	 * @param $arr_item_like the array parameter store the where clause in this query (optional)
	 * @param $limit the string parameter store the limit record select separated by , (optional)
	 * @param $sort the string parameter for sort record (optional)
	 * @return table object
	 * @example select_join('tbl_contacts', array('tbl_users' => array('con_use_id' => 'use_id')),'inner',array('tbl_users.use_id' => 2),'30')
	 */
	public function select_join_like($table, $arr_join = array(), $join_type = NULL, $arr_item_like = array(),$arr_where = NULL, $limit = NULL,$sort=NULL) {
		if (!is_array($arr_join) || count($arr_join) <= 0)
			return FALSE;
		$this -> db -> from($table);
		//table need to join
		foreach ($arr_join as $table_join => $fields_join) {
			if (!is_array($fields_join))
				return FALSE;
			$field_left = '';
			$field_right = '';
			foreach ($fields_join as $field_l => $field_r) {
				$field_left = $field_l;
				$field_right = $field_r;
			}
			if ($join_type == NULL) {
				$this -> db -> join($table_join, $table . '.' . $field_left . '=' . $table_join . '.' . $field_right);
			} else {
				$this -> db -> join($table_join, $table . '.' . $field_left . '=' . $table_join . '.' . $field_right, $join_type);
			}
		}
		if (!is_array($arr_item_like) || count($arr_item_like) <= 0)
			return FALSE;
		foreach ($arr_item_like as $field => $value) {
			$this -> db -> like($field, $value);
		}

		if ($arr_where != NULL && is_array($arr_where)) {
			foreach ($arr_where as $fields => $value) {
				$this -> db -> where($fields, $value);
			}
		}
		if ($limit != NULL) {
			if (strpos($limit, ',')) {
				$arr_limit = explode(',', $limit);
				if (is_numeric($arr_limit[0]) && is_numeric($arr_limit[1])) {
					$this -> db -> limit($arr_limit[0], $arr_limit[1]);
				}
			} else {
				if (is_numeric($limit)) {
					$this -> db -> limit($limit);
				}
			}
		}
		if($sort!=NULL){
			$this->db->order_by($sort);
		}
		return $this -> db -> get();
		//return $this->db->last_query();
	}

	/**
	 * Function select join with inner, left, right
	 * @param $table the string parameter to select (required)
	 * @param $arr_fields the array parameter store the fields you would to select
	 * @param $arr_join the multi-array dimention parameter to store the table that need to join and the fields need tobe reference on (required)
	 * @param $join_type the string parameter to specify the join type of sql join. Value only inner, left, right, and full (default null)
	 * @param $arr_item_like the array parameter store the where clause in this query (optional)
	 * @param $limit the string parameter store the limit record select separated by , (optional)
	 * @param $sort the string parameter for sort record (optional)
	 * @return table object
	 * @example select_join('tbl_contacts', array('tbl_users' => array('con_use_id' => 'use_id')),'inner',array('tbl_users.use_id' => 2),'30')
	 */
	public function select_join_like_get_only_fields($table, $arr_fields = array(),$arr_join = array(), $join_type = NULL, $arr_item_like = array(),$arr_where=NULL, $limit = NULL,$sort=NULL) {

		if (!is_array($arr_fields) || count($arr_fields) <= 0)
			return FALSE;
		$this -> db -> select(join(',', $arr_fields));

		if (!is_array($arr_join) || count($arr_join) <= 0)
			return FALSE;
		$this -> db -> from($table);
		//table need to join
		foreach ($arr_join as $table_join => $fields_join) {
			if (!is_array($fields_join))
				return FALSE;
			$field_left = '';
			$field_right = '';
			foreach ($fields_join as $field_l => $field_r) {
				$field_left = $field_l;
				$field_right = $field_r;
			}
			if ($join_type == NULL) {
				$this -> db -> join($table_join, $table . '.' . $field_left . '=' . $table_join . '.' . $field_right);
			} else {
				$this -> db -> join($table_join, $table . '.' . $field_left . '=' . $table_join . '.' . $field_right, $join_type);
			}
		}
		if (!is_array($arr_item_like) || count($arr_item_like) <= 0)
			return FALSE;
		foreach ($arr_item_like as $field => $value) {
			$this -> db -> like($field, $value);
		}

		if ($arr_where != NULL && is_array($arr_where)) {
			foreach ($arr_where as $fields => $value) {
				$this -> db -> where($fields, $value);
			}
		}

		if ($limit != NULL) {
			if (strpos($limit, ',')) {
				$arr_limit = explode(',', $limit);
				if (is_numeric($arr_limit[0]) && is_numeric($arr_limit[1])) {
					$this -> db -> limit($arr_limit[0], $arr_limit[1]);
				}
			} else {
				if (is_numeric($limit)) {
					$this -> db -> limit($limit);
				}
			}
		}
		if($sort!=NULL){
			$this->db->order_by($sort);
		}
		return $this -> db -> get();
		//return $this->db->last_query();
	}
	/**
	 * Function select count record from table
	 * @param $table the string parameter to select (required)
	 * @return table number record of tables
	 * @example select_count_all('tbl_users')
	 *
	 */
	public function select_count($table) {
		$query= $this -> db -> get($table);
		return $query->num_rows();
	}



	/**
	 * Function select all from table with status
	 * @param $table the string parameter to select (required)
	 * @param $status the int parameter to set status (default 1)
	 * @param $limit the string parameter store the limit record select separated by , (optional)
	 * @param $sort the string parameter for sort record (optional)
	 * @return table object
	 * @example select_status('tbl_contacts');
	 */
	public function select_status($table, $status = 1, $limit = NULL,$sort=NULL) {
		$this -> db -> where('status', $status);
		if ($limit != NULL) {
			if (strpos($limit, ',')) {
				$arr_limit = explode(',', $limit);
				if (is_numeric($arr_limit[0]) && is_numeric($arr_limit[1])) {
					$this -> db -> limit($arr_limit[0], $arr_limit[1]);
				}
			} else {
				if (is_numeric($limit)) {
					$this -> db -> limit($limit);
				}
			}
		}
		if($sort!=NULL){
			$this->db->order_by($sort);
		}
		return $this -> db -> get($table);
	}

	/**
	 * Function select all from table with status
	 * @param $table the string parameter to select (required)
	 * @param $arr_fields the array parameter store the fields you would to select
	 * @param $status the int parameter to set status (default 1)
	 * @param $limit the string parameter store the limit record select separated by , (optional)
	 * @param $sort the string parameter for sort record (optional)
	 * @return table object
	 * @example select_status('tbl_contacts');
	 */
	public function select_field_where_status($table, $arr_fields = array(),$status = 1, $limit = NULL,$sort=NULL) {
		if (!is_array($arr_fields) || count($arr_fields) <= 0)
			return FALSE;
		$this -> db -> select(join(',', $arr_fields));

		$this -> db -> where('status', $status);
		if ($limit != NULL) {
			if (strpos($limit, ',')) {
				$arr_limit = explode(',', $limit);
				if (is_numeric($arr_limit[0]) && is_numeric($arr_limit[1])) {
					$this -> db -> limit($arr_limit[0], $arr_limit[1]);
				}
			} else {
				if (is_numeric($limit)) {
					$this -> db -> limit($limit);
				}
			}
		}
		if($sort!=NULL){
			$this->db->order_by($sort);
		}
		return $this -> db -> get($table);
	}

	/**
	 * Function select Where / Where And
	 * @param $table the string parameter to select (required)
	 * @param $arr_item_where the array parameter to store the where field comming with value. It's associative array (required)
	 * @param $limit the string parameter store the limit record select separated by , (optional)
	 * @param $sort the string parameter for sort record (optional)
	 * @return table object
	 * @example select_where('tbl_users',array('use_name' => 'vannak','use_password' => '12345'))
	 */
	public function select_where($table, $arr_item_where = array(), $limit = NULL,$sort=NULL) {
		if (!is_array($arr_item_where) || count($arr_item_where) <= 0)
			return FALSE;
		foreach ($arr_item_where as $field => $value) {
			$this -> db -> where($field, $value);
		}
		if ($limit != NULL) {
			if (strpos($limit, ',')) {
				$arr_limit = explode(',', $limit);
				if (is_numeric($arr_limit[0]) && is_numeric($arr_limit[1])) {
					$this -> db -> limit($arr_limit[0], $arr_limit[1]);
				}
			} else {
				if (is_numeric($limit)) {
					$this -> db -> limit($limit);
				}
			}
		}
		if($sort!=NULL){
			$this->db->order_by($sort);
		}
		return $this -> db -> get($table);
	}


	/**
	 * Function select Where / Where And
	 * @param $table the string parameter to select (required)
	 * @param $arr_fields the array parameter store the fields you would to select
	 * @param $arr_item_where the array parameter to store the where field comming with value. It's associative array (required)
	 * @param $limit the string parameter store the limit record select separated by , (optional)
	 * @param $sort the string parameter for sort record (optional)
	 * @return table object
	 * @example select_where('tbl_users',array('use_name' => 'vannak','use_password' => '12345'))
	 */
	public function select_field_where($table,  $arr_fields = array(),$arr_item_where = array(), $limit = NULL,$sort=NULL,$group_by=NULL) {

		if (!is_array($arr_fields) || count($arr_fields) <= 0)
			return FALSE;
		$this -> db -> select(join(',', $arr_fields));

		if (!is_array($arr_item_where) || count($arr_item_where) <= 0)
			return FALSE;
		foreach ($arr_item_where as $field => $value) {
			$this -> db -> where($field, $value);
		}
		if ($limit != NULL) {
			if (strpos($limit, ',')) {
				$arr_limit = explode(',', $limit);
				if (is_numeric($arr_limit[0]) && is_numeric($arr_limit[1])) {
					$this -> db -> limit($arr_limit[0], $arr_limit[1]);
				}
			} else {
				if (is_numeric($limit)) {
					$this -> db -> limit($limit);
				}
			}
		}
		if($group_by!=NULL){
			$this->db->group_by($group_by);
		}
		if($sort!=NULL){
			$this->db->order_by($sort);
		}
		return $this -> db -> get($table);
	}

	/**
	 * Function select_where_limit_one()
	 */
	public function select_where_limit_one($table, $arry_where = array()) {
		if (!is_array($arry_where) || count($arry_where) <= 0)
			return FALSE;
		foreach ($arry_where as $field => $value) {
			$this -> db -> where($field, $value);
		}
		$this -> db -> limit(1);
		$query_select = $this -> db -> get($table);
		return $query_select -> result_array();
	}

	/**
	 * Function select Where Or
	 * @param $table the string parameter to select (required)
	 * @param $arr_item_where the array parameter to store the where field comming with value. It's associative array (required)
	 * @param $limit the string parameter store the limit record select separated by , (optional)
	 * @param $sort the string parameter for sort record (optional)
	 * @return table object
	 * @example select_where_or('tbl_users',array('use_firstname' => 'vannak', 'use_lastname' => 'pen'), 30)
	 */
	public function select_where_or($table, $arr_item_where = array(), $limit = NULL,$sort=NULL) {
		if (!is_array($arr_item_where) || count($arr_item_where) <= 0)
			return FALSE;
		foreach ($arr_item_where as $field => $value) {
			$this -> db -> where_or($field, $value);
		}
		if ($limit != NULL) {
			if (strpos($limit, ',')) {
				$arr_limit = explode(',', $limit);
				if (is_numeric($arr_limit[0]) && is_numeric($arr_limit[1])) {
					$this -> db -> limit($arr_limit[0], $arr_limit[1]);
				}
			} else {
				if (is_numeric($limit)) {
					$this -> db -> limit($limit);
				}
			}
		}
		if($sort!=NULL){
			$this->db->order_by($sort);
		}
		return $this -> db -> get($table);
	}

	/**
	 * Function select Where Not In
	 * @param $table the string parameter to select (required)
	 * @param $arr_item_where the array parameter to store the where field comming with value. It's associative array (optional)
	 * @param $arr_item_no the array parameter to store the where field comming with value. Item value must be array. It's associative array (required)
	 * @param $limit the string parameter store the limit record select separated by , (optional)
	 * @param $sort the string parameter for sort record (optional)
	 * @return table object
	 * @example select_where('tbl_users',array('use_name' => 'vannak','use_password' => '12345'))
	 */
	public function select_where_not_in($table, $arr_item_not, $arr_item_where = array(), $limit = NULL,$sort=NULL) {
		if (!is_array($arr_item_not) || count($arr_item_not) == 0)
			return FALSE;
		if (count($arr_item_where) > 0) {
			foreach ($arr_item_where as $field => $value) {
				$this -> db -> where($field, $value);
			}
		}
		if (count($arr_item_not) > 0) {
			foreach ($arr_item_not as $field => $arr_value) {
				$this -> db -> where_not_in($field, $arr_value);
			}
		}
		if ($limit != NULL) {
			if (strpos($limit, ',')) {
				$arr_limit = explode(',', $limit);
				if (is_numeric($arr_limit[0]) && is_numeric($arr_limit[1])) {
					$this -> db -> limit($arr_limit[0], $arr_limit[1]);
				}
			} else {
				if (is_numeric($limit)) {
					$this -> db -> limit($limit);
				}
			}
		}
		if($sort!=NULL){
			$this->db->order_by($sort);
		}
		return $this -> db -> get($table);
	}

	/**
	 * Function select Where In
	 * @param $table the string parameter to select (required)
	 * @param $arr_item_where the array parameter to store the where field comming with value. It's associative array (optional)
	 * @param $arr_item_no the array parameter to store the where field comming with value. Item value must be array. It's associative array (required)
	 * @param $limit the string parameter store the limit record select separated by , (optional)
	 * @param $sort the string parameter for sort record (optional)
	 * @return table object
	 * @example select_where_in('tbl_ills_items',array('ill_id' => array(1,2,3,4)))
	 */
	public function select_where_in($table, $arr_item_in, $arr_item_where = array(), $limit = NULL,$sort=NULL) {
		if (!is_array($arr_item_in) || count($arr_item_in) == 0)
			return FALSE;
		if (count($arr_item_where) > 0) {
			foreach ($arr_item_where as $field => $value) {
				$this -> db -> where($field, $value);
			}
		}
		if (count($arr_item_in) > 0) {
			foreach ($arr_item_in as $field => $arr_value) {
				$this -> db -> where_in($field, $arr_value);
			}
		}
		if ($limit != NULL) {
			if (strpos($limit, ',')) {
				$arr_limit = explode(',', $limit);
				if (is_numeric($arr_limit[0]) && is_numeric($arr_limit[1])) {
					$this -> db -> limit($arr_limit[0], $arr_limit[1]);
				}
			} else {
				if (is_numeric($limit)) {
					$this -> db -> limit($limit);
				}
			}
		}
		if($sort!=NULL){
			$this->db->order_by($sort);
		}
		return $this -> db -> get($table);
	}

	/**
	 * Function select join with inner, left, right
	 * @param $table the string parameter to select (required)
	 * @param $arr_join the multi-array dimention parameter to store the table that need to join and the fields need tobe reference on (required)
	 * @param $join_type the string parameter to specify the join type of sql join. Value only inner, left, right, and full (default null)
	 * @param $arr_where the array parameter store the where clause in this query (optional)
	 * @param $limit the string parameter store the limit record select separated by , (optional)
	 * @param $sort the string parameter for sort record (optional)
	 * @return table object
	 * @example select_join('tbl_contacts', array('tbl_users' => array('con_use_id' => 'use_id')),'inner',array('tbl_users.use_id' => 2),'30')
	 */
	public function select_join($table, $arr_join = array(), $join_type = NULL, $arr_where = NULL, $limit = NULL,$sort=NULL) {
		if (!is_array($arr_join) || count($arr_join) <= 0)
			return FALSE;
		$this -> db -> from($table);
		//table need to join
		foreach ($arr_join as $table_join => $fields_join) {
			if (!is_array($fields_join))
				return FALSE;
			$field_left = '';
			$field_right = '';
			foreach ($fields_join as $field_l => $field_r) {
				$field_left = $field_l;
				$field_right = $field_r;
			}
			if ($join_type == NULL) {
				$this -> db -> join($table_join, $table . '.' . $field_left . '=' . $table_join . '.' . $field_right);
			} else {
				$this -> db -> join($table_join, $table . '.' . $field_left . '=' . $table_join . '.' . $field_right, $join_type);
			}
		}
		if ($arr_where != NULL && is_array($arr_where)) {
			foreach ($arr_where as $fields => $value) {
				$this -> db -> where($fields, $value);
			}
		}
		if ($limit != NULL) {
			if (strpos($limit, ',')) {
				$arr_limit = explode(',', $limit);
				if (is_numeric($arr_limit[0]) && is_numeric($arr_limit[1])) {
					$this -> db -> limit($arr_limit[0], $arr_limit[1]);
				}
			} else {
				if (is_numeric($limit)) {
					$this -> db -> limit($limit);
				}
			}
		}
		if($sort!=NULL){
			$this->db->order_by($sort);
		}
		return $this -> db -> get();
		//return $this->db->last_query();
	}


	/**
	 * Function select join with inner, left, right
	 * @param $table the string parameter to select (required)
	 * @param $arr_fields the array parameter store the fields you would to select
	 * @param $arr_join the multi-array dimention parameter to store the table that need to join and the fields need tobe reference on (required)
	 * @param $join_type the string parameter to specify the join type of sql join. Value only inner, left, right, and full (default null)
	 * @param $arr_where the array parameter store the where clause in this query (optional)
	 * @param $limit the string parameter store the limit record select separated by , (optional)
	 * @param $sort the string parameter for sort record (optional)
	 * @return table object
	 * @example select_join('tbl_contacts', array('tbl_users' => array('con_use_id' => 'use_id')),'inner',array('tbl_users.use_id' => 2),'30')
	 */
	public function select_join_get_only_fields($table, $arr_fields = array(),$arr_join = array(), $join_type = NULL, $arr_where = NULL, $limit = NULL,$sort=NULL) {

		if (!is_array($arr_fields) || count($arr_fields) <= 0)
			return FALSE;
		$this -> db -> select(join(',', $arr_fields));

		if (!is_array($arr_join) || count($arr_join) <= 0)
			return FALSE;
		$this -> db -> from($table);
		//table need to join
		foreach ($arr_join as $table_join => $fields_join) {
			if (!is_array($fields_join))
				return FALSE;
			$field_left = '';
			$field_right = '';
			foreach ($fields_join as $field_l => $field_r) {
				$field_left = $field_l;
				$field_right = $field_r;
			}
			if ($join_type == NULL) {
				$this -> db -> join($table_join, $table . '.' . $field_left . '=' . $table_join . '.' . $field_right);
			} else {
				$this -> db -> join($table_join, $table . '.' . $field_left . '=' . $table_join . '.' . $field_right, $join_type);
			}
		}
		if ($arr_where != NULL && is_array($arr_where)) {
			foreach ($arr_where as $fields => $value) {
				$this -> db -> where($fields, $value);
			}
		}
		if ($limit != NULL) {
			if (strpos($limit, ',')) {
				$arr_limit = explode(',', $limit);
				if (is_numeric($arr_limit[0]) && is_numeric($arr_limit[1])) {
					$this -> db -> limit($arr_limit[0], $arr_limit[1]);
				}
			} else {
				if (is_numeric($limit)) {
					$this -> db -> limit($limit);
				}
			}
		}
		if($sort!=NULL){
			$this->db->order_by($sort);
		}
		return $this -> db -> get();
		//return $this->db->last_query();
	}


	/**
	 * Function select join with inner, left, right
	 * @param $table the string parameter to select (required)
	 * @param $arr_join the multi-array dimention parameter to store the table that need to join and the fields need tobe reference on (required)
	 * @param $join_type the string parameter to specify the join type of sql join. Value only inner, left, right, and full (default null)
	 * @param $arr_where the array parameter store the where clause in this query (optional)
	 * @param $limit the string parameter store the limit record select separated by , (optional)
	 * @return number rows of result join
	 * @example select_join('tbl_contacts', array('tbl_users' => array('con_use_id' => 'use_id')),'inner',array('tbl_users.use_id' => 2),'30')
	 */
	public function select_join_count($table, $arr_join = array(), $join_type = NULL, $arr_where = NULL,$limit=NULL) {
		if (!is_array($arr_join) || count($arr_join) <= 0)
			return FALSE;
		$this -> db -> from($table);
		//table need to join
		foreach ($arr_join as $table_join => $fields_join) {
			if (!is_array($fields_join))
				return FALSE;
			$field_left = '';
			$field_right = '';
			foreach ($fields_join as $field_l => $field_r) {
				$field_left = $field_l;
				$field_right = $field_r;
			}
			if ($join_type == NULL) {
				$this -> db -> join($table_join, $table . '.' . $field_left . '=' . $table_join . '.' . $field_right);
			} else {
				$this -> db -> join($table_join, $table . '.' . $field_left . '=' . $table_join . '.' . $field_right, $join_type);
			}
		}
		if ($arr_where != NULL && is_array($arr_where)) {
			foreach ($arr_where as $fields => $value) {
				$this -> db -> where($fields, $value);
			}
		}

		if ($limit != NULL) {
			if (strpos($limit, ',')) {
				$arr_limit = explode(',', $limit);
				if (is_numeric($arr_limit[0]) && is_numeric($arr_limit[1])) {
					$this -> db -> limit($arr_limit[0], $arr_limit[1]);
				}
			} else {
				if (is_numeric($limit)) {
					$this -> db -> limit($limit);
				}
			}
		}

		$query= $this -> db -> get();
		return $query->num_rows();
		//return $this->db->last_query();
	}

	//GROUP OF FUNCTIONS QUERY TO INSERT//

	/**
	 * Function insert single record
	 * @param $table the string parameter of table name
	 * @param $arr_data the associative array parameter to store data to be inserted (required)
	 * @return boolean
	 * @example insert('tbl_users', array('use_name' => 'Vannak','use_sex' => 'm'))
	 */
	public function insert($table, $arr_data = array()) {
		if (!is_array($arr_data) || count($arr_data) <= 0)
			return FALSE;

		$this -> db -> insert($table, $arr_data);
		$isSaved=$this->db->affected_rows();
		if($isSaved){
			return TRUE;
		}else{
			return FALSE;
		}

	}

	/**
	 * Function insert single record with return last id
	 * @param $table the string parameter of table name
	 * @param $arr_data the associative array parameter to store data to be inserted (required)
	 * @return boolean
	 * @example insert('tbl_users', array('use_name' => 'Vannak','use_sex' => 'm'))
	 */
	public function insert_get_last_id($table, $arr_data = array()) {
		if (!is_array($arr_data) || count($arr_data) <= 0)
			return FALSE;
		$this -> db -> insert($table, $arr_data);
		return $this -> insert_id();
	}

	/**
	 * Function insert multiple record
	 * @param $table the string parameter of table name
	 * @param $arr_fields the numeric array parameter to store fields list to be inserted (required)
	 * @param $arr_data the numeric 2nd dimentional array parameter to store multiple data tobe inserted (required)
	 * @return boolean
	 * @example insert_multi('tbl_users', array('use_name','use_sex'), array(array('vannak','m'),array('sochy','m'), array('sophea','m')))
	 */
	public function insert_multi($table, $arr_fields = array(), $arr_data = array()) {
		if (!is_array($arr_fields) || !is_array($arr_data) || count($arr_fields) <= 0 || count($arr_data) <= 0)
			return FALSE;
		$batch_data = array();
		foreach ($arr_data as $datas) {
			$batch_list = array();
			if (is_array($datas)) {
				foreach ($datas as $key => $data) {
					$batch_list[$arr_fields[$key]] = $data;
				}
			}
			array_push($batch_data, $batch_list);
		}
		$this -> db -> insert_batch($table, $batch_data);
		$isSaved=$this->db->affected_rows();
		if($isSaved){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	/**
	 * Function insert multiple records only one field
	 * @param $table the string parameter of table name
	 * @param $arr_fields the numeric array parameter to store fields list to be inserted (required)
	 * @param $arr_data the numeric 2nd dimentional array parameter to store multiple data tobe inserted (required)
	 * @return boolean
	 * @example insert_multi('tbl_users', 'use_name', array('vannak','g1','sothorn'))
	 */
	public function insert_multi_one($table, $str_field = NULL, $arr_data = array()) {
		if ($str_field == NULL)
			return FALSE;
		$batch_data = array();
		foreach ($arr_data as $data) {
			array_push($batch_data, array($str_field => $data));
		}
		$this -> db -> insert_batch($table, $batch_data);
		$isSaved=$this->db->affected_rows();
		if($isSaved){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	//GROUP OF FUNCTIONS QUERY TO UPDATE//

	/**
	 * Function update single record
	 * @param $table the string parameter of table name
	 * @param $arr_data the associative array parameter to store multiple data to be updated (required)
	 * @param $arr_where the associative array parameter to store where clause (required)
	 * @return boolean
	 * @example update('tbl_users',array('use_name'=>'Vannak', 'sex'=>'m'),array('use_id'=>2))
	 */
	public function update($table, $arr_data = array(), $arr_where = array()) {
		if (!is_array($arr_data) || !is_array($arr_where) || count($arr_data) <= 0 || count($arr_where) <= 0)
			return FALSE;
		foreach ($arr_where as $field => $value) {
			$this -> db -> where($field, $value);
		}
		$this -> db -> update($table, $arr_data);
		$isUpdated=$this->db->affected_rows();
		if($isUpdated){
			return TRUE;
		}else{
			return FALSE;
		}

	}

	/**
	 * Function update multiple record
	 * @param $table the string parameter of table name
	 * @param $arr_data_multi the associative 3rd dimention array parameter to store multiple data with where clause to be updated (required)
	 * @return boolean
	 * @example update_multi('tbl_users',array(array(array('user' => 'vannak'),array('use_id' => 2)),array(array('use_name' => 'tola'),array('use_id' => 1))));
	 */
	public function update_multi($table, $arr_data_multi = array()) {
		if (!is_array($arr_data_multi) || count($arr_data_multi) <= 0)
			return FALSE;
		foreach ($arr_data_multi as $datas) {
			foreach ($datas[1] as $field => $value) {
				$this -> db -> where($field, $value);
			}
			$this -> db -> update($table, $datas[0]);
		}
		return TRUE;
	}

	//GROUP OF FUNCTIONS QUERY TO DELETE//

	/**
	 * Function delete single record with one or multiple where clause
	 * @param $table the string parameter of table name
	 * @param $arr_where the associative array parameter to store where clause to be deleted (required)
	 * @return boolean
	 * @example delete('tbl_users',array('use_id'=>2));
	 */
	public function delete($table, $arr_where = array()) {
		if (!is_array($arr_where) || count($arr_where) <= 0)
			return FALSE;
		foreach ($arr_where as $field => $value) {
			$this -> db -> where($field, $value);
		}
		$this -> db -> delete($table);
		$isDeleted=$this->db->affected_rows();
		if($isDeleted){
			return TRUE;
		}else{
			return FALSE;
		}

	}

	/**
	 * Function delete single record with one or multiple where clause
	 * @param $table the string parameter of table name
	 * @param $arr_where the associative multi-dimentional array parameter to store where clause to be deleted (required)
	 * @return boolean
	 * @example delete_multi('tbl_users',array('use_id'=>array(1,2,3,4,5,6,7)));
	 */
	public function delete_multi($table, $arr_where = array()) {
		if (!is_array($arr_where) || count($arr_where) <= 0)
			return FALSE;
		foreach ($arr_where as $field => $list) {
			$this -> db -> where_in($field, $list);
		}
		$this -> db -> delete($table);
		$isDeleted=$this->db->affected_rows();
		if($isDeleted){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	/**
	 * Function delete all record from one or multiple table(s)
	 * @param $arr_table the string/array parameter of table name
	 * @return boolean
	 * @example delete_all('tbl_users'); or delete_all(array('tbl_users','tbl_contacts'));
	 */
	public function delete_all($arr_table) {
		if (is_array($arr_table) and count($arr_table) > 0) {
			foreach ($arr_table as $table) {
				$this -> db -> empty_table($table);
			}
		} else {
			$this -> db -> empty_table($arr_table);
		}
		return TRUE;
	}

	/**
	 * Function truncate to reset the table data from one or more table
	 * @param $arr_table the string/array parameter of table name
	 * @return boolean
	 * @example truncate('tbl_users'); or truncate(array('tbl_users','tbl_contacts'));
	 */
	public function truncate($arr_table) {
		if (is_array($arr_table) and count($arr_table) > 0) {
			foreach ($arr_table as $table) {
				$this -> db -> truncate($table);
			}
		} else {
			$this -> db -> truncate($arr_table);
		}
		return TRUE;
	}

	/**
	 * Function insert_id to return the last primary id of the table after inserted
	 * @return integer
	 * @example $last_id = insert_id();
	 */
	public function insert_id() {
		return $this -> db -> insert_id();
	}

	/**
	 * Function select to get one field value return string
	 */
	function select_string($table, $field, $arr_where) {
		if (!is_array($arr_where) || count($arr_where) <= 0)
			return '';
		$this -> db -> select($field);
		foreach ($arr_where as $fields => $value) {
			$this -> db -> where($fields, $value);
		}
		$this -> db -> limit(1);
		$query = $this -> db -> get($table);
		if ($query -> num_rows() > 0) {
			$results = $query -> row_array();
			return $results[$field];
		} else {
			return '';
		}
	}

	/**
	 *
	 * @param resultset $result_set, Example $result_set = $this->db->get('tableName');
	 * @param type $key
	 * @param type $val
	 * @return Array
	 */
	function get_dropdown_data($result_set, $key, $val) {
		$data[''] = DROPDOWN_DEFAULT;
		foreach ($result_set->result_array() as $value) {
			$data[$value[$key]] = $value[$val];
		}
		return $data;
	}

	//function to check if data exist
	function check_data_exist($table, $arr_where = array()) {
		if (!is_array($arr_where) || count($arr_where) <= 0)
			return '';
		foreach ($arr_where as $fields => $value) {
			$this -> db -> where($fields, $value);
		}
		$query_get = $this -> db -> get($table);
		if ($query_get -> num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	//function get one value that return as string
	function get_one_value($table, $field, $arr_where = array(),$order_by=NULL) {
		$this -> db -> select($field);
		if (count($arr_where) > 0) {
			foreach ($arr_where as $key => $value) {
				$this -> db -> where($key, $value);
			}
		}
		$this -> db -> limit(1);
		$query_select = $this -> db -> get($table);
		if ($query_select -> num_rows() > 0) {
			$query_select = $query_select -> result_array();
			return $query_select[0][$field];
		} else {
			return FALSE;
		}
	}

	//get data view by monk
	public function get_monk_view($id){
		$this->db->select("monks.*,groups.name");

		$this->db->join("monk_groups","monk_groups.use_monk_id=monks.id","left");
		$this->db->join("groups"," groups.id=monk_groups.use_group_id","left");

		$this->db->where("monks.id",$id);

		$result = $this->db->get("monks");
		if($result->num_rows()>0){
				return $result->row();
		}
		return false;
	}

	//get data languages
	public function get_language_by_monk($id,$name=null){

		$this->db->select("monk_languages.*,languages.name");

		$this->db->join("languages","languages.id=monk_languages.lang_id");
		if($name ==NULL){
			$this->db->where("monk_languages.monk_id",$id);
		}else{
			$this->db->where("monk_languages.member_id",$id);
		}

		$this->db->order_by("lang_id","asc");

		$result = $this->db->get("monk_languages");
		if($result->num_rows()>0){
			return $result;
		}
		return FALSE;
	}

	public function get_dayworking($type_working,$id,$type=NULL){
		$this->db->select("fromday.name as fromdayname,today.name as todayname,fromday.id as fromid,
		today.id as todayid,from_time,to_time,member_id,monk_id");

		$this->db->join("dayofweek as fromday","fromday.id=workingday.from_day");
		$this->db->join("dayofweek as today","today.id=workingday.to_day");

		$this->db->where($type,$id);
		$this->db->where("workingday.type_job",$type_working);
		$this->db->order_by("workingday.id","asc");

		$result = $this->db->get("workingday");
		if($result->num_rows()>0){
				return $result;
		}
		return false;
	}
}
