@extends('layouts.app')
@section('title')seat @endsection

@section('content')
<div class="seat">
<div class="seatinfo" style="margin-left:100px;">
    No of Seat: <p> <input type="text" id="totseat" value="0" style="height:30px;width:70px;"></input></p>
    Total price:  <p><input type="text" id="totprice" value="0" style="height:30px;width:70px;float:left"></input></p>
    </div>
      <div id="holder">
  
          <ul  id="place" onclick="Click()" ondblclick="doubleclick()">
          
  
  
  
          </ul>
  
      </div>
      <div style="float:left;">
      <ul id="seatDescription">
  
         <div class="Available"> <li>Available Seat</li></div>
         <div class="Booked"><li>Booked Seat</li></div>
            <div class="YourSeat"> <li>Your Seat Seat</li></div>
      </ul>
      </div>
          <div style="clear:both;width:100%">
          <input type="text" id="btnShowNew" value="Show Selected Seats" />
          <input type="button" id="btnShow" value="Show All" />
          </div>
          <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript">
          </script>
           <script src="script.js"></script>
           <script>
          var settings = {
                 rows: 15,
                 cols: 10,
                 rowCssPrefix: 'row-',
                 colCssPrefix: 'col-',
                 seatWidth: 35,
                 seatHeight: 35,
                 seatCss: 'seat',
                 selectedSeatCss: 'selectedSeat',
                 selectingSeatCss: 'selectingSeat'
             };
  
  
             var init = function (reservedSeat) {
                  var str = [], seatNo, className;
                  for (i = 0; i < settings.rows; i++) {
                      for (j = 0; j < settings.cols; j++) {
                          seatNo = (i + j * settings.rows + 1);
                          className = settings.seatCss + ' ' + settings.rowCssPrefix + i.toString() + ' ' + settings.colCssPrefix + j.toString();
                          if ($.isArray(reservedSeat) && $.inArray(seatNo, reservedSeat) != -1) {
                              className += ' ' + settings.selectedSeatCss;
                          }
                          str.push('<li class="' + className + '"' +
                                    'style="top:' + (j * settings.seatHeight).toString() + 'px;left:' + (i * settings.seatWidth).toString() + 'px">' +
                                    '<a title="' + seatNo + '">' + seatNo + '</a>' +
                                    '</li>');
                      }
                  }
                  $('#place').html(str.join(''));
              };
  
  
  
              //case I: Show from starting
              //init();
  
              //Case II: If already booked
              var bookedSeats;
              init(bookedSeats);
              $('.' + settings.seatCss).click(function () {
  if ($(this).hasClass(settings.selectedSeatCss)){
      alert('This seat is already reserved');
  }
  else{
      $(this).toggleClass(settings.selectingSeatCss);
      }
  });
  
  var count = 0;
   var countEl = document.getElementById("totseat");
   function Click(){
       count++;
       countEl.value = count;
  
   }

   
  
  
  
  
   
  
  
  
  
  
  $('#btnShow').click(function () {
      var str = [];
      $.each($('#place li.' + settings.selectedSeatCss + ' a, #place li.'+ settings.selectingSeatCss + ' a'), function (index, value) {
          str.push($(this).attr('title'));
      });
      alert(str.join(','));
  })
  
  $('#btnShowNew').click(function () {
      var str = [], item;
      $.each($('#place li.' + settings.selectingSeatCss + ' a'), function (index, value) {
          item = $(this).attr('title');
          str.push(item);
      });
      alert(str.join(','));
  });
 
  
             </script>
             </div>
@endsection












