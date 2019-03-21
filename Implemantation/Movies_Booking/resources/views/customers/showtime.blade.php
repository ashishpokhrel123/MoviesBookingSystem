@extends('layouts.app')
@section('title')showtime @endsection

@section('content')
<div class="container">
                <ul style="font-size:20px;">
                    @if(!empty($movie))
                        @forelse($movie as $movies)
                        {{ $movies->mov_title}}<br/>
                        {{ $movies->mov_duration}}
                        <img src="{!! asset('uploads/movies/'.$movies->image) !!}" class="img-fluid img-thumbnail" id="movies_img"
                  style="">
                        @empty
                            <li>No data found</li>
                        @endforelse
                    @endif
                </ul>
            </li>
          <div class="st" style="margin:80px">
            <hr>
                    <hr>
                    <div class="map-container">
                            <div class="inner-basic division-map div-toggle" data-target=".division-details" id="divisiondetail">
                              <button class="map-point-sm" data-show=".darwin">
                                <div class="content">
                                  <div class="centered-y">
                                  <p>hello</p>
                                  </div>
                                </div>
                              </button>
                              <button class="map-point-sm" data-show=".ptown">
                                <div class="content">
                                  <div class="centered-y">
                                    <p>tommorow</p>
                                  </div>
                                </div>
                              </button>
                              <button class="map-point-sm" data-show=".philly">
                                <div class="content">
                                  <div class="centered-y">
                                    <p>23 march</p>
                                  </div>
                                </div>
                              </button>
                             
                            </div><!-- end inner basic -->
                          </div>
                          
                          
                          <div class="map-container">
                            <div class="inner-basic division-details">
                              <div class="initialmsg">
                                <p>Choose button above</p>
                              </div>
                              <div class="darwin hide">
                                <p> Hi</p>
                         
                              </div>
                              <div class="ptown hide">
                                <p>Ptown Content here</p>
                              </div>
                              <div class="philly hide">
                                <p>Philly Content here</p>
                              </div>
                            
                            </div>
                          </div>
                    
                         <style>
                             .hide {
                              display: none;
                              }
                          .map-container {
                        text-align: center;
                          }
                             </style>
                         <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript">
                         </script>
                          <script src="script.js"></script>
                        <script>
                            $(document).on('click', '.map-point-sm', function() {
                             var show = $(this).data('show');
                            $(show).removeClass("hide").siblings().addClass("hide");
});
                        </script>        
                
                @foreach($shows as $key=>$sh)
                                        <div class="time" style=" border:1px solid red;float:left;margin-left:20px;border-radius:2em">
                      
                                        <a href="{{url('/seat',$sh->show_id)}}/{{$movies->mov_id}}">{{ $sh->show_time}}</p>
                                        </div>
                                        @endforeach
 </div>

@endsection