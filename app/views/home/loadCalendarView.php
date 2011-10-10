<?
//check if time is set in the URL
if(isset($month)) $time = $month;
else $time = time();

$today = date("Y/n/j", time());

$current_month = date("n", $time);
$current_year = date("Y", $time);
$current_month_text = date("F Y", $time);

$total_days_of_current_month = date("t", $time);

$events = array();

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
    <caption><?=$current_month_text;?></caption>
    <thead>
        <tr>
            <th abbr='Monday' scope='col' title='Monday'>M</th>
            <th abbr='Tuesday' scope='col' title='Tuesday'>T</th>
            <th abbr='Wednesday' scope='col' title='Wednesday'>O</th>
            <th abbr='Thursday' scope='col' title='Thursday''>T</th>
            <th abbr='Friday' scope='col' title='Friday'>F</th>
            <th abbr='Saturday' scope='col' title='Saturday'>L</th>
            <th abbr='Sunday' scope='col' title='Sunday'>S</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td abbr='<?=$previous_month_text;?>' colspan='3' id='prev'><a href='#' class='loadCalendar' title='<?=$previous_month;?>'>&laquo; <?=$previous_month_text;?></a></td>
            <td>&nbsp;</td>
            <td abbr='<?=$next_month_text;?>' colspan='3' id='next'><a href='#' class='loadCalendar' title='<?=$next_month;?>'><?=$next_month_text;?> &raquo;</a></td>
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
            if($date_form == $today) $cal .= " class='today'";
            ///check if any event stored for this date in $events array
            if(array_key_exists($day, $events)){
                //adding the date_has_event class to the <td> and close it
                $cal .= " class='date_has_event ";
                //IF THIS IS EVENT IN CURRENT POSSITION
                if($events[$day]['currentEvent']) $cal .= " current";
                $cal .= "'> ";

                //adding the eventTitle and eventContent wrapped with <span> and <li> to <ul>
                $cal .= "<a href='#' onclick='javascript: showEventDetails(\"".$events[$day]['date']."\", \"".$events[$day]['project_id']."\");' >";
                $cal .= $day;
                $cal .= "</a>";
            }else{
                //if there is not event on that date then just close the <td> tag
                $cal .= "> ".$day;
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