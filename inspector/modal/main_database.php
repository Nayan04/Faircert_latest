<?php

include("../../db_config/db_config.php");

class main_database {

    private $link;

    function __construct() {
        //if($_SESSION['user_id'])
        $this->link = mysql_connect(config::host, config::username, config::password);
        mysql_select_db(config::database, $this->link) or die(mysql_error());
    }

    function __distruct() {
        mysql_close($this->link);
    }

    function add_day_in_date($date, $days) {

        $date = strtotime("+" . $days . " days", strtotime($date));
        return date("Y-m-d", $date);
    }

    function get_date_with_slash($yyyy_dd_mm) {
        $date = date_create($yyyy_dd_mm);
        $result = date_format($date, 'd/m/Y');
        return $result;
    }

    function get_date_with_dash($dd_mm_yyyy) {
        $var = $dd_mm_yyyy;
        $date = str_replace('/', '-', $var);
        $result = date('Y-m-d', strtotime($date));
        return $result;
    }

    function elapsedTime($time_since) {

        $time = time() - $time_since;
        $tokens = array(
            31536000 => 'year',
            2592000 => 'month',
            604800 => 'week',
            86400 => 'day',
            3600 => 'hour',
            60 => 'minute',
            1 => 'second'
        );
        foreach ($tokens as $unit => $text) {
            if ($time < $unit)
                continue;
            $numberOfUnits = floor($time / $unit);
            return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
        }
    }
    function get_enquiry_by_user($user){
		
		$sql = sprintf("select distinct(enquiry_id) from history where from_user='$user' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else{
			        return $rs;
                                
                                 }
					
		}
    function get_enq_count($user) {

        $sql = sprintf("select count(id)as total from enquiry_status where is_seen=0 and isactive=1 and to_user='$user'");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            $r = mysql_fetch_array($rs);
            return $r[0];
        }
    }
   

    function get_new_enq_count() {

        $sql = sprintf("select count(id)as total from enquiry_status where is_seen=0 and isactive=1 and current_status='pending'");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            $r = mysql_fetch_array($rs);
            return $r[0];
        }
    }
    ////////////////////////////////inspection in inspection records///////////////////////////////////////////////
    function get_enquiry_by_status($enq_id) {

        $sql = sprintf("select * from inspection_records where is_live=1  and enquiry_id='$enq_id' and  isactive=1 and is_inspection_done=1");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }
    function update_inspection($enq_id, $id) {

        $sql = sprintf("update inspection_records set is_live=0 where id='$id' and enquiry_id='$enq_id' ");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }
	function update_in_report($enq_id,$dates,$staffid,$staff){
	
	echo $sql = sprintf("update reports_of_enquiry set d_o_inspectionss='$dates', name_o_inspector='$staff', d_o_noncom_tracenet='$dates', id_of_inspector_insp='$staffid'  where enq_id='$enq_id' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else{
			        return $rs;
					}
				}
	function update_in_report_closer($enq_id,$dates,$staffid,$staff){
	
	echo $sql = sprintf("update reports_of_enquiry set d_o_noncomss='$dates', name_o_inspector_non='$staff', id_of_inspector_insp_non='$staffid'  where enq_id='$enq_id' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else{
			        return $rs;
					}
				}
	
    
    function get_reminder($user) {

        $sql = sprintf("select count(id)as total from inspection_records where is_live=1 and  isactive=1 and created_by='$user' and d_o_inspection BETWEEN curdate() and curdate() + interval 10 day order by d_o_inspection desc");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            $r = mysql_fetch_array($rs);
             return $r[0];
        }
    }
    function get_details_rem($user) {

        $sql = sprintf("select * from inspection_records where is_live=1 and  isactive=1 and created_by='$user' and d_o_inspection BETWEEN curdate() and curdate() + interval 10 day order by d_o_inspection desc");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
           
            return $rs;
        }
    }
    ////////////////////////////////inspection non ///////////////////////////////////////////////
    function get_reminder_non($user) {

        $sql = sprintf("select count(id)as total from inspection_records where   isactive=1 and created_by='$user' and d_o_noncom BETWEEN curdate() and curdate() + interval 10 day order by d_o_noncom desc");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            $r = mysql_fetch_array($rs);
            return $r[0];
        }
    }
    function get_details_rem_non($user) {

        $sql = sprintf("select * from inspection_records where  isactive=1 and created_by='$user' and d_o_noncom BETWEEN curdate() and curdate() + interval 10 day order by  d_o_noncom desc");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
           
            return $rs;
        }
    }
    //////update inspection
    function get_all_inspection($user) {

        $sql = sprintf("select enquiry_per_detail.firm_type,enquiry_per_detail.firm_name,inspection_records.d_o_inspection_to,enquiry_per_detail.company_name,enquiry_per_detail.position,enquiry_status.from_user, inspection_records.d_o_inspection,inspection_records.status,inspection_records.remarks, enquiry_status.is_seen,enquiry_status.is_client,inspection_records.d_o_noncom,inspection_records.noncom_type,enquiry_status.client_id,enquiry_per_detail.enquiry_id,enquiry_status.from_dept from inspection_records left join enquiry_per_detail on enquiry_per_detail.enquiry_id=inspection_records.enquiry_id left join enquiry_status on inspection_records.enquiry_id=enquiry_status.enquiry_id where inspection_records.is_live=1 and inspection_records.isactive=1 and inspection_records.created_by='$user' and ( (inspection_records.d_o_inspection!='0000-00-00' and inspection_records.d_o_inspection!='1970-01-01') OR (inspection_records.d_o_noncom!='0000-00-00' and inspection_records.d_o_noncom!='1970-01-01'))");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
           
            return $rs;
        }
    }
    function get_all_inspections() {

        $sql = sprintf("select * from enquiry_status left join enquiry_per_detail on enquiry_per_detail.enquiry_id=enquiry_status.enquiry_id where enquiry_status.isactive=1 and ( enquiry_status.d_o_inspection!='0000-00-00' OR enquiry_status.d_o_inspection!='1970-01-01')  order by enquiry_status.d_o_inspection desc");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
           
            return $rs;
        }
    }

    function get_programs_module() {

        $sql = sprintf("select id,program_name from programs where isactive=1");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    function get_dept() {

        $sql = sprintf("select * from department where isactive=1");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    function get_desig($id, $name) {

        $sql = sprintf("select * from designation where isactive=1 and department_id='$id' and department_name='$name'");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    function get_emp($id, $name) {

        $sql = sprintf("select * from staff_detail where isactive=1 and desig_id='$id' and desig_name='$name'");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    function get_user_by_id($id) {

        $sql = sprintf("select * from staff_detail where isactive=1 and user_id='$id'");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            $r = mysql_fetch_array($rs);
            return $r['staff_name'];
        }
    }
	function get_user_details($id) {

        $sql = sprintf("select * from staff_detail where isactive=1 and user_id='$id'");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    function get_status() {

        $sql = sprintf("select * from designation_wise_status where isactive=1");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    function get_status_by_enq($enq) {

        $sql = sprintf("select * from enquiry_status  where isactive=1 and enquiry_id='$enq'");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
           // $r = mysql_fetch_array($rs);

            return $rs;
        }
    }

    function get_status_by($desi) {

        $sql = sprintf("select * from designation_wise_status where isactive=1 and designation='$desi' and type=1");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    function get_certificate_by_program($id) {
        $sql = sprintf("select id,certification_name from certification_table where isactive=1 and program_id=" . $id);
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    function get_history_by($enq_id) {
        $sql = sprintf("select * from  history where isactive=1 and enquiry_id='$enq_id' ORDER BY  created_date DESC, created_time DESC ");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    function get_certification_name_by_id($data) {
        $d = array();
        $sql = sprintf("select id,certification_name from certification_table where isactive=1 and id in($data)");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            while ($certificate = mysql_fetch_array($rs)) {
                $d[] = $certificate[1];
            }
            return implode(",", $d);
        }
    }

    function get_certipro_name_by_id($data) {
        //echo $data;
        $sql = sprintf("select * from certification_table left join programs on certification_table.program_id=programs.id  where certification_table.isactive=1 and certification_table.id in(" . $data . ")");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            $i = 0;
            $cert = array();
            $pro = array();
            $new = array();
            while ($certificate = mysql_fetch_array($rs)) {
                $cert = $certificate['certification_name'];
                // echo "<br/>";
                $pro[] = $certificate['program_name'];
                $new[$cert] = $certificate['program_name'];
                $i++;
            }
            //  print_r($new);
            return $new;
        }
    }

    function get_enquiry() {
        $sql = sprintf("SELECT enquiry_per_detail.enquiry_id AS enq_id, enquiry_per_detail.company_name AS name, enquiry_per_detail.position AS position, enquiry_per_detail.mobile AS num, enquiry_per_detail.phone AS ph, enquiry_per_detail.email AS email, enquiry_per_detail.street AS street, enquiry_per_detail.taluka AS taluka, enquiry_per_detail.district AS dis, enquiry_per_detail.pincode AS pin, enquiry_per_detail.state AS stat, enquiry_per_detail.country AS coun, enquiry_certification_request.certification_id AS certi_id, enquiry_tracing.created_date AS dates,enquiry_status.current_status AS status,enquiry_per_detail.firm_type AS type
FROM enquiry_per_detail
LEFT JOIN enquiry_certification_request ON enquiry_per_detail.enquiry_id = enquiry_certification_request.enquiry_id
LEFT JOIN enquiry_tracing ON enquiry_certification_request.enquiry_id = enquiry_tracing.enquiry_id
LEFT JOIN enquiry_status ON enquiry_certification_request.enquiry_id = enquiry_status.enquiry_id where (enquiry_status.sent_to='' and enquiry_status.send_from='') order by dates DESC");
        //echo $sql;
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    //////////////////////inbox////////////////////
    function get_enquiry_send_to($dept) {

        $sql = sprintf("SELECT enquiry_per_detail.enquiry_id AS enq_id, enquiry_per_detail.company_name AS name, enquiry_per_detail.position AS position, enquiry_per_detail.mobile AS num, enquiry_per_detail.phone AS ph, enquiry_per_detail.email AS email, enquiry_per_detail.street AS street, enquiry_per_detail.taluka AS taluka, enquiry_per_detail.district AS dis, enquiry_per_detail.pincode AS pin, enquiry_per_detail.state AS stat, enquiry_per_detail.country AS coun, enquiry_certification_request.certification_id AS certi_id, enquiry_tracing.created_date AS dates,enquiry_status.current_status AS status, enquiry_per_detail.firm_type AS type
FROM enquiry_per_detail
LEFT JOIN enquiry_certification_request ON enquiry_per_detail.enquiry_id = enquiry_certification_request.enquiry_id
LEFT JOIN enquiry_tracing ON enquiry_certification_request.enquiry_id = enquiry_tracing.enquiry_id
LEFT JOIN enquiry_status ON enquiry_certification_request.enquiry_id = enquiry_status.enquiry_id where enquiry_status.sent_to='$dept'");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    //////////////////////////////////////////////
    //////////////////////inbox////////////////////
    function get_enquiry_for_inbox_by_user($dept, $user) {

        $sql = sprintf("SELECT enquiry_per_detail.enquiry_id AS enq_id, enquiry_per_detail.company_name AS name, enquiry_per_detail.position AS position, enquiry_per_detail.mobile AS num, enquiry_per_detail.phone AS ph, enquiry_per_detail.email AS email, enquiry_per_detail.street AS street, enquiry_per_detail.taluka AS taluka, enquiry_per_detail.district AS dis, enquiry_per_detail.pincode AS pin, enquiry_per_detail.state AS stat, enquiry_per_detail.country AS coun, enquiry_certification_request.certification_id AS certi_id, enquiry_tracing.created_date AS dates,enquiry_status.current_status AS status, enquiry_status.from_user AS sent_from, enquiry_status.send_from AS sent_from2,enquiry_status.is_seen AS seen, enquiry_per_detail.firm_type AS type,enquiry_status.client_id AS client_id,
                     enquiry_status.is_client AS is_client,enquiry_status.d_o_inspection AS doi,enquiry_status.d_o_noncom AS donon
FROM enquiry_per_detail
LEFT JOIN enquiry_certification_request ON enquiry_per_detail.enquiry_id = enquiry_certification_request.enquiry_id
LEFT JOIN enquiry_tracing ON enquiry_certification_request.enquiry_id = enquiry_tracing.enquiry_id
LEFT JOIN enquiry_status ON enquiry_certification_request.enquiry_id = enquiry_status.enquiry_id where enquiry_status.sent_to='$dept' and enquiry_status.to_user='$user'");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    //////////////////////////////////////////////
    //////////////////////outbox////////////////////
    function get_enquiry_for_sentbox_by_user($dept, $user) {

        $sql = sprintf("SELECT enquiry_per_detail.enquiry_id AS enq_id, enquiry_per_detail.company_name AS name, enquiry_per_detail.position AS position, enquiry_per_detail.mobile AS num, enquiry_per_detail.phone AS ph, enquiry_per_detail.email AS email, enquiry_per_detail.street AS street, enquiry_per_detail.taluka AS taluka, enquiry_per_detail.district AS dis, enquiry_per_detail.pincode AS pin, enquiry_per_detail.state AS stat, enquiry_per_detail.country AS coun, enquiry_certification_request.certification_id AS certi_id, enquiry_tracing.created_date AS dates,enquiry_status.current_status AS status, enquiry_status.to_user AS sent_to, enquiry_status.sent_to AS sent_to2
FROM enquiry_per_detail
LEFT JOIN enquiry_certification_request ON enquiry_per_detail.enquiry_id = enquiry_certification_request.enquiry_id
LEFT JOIN enquiry_tracing ON enquiry_certification_request.enquiry_id = enquiry_tracing.enquiry_id
LEFT JOIN enquiry_status ON enquiry_certification_request.enquiry_id = enquiry_status.enquiry_id where enquiry_status.send_from='$dept' and enquiry_status.from_user='$user'");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    //////////////////////outbox////////////////////
    function get_enquiry_send_from($dept) {

        $sql = sprintf("SELECT enquiry_per_detail.enquiry_id AS enq_id, enquiry_per_detail.company_name AS name, enquiry_per_detail.position AS position, enquiry_per_detail.mobile AS num, enquiry_per_detail.phone AS ph, enquiry_per_detail.email AS email, enquiry_per_detail.street AS street, enquiry_per_detail.taluka AS taluka, enquiry_per_detail.district AS dis, enquiry_per_detail.pincode AS pin, enquiry_per_detail.state AS stat, enquiry_per_detail.country AS coun, enquiry_certification_request.certification_id AS certi_id, enquiry_tracing.created_date AS dates,enquiry_status.current_status AS status, enquiry_status.from_user AS sent_from, enquiry_status.send_from AS sent_from2
FROM enquiry_per_detail
LEFT JOIN enquiry_certification_request ON enquiry_per_detail.enquiry_id = enquiry_certification_request.enquiry_id
LEFT JOIN enquiry_tracing ON enquiry_certification_request.enquiry_id = enquiry_tracing.enquiry_id
LEFT JOIN enquiry_status ON enquiry_certification_request.enquiry_id = enquiry_status.enquiry_id where enquiry_status.send_from='$dept'");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    //////////////////////////////////////////////
    function get_all_detail_of_enquiry($id) {

        $sql = sprintf("SELECT *
FROM enquiry_per_detail
LEFT JOIN enquiry_certification_request ON enquiry_per_detail.enquiry_id = enquiry_certification_request.enquiry_id
LEFT JOIN enquiry_tracing ON enquiry_certification_request.enquiry_id = enquiry_tracing.enquiry_id
LEFT JOIN enquiry_info_for_quote ON enquiry_certification_request.enquiry_id = enquiry_info_for_quote.enquiry_id
LEFT JOIN enquiry_status ON enquiry_status.enquiry_id = enquiry_info_for_quote.enquiry_id where enquiry_per_detail.enquiry_id='$id' ");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    public function select($table, $rows = '*', $where = null, $order = null) {
        $q = 'SELECT ' . $rows . ' FROM ' . $table;
        if ($where != null)
            $q .= ' WHERE ' . $where;
        if ($order != null)
            $q .= ' ORDER BY ' . $order;
        echo $q;
        $rs = mysql_query($q, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    function insert_enq_per($table, $column, $enq_id, $fmid, $fmname, $company, $pos, $street, $taluka, $district, $stat, $country, $pincode, $mobile, $phno, $email, $location) {

        $sql = sprintf("insert into $table (" . $column . ")  values('$enq_id','$fmid','$fmname','$company','$pos','$street','$taluka','$district','$stat','$country','$pincode','$mobile','$phno','$email','$location')");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    function insert_enq_program($table, $column, $enq_id, $pro_id, $pro_name) {

        $sql = sprintf("insert into $table (" . $column . ")  values('$enq_id','$pro_id','$pro_name')");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    function insert_enq_quote($table, $column, $enq_id, $frmno, $lndsze, $vlgno, $prono, $is_pro, $lastprogramdes, $lstcert, $empno, $subpro, $decle) {

        $sql = sprintf("insert into $table (" . $column . ")  values('$enq_id','$frmno','$lndsze','$vlgno','$prono','$is_pro','$lastprogramdes','$lstcert','$empno','$subpro','$decle')");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    function insert_time_trace($table, $column, $enq_id, $user_id, $date, $times, $isactive) {

        $sql = sprintf("insert into $table (" . $column . ")  values('$enq_id','$user_id','$date','$times','$isactive')");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    function insert_enquiry_status($table, $column, $enq_id, $status, $remarks, $isactive) {

        $sql = sprintf("insert into $table (" . $column . ")  values('$enq_id','$status','$remarks','$isactive')");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    function insert_history($table, $column, $enq_id, $status_to, $desig_to, $desig_from, $staff_to, $staff_from, $dept_to, $dept_from, $date, $user_id, $times, $insp_flag,$remark, $isactive) {
        //enquiry_id,status,to_desig,from_desig,to_user,from_user,to_dept,from_dept,created_date,created_by,created_time,remarks,isactive
        echo $sql = sprintf("insert into " . $table . "(" . $column . ")  values('$enq_id','$status_to','$desig_to','$desig_from','$staff_to','$staff_from','$dept_to','$dept_from','$date','$user_id','$times','$insp_flag','$remark',1)");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo "1" . mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    function insert_history_in_status($table, $column, $enq_id, $status, $date, $user_id, $times, $remark, $doi, $doi_to, $comtype, $d_o_noncom,$pro_type,$insp_flag,$isactive) {
        //enquiry_id,status,created_date,created_by,created_time,remarks,isactive
        $sql = sprintf("insert into " . $table . "(" . $column . ")  values('$enq_id','$status','$date','$user_id','$times','$remark','$doi','$doi_to','$comtype','$d_o_noncom','$pro_type','$insp_flag',1)");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo "1" . mysql_error($this->link);
        } else {
            return $rs;
        }
    }
    function insert_inspection($table, $column, $enq_id, $status, $date, $user_id, $times, $remark, $doi, $doi_to, $comtype, $d_o_noncom,$pro_type,$insp_flag,$isactive) {
        //enquiry_id,status,created_date,created_by,created_time,remarks,isactive
        $sql = sprintf("insert into " . $table . "(" . $column . ")  values('$enq_id','$status','$date','$user_id','$times','$remark','$doi','$doi_to','$comtype','$d_o_noncom','$pro_type','$insp_flag',1,1)");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo "1" . mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    function update_status($enq_id,$status,$remark,$doi,$doi_to,$comtype,$d_o_noncom,$pro_type,$insp_flag) {

        $sql = sprintf("update enquiry_status set current_status='$status',remarks='$remark', d_o_inspection='$doi',d_o_inspection_to='$doi_to',noncom_type='$comtype',d_o_noncom='$d_o_noncom', is_seen=1, pro_type='$pro_type', inspection_complite='$insp_flag' where enquiry_id='$enq_id' and isactive=1");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo "2" . mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    function update_status_in_fwd($enq_id, $dept_to, $desig_to, $staff_to, $status_to, $dept_from, $desig_from, $staff_from, $date, $times,$insp_flag,$remark, $active) {

        $sql = sprintf("update enquiry_status set current_status='$status_to',sent_to='$desig_to', send_from='$desig_from',to_user='$staff_to',from_user='$staff_from',to_dept='$dept_to',from_dept='$dept_from',update_date='$date',update_time='$times',remarks='$remark', inspection_complite='$insp_flag', is_seen=0 where enquiry_id='$enq_id'  and isactive=1");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }

    /* public function insert($table,$values,$column = null){
      $insert = 'INSERT INTO '.$table;
      echo("<br>".$values);
      if($column != null)
      {
      $insert .= ' ('.$column.')';
      }
      /*for($i = 0; $i < count($values); $i++)
      {
      if(is_string($values[$i]))
      $values[$i] = '"'.$values[$i].'"';
      }
      //print_r($values);
      //$values = implode(',',$values);
      //print_r($values);
      $insert .= " VALUES (".$values.")";
      echo $insert;
      $ins = @mysql_query($insert);
      //print_r($insert);
      if($ins)
      {
      return true;
      }else
      {
      echo mysql_error($this->link);
      return false;
      }
      } */

    function update_enq_per($table, $column, $enq_id, $fmid, $fmname, $company, $pos, $street, $taluka, $district, $stat, $country, $pincode, $mobile, $phno, $email, $location) {

        $sql = sprintf("update table enquiry_per_detail '$enq_id','$fmid','$fmname','$company','$pos','$street','$taluka','$district','$stat','$country','$pincode','$mobile','$phno','$email','$location')");
        $rs = mysql_query($sql, $this->link);
        if (!$rs) {
            echo mysql_error($this->link);
        } else {
            return $rs;
        }
    }
	function update_doar_in_report($enq_id,$date,$name,$staffid){
	
	echo $sql = sprintf("update reports_of_enquiry set d_o_initial_review='$date', name_of_initial_inspector='$name',id_of_initial_inspector='$staffid' where enq_id='$enq_id' and isactive=1"); 
		            $rs=mysql_query($sql,$this->link);
		            if(!$rs){
			         echo mysql_error($this->link);
			         }else{
			        return $rs;}	
	}

}

?>