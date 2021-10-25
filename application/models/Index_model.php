<?php
Class Index_model extends CI_Model
{
	
	function get_userLogin($usr, $pwd)
     {
		 $reader =    $this->db->get_where('users', array('email'=> $usr, 'password'=>sha1($pwd), 'active'=> 1));
		 return $reader->row_array();
     }
	 
	 function get_memberLogin($usr, $pwd)
     {
		 $reader =    $this->db->get_where('member', array('email'=> $usr, 'password'=>sha1($pwd)));
		 return $reader->row_array();
     }
		
// Menu 		
function getDataById($table,$colId,$id,$orderId,$order,$limit) 
	{
			if($colId!=""){
				$this->db->where($colId, $id);
			}
	   		$this->db->order_by($orderId, $order);
			if($limit!=""){
				$this->db->limit($limit);
			}
	   		$result=$this->db->get($table);
		    return $result;
	}

function getDataByIdWithPagination($table,$colId,$id,$orderId,$order,$start,$limit) 
	{
			if($colId!=""){
				$this->db->where($colId, $id);
			}
	   		$this->db->order_by($orderId, $order);
			$this->db->limit($start,$limit);
	   		$result=$this->db->get($table);
		    return $result;
	}
	
			
function getSearch0Data($table,$colId,$id,$colId2,$id2,$colId3,$id3,$orderId,$order,$limit) 
	{
	  		 $this->db->where($colId, $id);
			 if($colId2!=""){
				$this->db->where($colId2, $id2);
				}
				 if($colId3!=""){
				$this->db->where($colId3, $id3);
				}
	   		 $this->db->order_by($orderId, $order);
	   		 $result=$this->db->get($table);
		    return $result;
	}
	
	
	function getArticleDataById($table,$colId,$id,$colId2,$id2,$orderId,$order,$limit) 
	{
				if($colId!=""){
				$this->db->where($colId, $id);
				}
			 if($colId2!=""){
				$this->db->where($colId2, $id2);
				}
	   		 $this->db->order_by($orderId, $order);
	   		 $result=$this->db->get($table);
		    return $result;
	}
	
	
	
	
	
	
	function getDataByIdArray($table,$colId,$id,$orderId,$order,$limit) 
	{
			if($id!=""){
				$this->db->where_in($colId, $id);
			}
	   		$this->db->order_by($orderId, $order);
			if($limit!=""){
				$this->db->limit($limit);
			}
	   		$result=$this->db->get($table);
		    return $result;
	}
	
	function getTable($table,$column,$order){
		$query =   $this->db
						->order_by($column, $order)
						->get($table);
		return $query;	
	}

function getOneItemTable($table,$tableColum,$userColum,$orderId,$order){
		$query =   $this->db
						->order_by($orderId, $order)
						->where($tableColum,$userColum)
						->get($table);
		return $query->row_array();	
	}
// Display All data with id
function getAllItemTable($table,$colum,$id,$statusColum,$status,$orderId,$order){
			  
			  if($colum!=""){
				  $this->db->where($colum,$id);
			  }
			  if($status!=""){
				  $this->db->where($statusColum,$status);
			  }
			 /* if($keyword!=""){
				  $this->db->like('fullname', $keyword);
				  $this->db->or_like('email', $keyword);
				  $this->db->or_like('mobileno', $keyword);
				  $this->db->or_like('gender', $keyword);
				  $this->db->or_like('country', $keyword);
				  $this->db->or_like('city', $keyword);
			  }*/
			  $this->db->order_by($orderId,$order);
			 $query = $this->db->get($table);
		return $query;
}

function getAllMemberCount($keyword,$searchkey){
	  if($keyword!=""){
		  $this->db->like('company_name', $keyword);
		  $this->db->or_like('head_organization', $keyword);
		  $this->db->or_like('contact_person', $keyword);
		  $this->db->or_like('contact', $keyword);
		  $this->db->or_like('email', $keyword);
	  }
	  if($searchkey!=""){
		  $this->db->like('company_name', $searchkey, 'after');
	  }
	  $this->db->where('permission',1);
	   $this->db->order_by('company_name','asc');
	  $query = $this->db->get('member');
	 return $query->num_rows();
}

function getAllMember($keyword,$searchkey,$start,$limit){
	  if($keyword!=""){
		  $this->db->like('company_name', $keyword);
		  $this->db->or_like('head_organization', $keyword);
		  $this->db->or_like('contact_person', $keyword);
		  $this->db->or_like('contact', $keyword);
		  $this->db->or_like('email', $keyword);
	  }
	  if($searchkey!=""){
		  $this->db->like('company_name', $searchkey, 'after');
	  }
	  $this->db->where('permission',1);
	  $this->db->order_by('company_name','asc');
	  $this->db->limit($start,$limit);
	  $query = $this->db->get('member');
	 return $query;
}
function getAllMemberAdmin($start,$limit){
	  $this->db->order_by('company_name','asc');
	  $this->db->limit($start,$limit);
	  $query = $this->db->get('member');
	 return $query;
}
/////////////////////////////////////////All Insert, Update, Select, Delete and login Area/////////////////////////////////////////////////////////
	
/*----- Insert Table and Get ID -------- */
	
	function inertTable($table, $insertData){
		if($this->db->insert($table, $insertData)):
			return $this->db->insert_id();
		else:
			return false;
		endif;
	}

	 
	function update_table($table, $colid,$idval, $uvalue){
		$this->db->where($colid,$idval);
		$dbquery = $this->db->update($table, $uvalue); 
		if($dbquery)
			return true;
		else
			return false;
	}
	
	function updateTable($tablename, $tableprimary_idname,$tableprimary_idvalue, $updated_array){
		$modified_date = time();
		$this->db->where($tableprimary_idname,$tableprimary_idvalue);
		$dbquery = $this->db->update($tablename, $updated_array); 

		if($dbquery)
			return true;
		else
			return false;
	}
	 function checkOldPass($table,$old_password,$cid)
		{
			$this->db->where('email', $this->session->userdata('memberAccessMail'));
			$this->db->where('id', $cid);
			$this->db->where('password', $old_password);
			$query = $this->db->get($table);
			return $query;
			/*if($query->num_rows() > 0)
				return 1;
			else
				return 0;*/
		}


/*----- Delete Table Row -------- */
	function deletetable_row($tablename, $tableidname, $tableidvalue){
		if($this->db->where($tableidname, $tableidvalue)->delete($tablename)) return true;
		return false;
	}
	 public function save_info($data){
            $this->db->insert('tbl_contact_info',$data);
        }
		
		
	function get_category_approve($approve_val)
	{
	   $setval = array(
		   'permission' => 1,
		);
		$array=join(',',$approve_val);
		$this->db->where('id IN ('.$array.')',NULL, FALSE);
		$this->db->update('member', $setval);
		return false;
	}
	function get_category_deapprove($deapprove_val)
	{
		$setval = array(
               'permission' => 0,
         );
		$array=join(',',$deapprove_val);
		$this->db->where('id IN ('.$array.')',NULL, FALSE);
		$this->db->update('member', $setval);
		return false;
	}
	
	
}

?>