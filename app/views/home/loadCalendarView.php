<? 
//check if time is set in the URL
if(isset($currTime)) $time = $currTime;
else $time = time();

$today = date("Y/n/j", time());

$current_month = date("n", $time);
$current_year = date("Y", $time);
$current_month_text = date("F Y", $time);

$total_days_of_current_month = date("t", $time);

$events = isset($eventCollection) ? $eventCollection : array();

$first_day_of_month = mktime(0, 0, 0, $current_month, 1, $current_year);

//geting Numeric representation for the first day of the month. 0 (for Sunday) through 6 (for Saturday).
$first_w_of_month = date("w", $first_day_of_month);

//calculate how many rows will be in the calendar to show the dates
$total_rows = ceil(($total_days_of_current_month + $first_w_of_month)/7);

//trick to show empty cell in the first row if the month doesn't start from Sunday
$day = -($first_w_of_month-1);

$next_month = mktime(0, 0, 0, $current_month+1, 1, $current_year);
$next_month_text = date("M Y", $next_month);

$previous_month = mktime(0, 0, 0, $current_month-1, 1, $current_year);
$previous_month_text = date("M Y", $previous_month);

$next_year = mktime(0, 0, 0, $current_month, 1, $current_year+1);
$next_year_text = date("F Y", $next_year);

$previous_year = mktime(0, 0, 0, $current_month, 1, $current_year-1);
$previous_year_text = date("F Y", $previous_year);

?>

<table summary='Calendar'>
    <caption><?=$_t['months'][$params['lang']][$current_month];?></caption>
    <thead>
        <tr>
            <th abbr='<?=$_t['days'][$params['lang']][0];?>' scope='col' title='<?=$_t['days'][$params['lang']][0];?>'><?=substr($_t['days'][$params['lang']][0], 0, 3);?></th>
            <th abbr='<?=$_t['days'][$params['lang']][1];?>' scope='col' title='<?=$_t['days'][$params['lang']][1];?>'><?=substr($_t['days'][$params['lang']][1], 0, 3);?></th>
            <th abbr='<?=$_t['days'][$params['lang']][2];?>' scope='col' title='<?=$_t['days'][$params['lang']][2];?>'><?=substr($_t['days'][$params['lang']][2], 0, 3);?></th>
            <th abbr='<?=$_t['days'][$params['lang']][3];?>' scope='col' title='<?=$_t['days'][$params['lang']][3];?>'><?=substr($_t['days'][$params['lang']][3], 0, 4);?></th>
            <th abbr='<?=$_t['days'][$params['lang']][4];?>' scope='col' title='<?=$_t['days'][$params['lang']][4];?>'><?=substr($_t['days'][$params['lang']][4], 0, 3);?></th>
            <th abbr='<?=$_t['days'][$params['lang']][5];?>' scope='col' title='<?=$_t['days'][$params['lang']][5];?>'><?=substr($_t['days'][$params['lang']][5], 0, 3);?></th>
            <th abbr='<?=$_t['days'][$params['lang']][6];?>' scope='col' title='<?=$_t['days'][$params['lang']][6];?>'><?=substr($_t['days'][$params['lang']][6], 0, 3);?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td abbr='<?=$previous_month_text;?>' colspan='3' id='prev'>
                <a href='#' class='loadCalendar' cal-time='<?=$previous_month;?>' cal-year="<?=($current_month-1)<=0?($current_year-1):$current_year;?>" cal-month="<?=($current_month-1)<=0?12:($current_month-1);?>">
                    &laquo; <?=$previous_month_text;?>
                </a>
            </td>
            <td>&nbsp;</td>
            <td abbr='<?=$next_month_text;?>' colspan='3' id='next'>
                <a href='#' class='loadCalendar' cal-time='<?=$next_month;?>' cal-year="<?=($current_month+1)>12?($current_year+1):$current_year;?>" cal-month="<?=($current_month+1)>12?1:($current_month+1);?>">
                    <?=$next_month_text;?> &raquo;
                </a>
            </td>
        </tr>
    </tfoot>
<tr>
<?
$cal ='';
for($i=0; $i<$total_rows; $i++){
    for($j=0; $j<7; $j++){
        $day++;
        if($day>0 && $day<=$total_days_of_current_month){
            //YYYY-MM-DD date format
            $date_form = $current_year.'/'.$current_month.'/'.$day;

            $cal .= "<td";

            //check if the date is today
            if($date_form == $today) $cal .= " class='todayDay";
            ///check if any event stored for this date in $events array
            if(array_key_exists($day<10?'0'.$day:$day, $events)){
                //adding the date_has_event class to the <td> and close it
                if($date_form == $today) $cal .= " eventDay'>";
                else $cal .= " class='eventDay'>";

                //adding the eventTitle and eventContent wrapped with <span> and <li> to <ul>
                $cal .= "<a href='".DS.$params['lang'].DS."calendar".DS.date('Y-m').'-'.($day<10?'0'.$day:$day)."' >";
                $cal .= $day;
                $cal .= "</a>";
            }else{
                //if there is not event on that date then just close the <td> tag
                if($date_form == $today) $cal .= " '>".$day;
                else $cal .= "> ".$day;
            }
            $cal .= "</td>";
        }else{
            //showing empty cells in the first and last row
            $cal .= "<td>&nbsp;</td>";
        }
    }
    $cal .= "</tr>";
    if(($i+1)<$total_rows) $cal .= "<tr>";
}
echo $cal;
?>