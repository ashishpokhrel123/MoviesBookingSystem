@extends('layouts.app')
@section('title')seat @endsection

@section('content')
<div class="seat">
<div class="seatinfo" style="margin-left:80px; margin-top:-10px;">
    <p> No of Seat:  <input type="text" id="totseat" minimum="0" value="0" style="height:30px;width:70px;"></input></p>
    <p style="margin-left:300px;margin-top:-40px;">Total price:  <input type="text" name="totprice" id="totprice" value="0" style="height:30px;width:70px;"></input></p>
    <p style="margin-left:500px;margin-top:-60px;">Selected Seat:<textarea name="seats" style="height:40px;width:200px;margin-left:20px;"></textarea>
    <button id='btn' class="btn btn-primary"value="Refresh Page" onClick="window.location.reload()">Reset Seat</button>
    </div>
  
      <div id="holder">
  
          <ul  id="place">
              
<script>
        //validation username  using Jquery
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script> 
        
 


                    </script>
          
  
  
  
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
          <input type="button" id="btnShowNew" value="Show Selected Seats" />
          <input type="button" id="btnShow" value="Show All" />
          <div class="bookseat"><a href="">Book Seat</a></div>
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
  var price= document.getElementById("totprice");



$("#place .seat").one( "click", function( event ) {
   
 
    count++
    countEl.value=count;
    $(this).css("background-color","yellow");
    
    

					
					$.ajax({
						type:"GET",
						url:'/chooseseat',
						data:{"totprice":price},
						success: function(result){
							$("#totprice").html(result);
						}
					});
				
    




        
  });
  
  $("#place .seat").dblclick( "click", function( event ) {
   
  
     
    var count2 = document.getElementById("totseat");
  var countEl = document.getElementById("totseat");

   
    count--
  countEl.value=count;
  $(this).css("background-color","");
   



  

   
  
  });
  

  $('#btnShow').click(function () {
      var str = [];
      $.each($('#place li.' + settings.selectedSeatCss + ' a, #place li.'+ settings.selectingSeatCss + ' a'), function (index, value) {
         document.getElementById("seatnumber") =str.push($(this).attr('title'));
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











