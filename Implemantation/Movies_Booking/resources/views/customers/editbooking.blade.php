@extends('layouts.app')
@section('title')seat @endsection

@section('content')
<form class="well form-horizontal" action="{!! url('editbooking/{{id}}') !!}" method="POST" enctype="multipart/form-data" id="chseat">
    @csrf
    {!! method_field('put')!!}
  

    <input type="text" name="user_id" value="{!!(Auth::user()->id)!!}" hidden/>

    



<div class="seat">
    <div class="seatinfo" style="margin-left:80px; margin-top:-10px;">
               
             
              @foreach($book as $bks)
                 
                  <input  type="text" name="seats" id="selectbokseat" value="{{$bks->book_seats}}" style="height:40px;width:200px;margin-left:20px;" >
                  <input type="text" name="mov_id" value="{{$bks->mov_id}}" hidden/>
                  <input type="text" name="show_id" value="{{$bks->show_id}}" hidden/>
             @endforeach
            
     
        
          <p> No of Seat:  <input type="text" id="totseat" name="totseat" value="0" style="height:30px;width:70px;"></input></p>
         <p style="margin-left:300px;margin-top:-40px;">Total price:  <input type="text" name="totprice" id="totprice" value="0" style="height:30px;width:70px;"></input></p>
           <p style="margin-left:500px;margin-top:-60px;">Selected Seat:<textarea name="seats" id="selectseat" style="height:40px;width:200px;margin-left:20px;" hidden></textarea>
          <button id='btn' class="btn btn-primary"value="Refresh Page" onClick="window.location.reload()">Reset Seat</button>

    
   </div>

       <div class="scc">
       
       </div>
  

         <div id="holder">
               <ul  id="place">
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
                <legend><center> <input type="submit" value="Reserve" class="btn btn btn-primary" id="reserve"></center></legend>
          </div>
        

          <!--usinj javascript to seatchar!-->
          <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript">
          </script>
        
         
               <script type="text/javascript">
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
             /* getting booked seat*/
                  var bk=[];
                     boxvalue = document.getElementById('selectbokseat').value;
                     bk.push(boxvalue);
                     var book=JSON.parse("[" + bk + "]");
                     var bookedSeats=book;
                   

                       /*booked seat change color into red*/
                            init(bookedSeats);
                            $('.' + settings.seatCss).click(function( event )  {
                            if ($(this).hasClass(settings.selectedSeatCss)){
                                $(this).css("background-color","yellow");      
                            }
                           else{
                           $(this).toggleClass(settings.selectingSeatCss);
  
                           
                        }
                          });
                       /*counting totseat and totprice of select seat*/  
  
                           var count = 0;
                           var countEl = document.getElementById("totseat");
                           var price= document.getElementById("totprice");


                    /* for selection seat on single click*/

                           $("#place .seat").one( "click", function( event ) {
                           count++
                           countEl.value=count;
                           price.value=count*300;
                           $(this).css("background-color","yellow");       	      
                          });

                    /*deselect seat on dblclick*/
                          $("#place .seat").dblclick( "click", function( event ) {
                            var count2 = document.getElementById("totseat");
                            var countEl = document.getElementById("totseat");
                            var price= document.getElementById("totprice");
                            count--
                            countEl.value=count;
                             price.value=count*300;
                           $(this).css("background-color","");
                           });


  
                   var seats= document.getElementById("seats");
                   $('#btnShow').click(function () {
                   var str = [];
                   $.each($('#place li.' + settings.selectedSeatCss + ' a, #place li.'+ settings.selectingSeatCss + ' a'), function (index, value) {
                   document.getElementById("seatnumber") =str.push($(this).attr('title'));
                  });
                  })
                  var seats= document.getElementById("seats");
                  $("#place .seat").one( "click", function( event ) {
                  var str = [], item;
                   $.each($('#place li.' + settings.selectingSeatCss + ' a'), function (index, value) {
                 item = $(this).attr('title');
                 str.push(item);
        
                });
               $( "#selectseat" ).html( str.join(',') );
    
               });
               $("#place .seat").dblclick( "click", function( event ) {
               var str = [], item;
               $.each($('#place li.' + settings.selectingSeatCss + ' a'), function (index, value) {
              item = $(this).attr('title');
              str.push(item);
        
               });
              $( "#selectseat" ).html( str.join(',') );
    
              });

 
 

  


 

  
          
                </script>
                </form>
                </div>
            
@endsection












