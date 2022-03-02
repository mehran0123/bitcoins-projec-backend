@extends('layouts.master')
@section('title','Bank list')
{{-- @section('banks-has-open','has-open has-active') --}}
@section('bank','has-active')
<style>
    body{font-family: Lato;}
    caption{font-size: 22pt;color:#fff !important; margin: 10px 0 20px 0; font-weight: 700;}
    table.calendar{width:100%; border:1px solid #000;}
    td.day{width: 14%; height: 140px; border: 1px solid #000; vertical-align: top;background-color:#ffffff14;position: relative;}
    td.day span.day-date{font-size: 14pt; font-weight: 700;}
    th.header{background-color: #fbae1c; color: #fff; font-size: 14pt; padding: 5px;}
    .not-month{background-color: #0006169e;}
    td.today {background-color:#fbae1c;}
    td.day span.today-date{font-size: 16pt;}
    a.calendar-btn:hover {
    text-shadow: 2px 1px 3px #000;
}
span.earning_points {
    background: #fbae1c;
    color: #000;
    height: 60px;
    width: 60px;
    border-radius: 100px;
    position: absolute;
    bottom: 15px;
    right: 0;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
}
@media (max-width: 676px){
table tr > * {
     display: table-cell !important;
}
table tr{
     display: table-row !important;
}
span.earning_points {
    background: #fbae1c;
    color: #000;
    height: 35px;
    width: 35px;
    border-radius: 100px;
    position: absolute;
    bottom: 11px;
    right: 3px;
    font-size: 11px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
}

th.header {
    background-color: #fbae1c;
    color: #fff;
    font-size: 10pt;
}
}
   </style>
<style>
    i{
        cursor: pointer;
    }
    .img-fluid{
        width: 60px !important;
        height: 60px !important;
    }

</style>
@section('content')
 <!-- .page -->
 <div class="content-header">
    <div class="box">
        <div class='row'>
            <div class='col-md-10'>
@php

function searchForPer($id, $array) {
   foreach ($array as $key => $val) {
       if ($key === $id) {
          return $val;
       }
   }
   return;
}
function build_calendar($month,$year,$bonusdata) {

     // Create array containing abbreviations of days of week.
     $daysOfWeek = array('Sun','Mon','Tues','Wed','Thurs','Fri','Sat');

     // What is the first day of the month in question?
     $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

     // How many days does this month contain?
     $numberDays = date('t',$firstDayOfMonth);

     // Retrieve some information about the first day of the
     // month in question.
     $dateComponents = getdate($firstDayOfMonth);

     // What is the name of the month in question?
     $monthName = $dateComponents['month'];

     // What is the index value (0-6) of the first day of the
     // month in question.
     $dayOfWeek = $dateComponents['wday'];

     // Create the table tag opener and day headers

     $calendar = "<table class='calendar'>";
     $calendar .= "<caption>$monthName $year</caption>";
     $calendar .= "<tr>";

     // Create the calendar headers

     foreach($daysOfWeek as $day) {
          $calendar .= "<th class='header'>$day</th>";
     }

     // Create the rest of the calendar

     // Initiate the day counter, starting with the 1st.

     $currentDay = 1;

     $calendar .= "</tr><tr>";

     // The variable $dayOfWeek is used to
     // ensure that the calendar
     // display consists of exactly 7 columns.

     if ($dayOfWeek > 0) {
          $calendar .= "<td colspan='$dayOfWeek' class='not-month'>&nbsp;</td>";
     }

     $month = str_pad($month, 2, "0", STR_PAD_LEFT);

     while ($currentDay <= $numberDays) {

          // Seventh column (Saturday) reached. Start a new row.

          if ($dayOfWeek == 7) {

               $dayOfWeek = 0;
               $calendar .= "</tr><tr>";

          }

          $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);

          $date = "$year-$month-$currentDayRel";
          //DAYS//

          if ($date == date("Y-m-d")){

           $calendar .= "<td class='day today' rel='$date'><span class='today-date'>$currentDay</span></td>";
          }
          else{
           $calendar .= "<td class='day' rel='$date'><span class='day-date'>$currentDay</span><span class='earning_points'>".searchForPer($date, $bonusdata)."</span></td>";
          }
          // Increment counters

          $currentDay++;
          $dayOfWeek++;

     }



     // Complete the row of the last week in month, if necessary

     if ($dayOfWeek != 7) {

          $remainingDays = 7 - $dayOfWeek;
          $calendar .= "<td colspan='$remainingDays' class='not-month'>&nbsp;</td>";

     }

     $calendar .= "</tr>";

     $calendar .= "</table>";

     return $calendar;

}
if($_GET){
$m = $_GET['m'];
}else{
$m ='';
}
if($_GET){
 $y=$_GET['y'];
}else{
$y ='';
}

function build_previousMonth($month,$year){

 $prevMonth = $month - 1;

  if ($prevMonth == 0) {
   $prevMonth = 12;
  }

 if ($prevMonth == 12){
  $prevYear = $year - 1;
 } else {
  $prevYear = $year;
 }

 $dateObj = DateTime::createFromFormat('!m', $prevMonth);
 $monthName = $dateObj->format('F');

 return "<div style='width: 33%; display:inline-block;'><a class='calendar-btn' href='?m=" . $prevMonth . "&y=". $prevYear ."'>Previous Month</a></div>";
}

function build_nextMonth($month,$year){

 $nextMonth = $month + 1;

  if ($nextMonth == 13) {
   $nextMonth = 1;
  }

 if ($nextMonth == 1){
  $nextYear = $year + 1;
 } else {
  $nextYear = $year;
 }

 $dateObj = DateTime::createFromFormat('!m', $nextMonth);
 $monthName = $dateObj->format('F');

 return "<div style='width: 33%; display:inline-block;'><a class='calendar-btn' href=?>Today</a></div><div style='width: 33%; display:inline-block; text-align:right;'><a class='calendar-btn' href='?m=" . $nextMonth . "&y=". $nextYear ."'>Next Month</a></div>";
}


@endphp

@php
     $month = $m;
     $year = $y;
  // parse_str($_SERVER['QUERY_STRING']);

   if ($m == ""){

    $dateComponents = getdate();
    $month = $dateComponents['mon'];
    $year = $dateComponents['year'];
   } else {

     $month = $m;
     $year = $y;

   }

 echo build_previousMonth($month, $year);
 echo build_nextMonth($month,$year);
 echo build_calendar($month,$year,$bonusdata);


@endphp
        
            </div>
        </div>
</div>
</div><!-- /.page -->

@include('admin.banks.js.index')
@endsection


