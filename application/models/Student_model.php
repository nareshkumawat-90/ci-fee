<?php
class Student_model extends CI_Model 
{

        /*Insert student data*/
        function saverecords($data)
        {
                $a=$this->db->insert('students',$data);
                if($a)
                {
                        return true;
                }
                else
                {
                        return false;
                }
        }

        /*display student data*/    
        // function display_records()
        // {
        //         $this->db->select(['students.id','students.fname','students.lname','students.email','students.dob','students.gender','students.contactno','students.class','students.subject','students.total_fee','fees.amount','students.address']);
        //         $this->db->from('students');
        //         $this->db->join('fees','fees.student_id = students.id','left');
        //         $query=$this->db->get();
        //         return $query->result();
        // // $query=$this->db->get("students");
        // // return $query->result();
        // }
        
        private function _get_students_data()
        { 
                $this->db->select(['students.id','students.fname','students.lname','students.email','students.dob','students.gender','students.contactno','students.class','students.subject','students.total_fee','fees.amount','students.address']);
                $this->db->from('students');
                $this->db->join('fees','students.id = fees.student_id ','left');
                $this->db->order_by('students.id',' asc');
        }

        public function get_students($limit, $start)
        { 
                $this->_get_students_data(); 
                $this->db->limit($limit, $start); 
                $query = $this->db->get(); 
                return $query->result_array(); 
        }
        public function count_all_students()
        { 
                $this->_get_students_data(); 
                $query = $this->db->count_all_results(); 
                return $query; 
        }


        /*delete student data*/
        public function removeStudent($id)
        {
                return $this->db->delete('students',['id'=>$id]);
        }

        /*Insert fees data*/
        function payrecords($data)
        {
                $a=$this->db->insert('fees',$data);
                if($a)
                {
                        return true;
                }
                else
                {
                        return false;
                }
        }

        public function get_counts()
        {
                $q = $this->db->select()
                              ->from('fees')
                              ->get();
                return $q->num_rows();
        }

        public function pay_records($limit,$offset)
        {
                $this->db->select(['fees.id','students.fname','students.lname','fees.amount','fees.paid_date','fees.description']);
                $this->db->from("fees");
                $this->db->join("students",'fees.student_id = students.id');
                $this->db->order_by('fees.id',' asc');
                $this->db->limit($limit,$offset);
                $q=$this->db->get();
                return $q->result();
        }

        /*delete fees data*/
        public function removefee($id)
        {
                return $this->db->delete('fees',['id'=>$id]);
        }


       

        /*update student data*/
        public function getStudentRecord($id)
        {
                $this->db->select('*');
                $this->db->from('students');
                $this->db->where('id',$id);
                $student = $this->db->get();
                return $student->row();
        }
        public function updateStudent($data , $id)
        {
                return $this->db->where('id',$id)
                                ->update('students',$data);
        }

        /*update fee data*/
        public function getFeeRecord($id)
        {
                $this->db->select('*');
                $this->db->from('fees');
                $this->db->where('id',$id);
                $fees = $this->db->get();
                return $fees->row();
        }
        public function updateFee($data , $id)
        {
                return $this->db->where('id',$id)
                                ->update('fees',$data);
        }

        //  // test for pagination
        //  private function _get_fees_data()
        //  { 
        //          $this->db->select(['fees.id','students.fname','students.lname','fees.amount','fees.paid_date','fees.description']);
        //          $this->db->from("fees");
        //          $this->db->join("students",'fees.student_id = students.id');
        //          $this->db->order_by('fees.id',' asc');
        //  }
        //  public function get_fees($limit, $start)
        //  { 
        //          $this->_get_fees_data(); 
        //          $this->db->limit($limit, $start); 
        //          $query = $this->db->get(); 
        //          return $query->result_array(); 
        //  }
        //  public function count_all_fees()
        //  { 
        //          $this->_get_fees_data(); 
        //          $query = $this->db->count_all_results(); 
        //          return $query; 
        //  }
        
         /*fetch data*/
        //  public function fetch_data($query)
        //  {
        //          $this->db->select(['fees.id','students.fname','students.lname','fees.amount','fees.paid_date','fees.description']);
        //          $this->db->from("fees");
        //          $this->db->join("students",'fees.student_id = students.id');
        //          if($query != '')
        //          {
        //                  $this->db->like('amount', $query);
        //                  $this->db->or_like('paid_date', $query);
        //                  $this->db->or_like('description', $query);
        //                  $this->db->or_like('lname', $query);
        //                  $this->db->or_like('fname', $query);
        //         }
        //         $this->db->order_by('id', 'ASC');
        //         return $this->db->get();
        // }

/* pagination with search */
        function getRows($params = array()){ 
                $this->db->select(['fees.id','students.fname','students.lname','fees.amount','fees.paid_date','fees.description']);
                        $this->db->from("fees");
                        $this->db->join("students",'fees.student_id = students.id');
                 
                if(array_key_exists("where", $params)){ 
                    foreach($params['where'] as $key => $val){ 
                        $this->db->where($key, $val); 
                    } 
                } 
                 
                if(array_key_exists("search", $params)){ 
                    // Filter data by searched keywords 
                    if(!empty($params['search']['keywords'])){ 
                        $this->db->like('amount', $params['search']['keywords']);
                        $this->db->or_like('paid_date', $params['search']['keywords']);
                        $this->db->or_like('description', $params['search']['keywords']);
                        $this->db->or_like('fname', $params['search']['keywords']);
                        $this->db->or_like('lname', $params['search']['keywords']);
        
        
        
                    } 
                } 
                 
                // Sort data by ascending or desceding order 
                if(!empty($params['search']['sortBy'])){ 
                        $this->db->order_by('fname', $params['search']['sortBy']); 
        
                }else{ 
                    $this->db->order_by('id', 'desc'); 
                } 
                 
                if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
                    $result = $this->db->count_all_results(); 
                }else{ 
                    if(array_key_exists("id", $params) || (array_key_exists("returnType", $params) && $params['returnType'] == 'single')){ 
                        if(!empty($params['id'])){ 
                            $this->db->where('id', $params['id']); 
                        } 
                        $query = $this->db->get(); 
                        $result = $query->row_array(); 
                    }else{ 
                        $this->db->order_by('id', 'desc'); 
                        if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                            $this->db->limit($params['limit'],$params['start']); 
                        }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                            $this->db->limit($params['limit']); 
                        } 
                         
                        $query = $this->db->get(); 
                        $result = ($query->num_rows() > 0)?$query->result_array():FALSE; 
                    } 
                } 
                 
                // Return fetched data 
                return $result; 
            } 

}
?>