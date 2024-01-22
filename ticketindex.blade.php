@extends('frontend.layouts.appuser')
@section('title') {{app_name()}} @endsection
@section('content')

<style type="text/css">
    ul li{
      line-height: 15px !important;
     }
    .breadcrumb{
        margin-left: 0px;
    } 
</style>

<div class="dashboard-right-box">
    <div class="dash-right-mid vheight">
        <div class="notification-heading">
                    <div class="col-sm-12">
                        
                    </div>
                        <div class="col-md-12 ">
                            <div class="row">
                                <div class="col-lg-8">
                                  <ul class="breadcrumb">
                                    <li><a href="{{ route('users.dashboard')}}">Dashboard</a></li>
                                    <li><a href="#">Tickets</a></li>
                                  </ul>
                                </div>  
                            </div>

                            <h3 class="h2-responsive font-weight-bold text-center text-info">Raise Ticket</h3>
                            <p class="text-center w-responsive mx-auto">Do you have any query/issue? Please Generate a ticket.
                            </p><br>

                            <div class="w3-bar w3-black">
                                <button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event,'London')">Tickets List</button>
                                <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Paris')">Create a new ticket</button>
                            </div><br>

                            <div id="London" class="w3-container city">
                              <h4 class="text-dark font-weight-bold">Ticket Details</h4>
                                  <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                            <th scope="col">Sr. No.</th>
                                            <th scope="col">Task</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Dated</th>
                                            <th scope="col" class="text-center">Remarks</th>
                                            <th scope="col" class="text-center">Remove</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($ticketDetails) && !empty($ticketDetails))
                                            @foreach($ticketDetails as $tickets)
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$tickets->task}}</td>
                                                <td>{{$tickets->description}}</td>
                                                <td>{{$tickets->created_at}}</td>
                                                @if($tickets->status=='1')
                                                    <td class="text-center">
                                                    <button type="button" class="btn btn-warning btn-sm">Pending</button></td>
                                                @else
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-dark btn-sm">Closed</button></td>
                                                @endif

                                                <td class="text-center">
                                                
                                                    <!-- <a class="btn btn-info" href="">Show</a>-->

                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>

                                            </td>
                                            </tr>
                                            @endforeach
                                            
                                        @endif
                                      </tbody>
                                    </table>
                                </div>





                            <div id="Paris" class="w3-container city" style="display:none">
                              <h4 class="text-danger text-center font-weight-bold">Generate a new ticket</h4><br>
                              <form id="" name="" action="{{ route('agent.ticket.generate') }}" method="POST">{{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form mb-4">
                                            <label for="name" class=""><strong>Task</strong></label>
                                            <input type="text" id="task" name="task" class="form-control" value="">
                                            @if ($errors->has('task'))
                                                <span class="text-danger">{{ $errors->first('task') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form mb-4">
                                            <label for="description" class=""><strong>Subject</strong></label>
                                            <input type="text" id="description" name="description" class="form-control" value="">
                                            @if ($errors->has('description'))
                                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form mb-4">
                                            <label for="phone" class=""><strong>Phone</strong></label>
                                            <input type="text" id="phone" name="phone" class="form-control" value="{!! isset(Auth::user()->phone) && !empty(Auth::user()->phone) ? Auth::user()->phone : '' !!}">
                                            @if ($errors->has('phone'))
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                        <div class="md-form mb-4">
                                            <label for="email" class=""><strong>Email</strong></label>
                                            <input type="text" id="email" name="email" class="form-control" value="{!! isset(Auth::user()->email) && !empty(Auth::user()->email) ? Auth::user()->email : '' !!}">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form mb-4">
                                            <label for="message"><strong>Your message</strong></label>
                                            <textarea type="text" id="message" name="message" rows="4" class="form-control md-textarea">{{ old('message') }}</textarea>
                                            @if ($errors->has('message'))
                                                <span class="text-danger">{{ $errors->first('message') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div><br>

                                <div class="form-group contact-submit">
                                    <button class="btn btn-success btn-submit">Submit</button>
                                </div>
                            </form>
                            </div>


                            
                        </div>
        </div>                
    </div>                    
</div>                

@endsection

<!-- <script>
function openCity(cityName) {
  var i;
  var x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(cityName).style.display = "block";  
}
</script> -->


<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
</script>