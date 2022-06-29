<?php
    function get_new_msg($last_id)
    {
        $file_dt = file_get_contents('../chat/data.data');
        //逐行解析
        $file_dt_line = explode("\n", $file_dt);
        $new_msg_start = 0;
        $find=false;
        for($i=0;$i<count($file_dt_line);$i++){
            if($last_id==json_decode($file_dt_line[$i], true)['msg_id']){
                $new_msg_start=$i;
                $find=true;
            }
        }
        $new_msg_arr = array();
        $j=0;
        for($i=$new_msg_start+1;$i<count($file_dt_line);$i++){
            if($file_dt_line[$i]!='')
                $new_msg_arr[$j] = $file_dt_line[$i];
            $j=$j+1;
        }
        if($find==true)
            return $new_msg_arr;
        else
            return null;
    }
    $last_msg=$_GET['last_msg_id'];
    if ($last_msg=='0'){
        $file_dt = file_get_contents('../chat/data.data');
        $file_dt_line = explode("\n", $file_dt);
        echo json_decode($file_dt_line[count($file_dt_line)-2], true)['msg_id'];
        exit();
    }
    set_time_limit(0);//无限请求超时时间
    $time_max=20;//最大请求时间
    $time=0;
    while (true){      
        sleep(1);    //延迟一秒
        $time++;      
        $new_msg=get_new_msg($last_msg);
        if($new_msg==null)
            echo '';
        if(count($new_msg)!=0){
            $return_txt="";
            for($i=0;$i<count($new_msg);$i++){
                $return_txt=$return_txt.$new_msg[$i]."\n";
            }
            echo $return_txt;
            exit();      
        }      
                
        //到指定超时时间还未返回数据则断开连接     
        if($time==$time_max){        
            echo "null";    
            exit();      
        }      
    }   
?>