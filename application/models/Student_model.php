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


        // test for pagination
        private function _get_fees_data()
        { 
                $this->db->select(['fees.id','students.fname','students.lname','fees.amount','fees.paid_date','fees.description']);
                $this->db->from("fees");
                $this->db->join("students",'fees.student_id = students.id');
                $this->db->order_by('fees.id',' asc');
        }
        public function get_fees($limit, $start)
        { 
                $this->_get_fees_data(); 
                $this->db->limit($limit, $start); 
                $query = $this->db->get(); 
                return $query->result_array(); 
        }
        public function count_all_fees()
        { 
                $this->_get_fees_data(); 
                $query = $this->db->count_all_results(); 
                return $query; 
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

}
?>