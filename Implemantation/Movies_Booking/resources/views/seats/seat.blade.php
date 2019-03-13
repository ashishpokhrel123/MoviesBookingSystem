@extends('layouts.app')
@section('title')seat @endsection

@section('content')
                <h1>Hello</h1>
          <div id="holders">
      
              <ul  id="place" onclick="Click();remove();">
      
      
      
              </ul>
          </div>
          <div style="float:left;">
          <ul id="seatDescription">
      
              <li style="background-color:green">Available Seat</li>
              <li style="background-color:red; margin-left:3px;">Booked Seat</li>
              <li style="background-color:yellow;margin-left:8px">Your Seat Seat</li>
          </ul>
          </div>
              <div style="clear:both;width:100%">
              <input type="text" id="btnShowNew" value="Show Selected Seats" />
              <input type="button" id="btnShow" value="Show All" />
              </div>
              
               <script>
              var settings = {
                     rows: 10,
                     cols: 15,
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
                                        'style="top:' + (i * settings.seatHeight).toString() + 'px;left:' + (j * settings.seatWidth).toString() + 'px">' +
                                        '<a title="' + seatNo + '">' + seatNo + '</a>' +
                                        '</li>');
                          }
                      }
                      $('#place').html(str.join(''));
                  };
      
      
      
                  //case I: Show from starting
                  //init();
      
                  //Case II: If already booked
                  var bookedSeats = [5, 10, 25];
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
       var countEl = document.getElementById("inc");
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
               
              
@endsection