<?php 

class Calendar {
    protected $weeks =array();
    protected $timestamp;

    public function __construct($ym){
        $this->timestamp=strtotime($ym."-01");
        if($this->timestamp===false){
            $this->timestamp=time();
        }
    }

    public function create(){
        $lastday=date("t",$this->timestamp);

        $youbi=date("w",mktime(0,0,0,date("m",$this->timestamp),1,date("Y",$this->timestamp)));

        $weeks =array();
        $week ='';
        $week .=str_repeat('<td></td>',$youbi);
        for($day=1;$day<=$lastday;$day++,$youbi++){
            $week .= sprintf('<td class="youbi_%d">%d</td>',$youbi %7,$day);

            if($youbi % 7 == 6 || $day == $lastday){
                if($day==$lastday){
                    $week .=str_repeat('<td></td>',6-($youbi % 7));
                }
                $this->
                    weeks[] = '<tr>' . $week . '</tr>';
                $week = '';
            }
        }
    }
    public function getweeks(){
        return $this->weeks;
    }

    public function prev(){
        return date("Y-m",mktime(0,0,0,date("m",$this->timestamp)-1,1,date("Y",$this->timestamp)));
        
    }
    public function next(){
        return date("Y-m",mktime(0,0,0,date("m",$this->timestamp)+1,1,date("Y",$this->timestamp))); 
    }
    public function yearmonth(){
        return date("Y-m",$this->timestamp);
    }
}

//Now
$ym=isset($_GET['ym']) ? $_GET['ym'] : date("Y-m");
?>

