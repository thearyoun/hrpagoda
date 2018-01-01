<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Custom_model extends CI_Model {
	public function get_monk_take_leaves() {
		$this -> db -> select('l.*,m.username as monk_name,h.username as handle_name,leave_types.name as leave_type_name');
		$this -> db -> from('monk_take_leaves AS l');
		$this -> db -> join('monks AS m', 'm.id = l.use_monk_id');
		$this -> db -> join('monks AS h', 'h.id = l.use_monk_id');
		$this -> db -> join('leave_types', 'leave_types.id= l.use_leave_type_id');
		$this -> db -> order_by('l.created_at',' DESC');
		$query = $this -> db -> get();
		return $query;
	}
	public function get_member_take_leaves() {
		$this -> db -> select('mem.*,m.username as member_name,h.username as handle_name,leave_types.name as leave_type_name');
		$this -> db -> from('member_take_leaves AS mem');
		$this -> db -> join('monks AS m', 'm.id = mem.use_member_id');
		$this -> db -> join('monks AS h', 'h.id = mem.use_handle_by_id');
		$this -> db -> join('leave_types', 'leave_types.id= mem.use_leave_type_id');
		$this -> db -> order_by('mem.created_at',' DESC');
		$query = $this -> db -> get();
		return $query;
	}
	public function get_attendants() {

		$this -> db -> select('att.*,mon.username as mon_name,pro.name as pro_name,hou.name as house_name');
		$this -> db -> from('attendants AS att');
		$this -> db -> join('monks AS mon', 'mon.id = att.use_monk_id');
		$this -> db -> join('programmes AS pro', 'pro.id = att.use_programme_id');
		$this -> db -> join('houses AS hou', 'hou.id= mon.use_house_id');
		$this -> db -> order_by('att.created_at',' DESC');
		$query = $this -> db -> get();
		return $query;
	}

	public function get_monk_info($monk_id){
		$this -> db -> select('mon.*,hou.name as house_name,loc.name as location_name,pos.name as position_name,mem_types.name as vegetarian_name');
		$this -> db -> from('monks AS mon');
		$this -> db -> join('positions AS pos', 'pos.id = mon.use_position_id');
		$this -> db -> join('member_types AS mem_types', 'mem_types.id = mon.vegetarian_types');
		$this -> db -> join('houses AS hou', 'hou.id = mon.use_house_id');
		$this -> db -> join('locations AS loc', 'loc.id = mon.use_location_id');
		$this -> db -> where('mon.id',$monk_id);
		$query = $this -> db -> get();
		return $query;
	}
	public function get_member_info($member_id){
		$this -> db -> select('members.*');
		$this -> db -> from('members');
		//$this -> db -> join('positions AS pos', 'pos.id = mon.use_position_id');

		$this -> db -> where('members.id',$member_id);
		$query = $this -> db -> get();
		return $query;
	}
	public function get_report_groups(){
		 $query = $this -> db -> query('SELECT g.*, IFNULL(a.counts,0) AS total_members
           FROM groups AS g LEFT JOIN (
           SELECT use_group_id, COUNT( * ) AS counts
           FROM monks WHERE monks.status = 1 GROUP BY use_group_id
           ) AS a ON g.id = a.use_group_id
           ORDER BY g.id');
        return $query;

	}
	public function get_monk_book_info(){
		/*$this -> db -> select('mon.*,hou.name as house_name,loc.name as location_name,pos.name as position_name,mem_types.name as vegetarian_name');
		$this -> db -> from('monks AS mon');
		$this -> db -> join('positions AS pos', 'pos.id = mon.use_position_id');
		$this -> db -> join('member_types AS mem_types', 'mem_types.id = mon.vegetarian_types');
		$this -> db -> join('houses AS hou', 'hou.id = mon.use_house_id');
		$this -> db -> join('locations AS loc', 'loc.id = mon.use_location_id');
		$this -> db -> order_by("mon.use_house_ida ASC");
		$query = $this -> db -> get();
		return $query;*/
		$query = $this -> db -> query("SELECT
		`mon`.*,
	`hou`.`name` AS `house_name`,
	`loc`.`name` AS `location_name`,
	`pos`.`name` AS `position_name`,
	`mem_types`.`name` AS `vegetarian_name`
FROM
	`monks` AS `mon`
JOIN `positions` AS `pos` ON `pos`.`id` = `mon`.`use_position_id`
JOIN `member_types` AS `mem_types` ON `mem_types`.`id` = `mon`.`vegetarian_types`
JOIN `houses` AS `hou` ON `hou`.`id` = `mon`.`use_house_id`
JOIN `locations` AS `loc` ON `loc`.`id` = `mon`.`use_location_id`
ORDER BY
	`mon`.`use_house_id` ASC,FIELD(vegetarian_name, 'ភិក្ខុ', 'សាមណេរ'),`mon`.`vegetarian_year` DESC");
        return $query;
	}
	public function get_monk_book_info_where($house_id = null){
		/*$this -> db -> select('mon.*,hou.name as house_name,loc.name as location_name,pos.name as position_name,mem_types.name as vegetarian_name');
		$this -> db -> from('monks AS mon');
		$this -> db -> join('positions AS pos', 'pos.id = mon.use_position_id');
		$this -> db -> join('member_types AS mem_types', 'mem_types.id = mon.vegetarian_types');
		$this -> db -> join('houses AS hou', 'hou.id = mon.use_house_id');
		$this -> db -> join('locations AS loc', 'loc.id = mon.use_location_id');
		$this -> db -> where("mon.use_house_id",$house_id);
		$this -> db -> order_by("mon.use_house_id ASC");
		$query = $this -> db -> get();
		return $query;*/
		$query = $this -> db -> query("SELECT
		`mon`.*,
	`hou`.`name` AS `house_name`,
	`loc`.`name` AS `location_name`,
	`pos`.`name` AS `position_name`,
	`mem_types`.`name` AS `vegetarian_name`
FROM
	`monks` AS `mon`
JOIN `positions` AS `pos` ON `pos`.`id` = `mon`.`use_position_id`
JOIN `member_types` AS `mem_types` ON `mem_types`.`id` = `mon`.`vegetarian_types`
JOIN `houses` AS `hou` ON `hou`.`id` = `mon`.`use_house_id`
JOIN `locations` AS `loc` ON `loc`.`id` = `mon`.`use_location_id`
WHERE `mon`.`use_house_id` = '$house_id'
ORDER BY
	`mon`.`use_house_id` ASC,FIELD(vegetarian_name, 'ភិក្ខុ', 'សាមណេរ'),`mon`.`vegetarian_year` DESC");
        return $query;
	}
	public function get_member_book_info($house_id=false){
		$this -> db -> select("members.`username`,members.`nation`,members.`date_of_birth`,members.`place_of_birth`,members.`stay_date`,members.`phone_number`,`identify_card`,
													members.`work_type`,members.`student_type`,houses.name as housename,monks.username as monkname,
													ed.name as edname,gd.name as gdname,members.photo,members.position,
													concat(ed.name,'(',gd.name,')') as edu,
													GROUP_CONCAT(languages.name order by languages.id asc SEPARATOR ',') as lang",FALSE);

		$this -> db -> from('members');
		$this -> db -> join('knowledges as ed', 'ed.id=members.education or members.education=ed.name','left');
		$this -> db -> join('knowledges as gd', 'gd.id=members.grade','left');
		$this -> db -> join('houses', 'houses.id = members.use_house_id','left');
		$this -> db -> join('monks', 'monks.id=members.monk_response_id','left');
		$this -> db -> join('monk_languages', 'monk_languages.member_id=members.id','left');
		$this -> db -> join('languages', 'languages.id=monk_languages.lang_id','left');
		if($house_id !=""){
			$this->db->where("members.use_house_id",$house_id);
		}

		$this->db->group_by("members.id");

		$query = $this -> db -> get();
		return $query;
	}
	public function get_people_in_house(){
		 $query = $this -> db -> query('
		 	SELECT
				g.id,
				g. NAME,
				IFNULL(a.counts, 0) AS total_monk_level1,
				IFNULL(a2.counts2, 0) AS total_monk_level2,
				IFNULL(b.count_member, 0) AS total_member,
				(
					IFNULL(a.counts, 0) + IFNULL(a2.counts2, 0) + IFNULL(b.count_member, 0)
				) AS total
			FROM
				houses AS g
			LEFT JOIN (
				SELECT
					use_house_id,
					COUNT(*) AS counts
				FROM
					monks
				WHERE vegetarian_types = 1 AND status = 1
				GROUP BY
					use_house_id
			) AS a ON g.id = a.use_house_id
			LEFT JOIN (
				SELECT
					use_house_id,
					COUNT(*) AS counts2
				FROM
					monks
				WHERE vegetarian_types = 2 AND status = 1
				GROUP BY
					use_house_id
			) AS a2 ON g.id = a2.use_house_id
			LEFT JOIN (
				SELECT
					use_house_id,
					COUNT(*) AS count_member
				FROM
					members
				WHERE status = 1
				GROUP BY
					use_house_id
			) AS b ON g.id = b.use_house_id
			ORDER BY
				g.id');
        return $query;
	}

	public function get_att_report($group_id = null, $from_date = null, $to_date = null){
		if($from_date != null && $to_date != null){
			$where_date = " AND date between '$from_date' AND '$to_date' ";
		}else{
			$where_date = "";
		}
		$query = $this -> db -> query("
				 	SELECT
					m.id,
					m. username,
					houses.name as house_name,
					IFNULL(a.count_morning_has, 0) AS morning_has,
					IFNULL(b.count_morning_no, 0) AS morning_no,
					IFNULL(c.count_evening_has, 0) AS evening_has,
					IFNULL(d.count_evening_no, 0) AS evening_no,
					IFNULL(e.count_present, 0) AS total_present,
					IFNULL(f.count_absent, 0) AS total_absent
				FROM
					monks AS m
				LEFT JOIN (
					SELECT
						use_monk_id,
						COUNT('times') AS count_morning_has
					FROM
						attendants
					WHERE times ='morning' AND is_take_leave=1
					AND use_programme_id = 1 $where_date
					GROUP BY
						use_monk_id
				) AS a ON m.id = a.use_monk_id
				LEFT JOIN (
					SELECT
						use_monk_id,
						COUNT('times') AS count_morning_no
					FROM
						attendants
					WHERE times ='morning' and is_take_leave=0 and present =0
					AND use_programme_id = 1 $where_date
					GROUP BY
						use_monk_id
				) AS b ON m.id = b.use_monk_id
				LEFT JOIN (
					SELECT
						use_monk_id,
						COUNT('times') AS count_evening_has
					FROM
						attendants
					WHERE times ='evening' and is_take_leave=1
					AND use_programme_id = 1 $where_date
					GROUP BY
						use_monk_id
				) AS c ON m.id = c.use_monk_id
				LEFT JOIN (
					SELECT
						use_monk_id,
						COUNT('times') AS count_evening_no
					FROM
						attendants
					WHERE times ='evening' and is_take_leave=0 and present =0
					AND use_programme_id = 1 $where_date
					GROUP BY
						use_monk_id
				) AS d ON m.id = d.use_monk_id
				LEFT JOIN (
					SELECT
						use_monk_id,
						count('*') AS count_present
					FROM
						attendants
					WHERE  present = 1
					AND use_programme_id = 1 $where_date
					GROUP BY
						use_monk_id
				) AS e ON m.id = e.use_monk_id
				LEFT JOIN (
					SELECT
						use_monk_id,
						count('*') AS count_absent
					FROM
						attendants
					WHERE  present = 0
					AND use_programme_id = 1 $where_date
					GROUP BY
						use_monk_id
				) AS f ON m.id = f.use_monk_id
				INNER JOIN monk_groups on monk_groups.use_monk_id = m.id
				INNER JOIN houses on houses.id = m.use_house_id
				WHERE monk_groups.use_group_id = $group_id
				AND m.status = 1
				ORDER BY
					m.id");
        return $query;
	}
	public function get_att_report_programme($group_id = null, $programme_id = null, $from_date = null, $to_date = null){
		if($from_date != null && $to_date != null){
			$where_date = " AND date between '$from_date' AND '$to_date' ";
		}else{
			$where_date = "";
		}
		$query = $this -> db -> query("
				 	SELECT
					m.id,
					m. username,
					houses.name as house_name,
					IFNULL(a.count_fullday_has, 0) AS fullday_has,
					IFNULL(b.count_fullday_no, 0) AS fullday_no,
					IFNULL(c.count_present, 0) AS total_present,
					IFNULL(d.count_absent, 0) AS total_absent
				FROM
					monks AS m
				LEFT JOIN (
					SELECT
						use_monk_id,
						COUNT('times') AS count_fullday_has
					FROM
						attendants
					WHERE times ='full day' and is_take_leave=1
					AND use_programme_id = $programme_id $where_date
					GROUP BY
						use_monk_id
				) AS a ON m.id = a.use_monk_id
				LEFT JOIN (
					SELECT
						use_monk_id,
						COUNT('times') AS count_fullday_no
					FROM
						attendants
					WHERE times ='full day' and is_take_leave=0 and present =0
					AND use_programme_id = $programme_id $where_date
					GROUP BY
						use_monk_id
				) AS b ON m.id = b.use_monk_id
				LEFT JOIN (
					SELECT
						use_monk_id,
						count('*') AS count_present
					FROM
						attendants
					WHERE  present = 1
					AND use_programme_id = $programme_id $where_date
					GROUP BY
						use_monk_id
				) AS c ON m.id = c.use_monk_id
				LEFT JOIN (
					SELECT
						use_monk_id,
						count('*') AS count_absent
					FROM
						attendants
					WHERE  present = 0
					AND use_programme_id = $programme_id $where_date
					GROUP BY
						use_monk_id
				) AS d ON m.id = d.use_monk_id
				INNER JOIN monk_groups on monk_groups.use_monk_id = m.id
				INNER JOIN houses on houses.id = m.use_house_id
				WHERE monk_groups.use_group_id = $group_id
				AND m.status = 1
				ORDER BY
					m.id");
        return $query;
	}
	public function get_att_report_programme_detail($id = null, $type = null, $programme_id = null, $from_date = null, $to_date = null){
		if($from_date != null && $to_date != null){
			$where_date = " AND date between '$from_date' AND '$to_date' ";
		}else{
			$where_date = "";
		}
		if($type == "has"){
			$where_type_has = " and is_take_leave=1 ";
		}else{
			$where_type_has = " and is_take_leave=0 and present =0 ";
		}

		$query = $this -> db -> query("
			SELECT
						attendants.*,monks.username as mon_name,programmes.name as pro_name,houses.name as house_name
					FROM
						attendants
					INNER JOIN monks ON monks.id = attendants.use_monk_id
					INNER JOIN programmes ON programmes.id = attendants.use_programme_id
					INNER JOIN houses ON houses.id = monks.use_house_id
					WHERE times = 'full day' $where_type_has
					AND use_programme_id = $programme_id
					AND use_monk_id = $id $where_date
					GROUP BY
						use_monk_id
					ORDER BY attendants.created_at DESC
		");
		return $query;
	}

	public function get_all_people_in_house_by($house_id = NULL){
		 $query = $this -> db -> query("SELECT
			username,houses.name as house_name,nation, phone_number, date_of_birth
			FROM
			monks
			INNER JOIN houses ON houses.id = monks.use_house_id
			WHERE
			use_house_id = $house_id
			AND monks.status = 1
			UNION ALL
			SELECT
				username,houses.`name` as house_name,nation, phone_number, date_of_birth
			FROM
				members
			INNER JOIN houses ON houses.id = members.use_house_id
			WHERE
				use_house_id = $house_id
			AND members.status = 1"
		 	);
        return $query;
	}
	public function get_all_people_in_house(){
		 $query = $this -> db -> query("SELECT
			username,houses.name as house_name,nation, phone_number, date_of_birth
			FROM
			monks
			INNER JOIN houses ON houses.id = monks.use_house_id
			WHERE
			 	monks.status = 1
			UNION ALL
			SELECT
				username,houses.`name` as house_name,nation, phone_number, date_of_birth
			FROM
				members
			INNER JOIN houses ON houses.id = members.use_house_id
			WHERE
				members.status = 1"
		 	);
        return $query;
	}
	public function get_attendant_where($monk_id) {

		$this -> db -> select('att.*,mon.username as mon_name,pro.name as pro_name,hou.name as house_name');
		$this -> db -> from('attendants AS att');
		$this -> db -> join('monks AS mon', 'mon.id = att.use_monk_id');
		$this -> db -> join('programmes AS pro', 'pro.id = att.use_programme_id');
		$this -> db -> join('houses AS hou', 'hou.id= mon.use_house_id');
		$this -> db -> where('use_monk_id',$monk_id);
		$this -> db -> order_by('att.created_at',' DESC');
		$query = $this -> db -> get();
		return $query;
	}
	public function get_attendant_where_member($member_id) {

		$this -> db -> select('att.*,mem.username as mon_name,pro.name as pro_name,hou.name as house_name');
		$this -> db -> from('attendants AS att');
		$this -> db -> join('members AS mem', 'mem.id = att.use_member_id');
		$this -> db -> join('programmes AS pro', 'pro.id = att.use_programme_id');
		$this -> db -> join('houses AS hou', 'hou.id= mon.use_house_id');
		$this -> db -> where('use_member_id',$member_id);
		$this -> db -> order_by('att.created_at',' DESC');
		$query = $this -> db -> get();
		return $query;
	}
        public function get_monk_group_member($group_id){
		$query = $this -> db -> query("SELECT `monks`.*,`mem_types`.`name` AS `vegetarian_name`, `houses`.`name` as `house_name` FROM `monks` INNER JOIN `houses` ON `monks`.`use_house_id`=`houses`.`id`
		JOIN `member_types` AS `mem_types` ON `mem_types`.`id` = `monks`.`vegetarian_types`
		WHERE `monks`.`status` = 1 AND `monks`.`use_group_id` = '$group_id' ORDER BY	FIELD(vegetarian_name, 'ភិក្ខុ', 'សាមណេរ'),`monks`.`vegetarian_year` DESC");
		return $query;

	}

	public function get_count_member(){
		$this->db->select("count(id) as Number");

		$this->db->where("status",true);

		$result = $this->db->get("members");
		if($result->num_rows()>0){
			return $result->row()->Number;
		}
		return false;
	}

	public function get_data_member($member_id)
	{
		$this->db->select("`members`.*, `houses`.`name` as `house_name`, `monks`.`username` as `monk_name`,
											ed.name as edname,gd.name as gradename");
	  $this->db->join("houses","`members`.`use_house_id`=`houses`.`id`","inner");
		$this->db->join("monks","`members`.`monk_response_id`=`monks`.`id`","inner");
		$this->db->join("knowledges as ed","ed.id=members.education or ed.name=members.education","left");
		$this->db->join("knowledges as gd","gd.id=members.grade","left");

		$this->db->where("members.id",$member_id);

		return $this->db->get("members")->row();
	}
	public function get_data_monk_account($monk_id)
	{
		$this->db->select("`monks`.*, `houses`.`name` as `house_name`, `locations`.`name` as `location_name`, `groups`.`name` as `group_name`, `positions`.`name` as `pos_name`,
fromdis.name as fromname,frcom.name as frcomname,frvil.name as frvilname,DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), monks.vegetarian_date)), '%Y')+0 as yeartime,
curlo.name as curloname,curdis.name as curdisname,curcom.name as curcomname,curvil.name as curvilname");
		$this->db->join("houses","`monks`.`use_house_id`=`houses`.`id`","left");
		$this->db->join("locations","`monks`.`use_location_id`=`locations`.`id`","left");
		$this->db->join("groups","`monks`.`use_group_id`=`groups`.`id`","left");
		$this->db->join("positions","`monks`.`use_position_id`=`positions`.`id`","left");
		$this->db->join("districts fromdis","fromdis.id=monks.distrinct_id","left");
		$this->db->join("communes frcom","frcom.id=monks.commune_id","left");
		$this->db->join("villages frvil","frvil.id=monks.village_id","left");
		$this->db->join("locations curlo","curlo.id=monks.current_province","left");
		$this->db->join("districts curdis","curdis.id=monks.current_district","left");
		$this->db->join("communes curcom","curcom.id=monks.current_commune","left");
		$this->db->join("villages curvil","curvil.id=monks.current_village","left");

		$this->db->where("monks.id",$monk_id);
		$this->db->where("monks.status",TRUE);

		$result = $this->db->get("monks");

		if($result->num_rows()>0){
			return $result->row();
		}
		return false;
	}

	public function get_language($id,$type)
	{
		$this->db->select("monk_languages.*,languages.name as langname");

		$this->db->join("languages"," languages.id=monk_languages.lang_id","inner");

		$this->db->where("monk_languages.".$type,$id);

		$this->db->order_by("languages.id","asc");

		$return = $this->db->get("monk_languages");
		if($return->num_rows()>0){
			return $return;
		}
		return false;
	}

	public function get_timeworing($id,$type,$job=null)
	{
		$this->db->select(" GROUP_CONCAT(concat(f.name,'-',workingday.from_time) ORDER by workingday.id SEPARATOR ',') as daynametime,
GROUP_CONCAT(concat(workingday.from_time,'-',workingday.to_time) ORDER by workingday.id SEPARATOR ','),
workingday.type_job");

		$this->db->join("dayofweek as f","f.id=workingday.from_day and workingday.type_job=1");
		$this->db->join("dayofweek as t","t.id=workingday.to_day and workingday.type_job=1");

		// $this->db->where("workingday.type_job",$job);
		$this->db->where("workingday.".$type,$id);
		// $this->db->group_by("workingday.type_job");
		$this->db->order_by("workingday.id");

		$return = $this->db->get("workingday");
		if($return->num_rows()>0){
			return $return;
		}
		return false;
	}


}
