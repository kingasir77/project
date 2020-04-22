<?php

class hospital {
    
        /**
         * @url GET/list_hospitals
         */
        
        function get_hospital(){
            $connect = mysqli_connect('localhost','root','14181418','project');
            $text  = sprintf("SELECT * from hospital");
            $query = mysqli_query($connect,$text);
            $arr = array();
            while($row = mysqli_fetch_assoc($query)){
                $arr[count($arr)]=$row;
            }
            
            return $arr;
            
        }
          /**
         * @url GET/get_hospitals/{id}
         */
        
        function get_hospital_for_plan($id){
            $connect = mysqli_connect('localhost','root','14181418','project');
            $text  = sprintf("SELECT hospital.h_id,hospital.h_name
            FROM relation_p_h
            INNER JOIN hospital
            ON relation_p_h.hospital_id = hospital.h_id 
            WHERE relation_p_h.plan_id = %d",$id);
            $query = mysqli_query($connect,$text);
            $arr = array();
            while($row = mysqli_fetch_assoc($query)){
                $arr[count($arr)]=$row;
            }
            
            return $arr;
        }
        
        /**
         * @url GET/get_info/{id}
         */
        
        function get_hospital_info($id){
            $connect = mysqli_connect('localhost','root','14181418','project');
            $text  = sprintf("SELECT * from hospital WHERE h_id = %d",$id);
            $query = mysqli_query($connect,$text);
            $arr = array();
       
            
             $arr[0] = mysqli_fetch_assoc($query);
			 return $arr[0];
        }

                
            
					

		}

 

    
       
        
        




