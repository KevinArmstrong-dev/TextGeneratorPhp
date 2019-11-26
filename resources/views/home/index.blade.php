@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
    <!-- Display the weather here -->
      	<div class="panel-heading">
			
		</div>

			<!-- Display this panel only if the user is authenticated -->
			@if (Auth::check())
				<div class="panel panel-default">
				     <label  class="">Welcome {{$username}}</label></br>
				     <label  class="">Date Started {{$dateStarted}}</label></br>
				     <label  class="">Total Distance In Commute {{$totalDistance}}</label></br>
				     <label  class="">Amount of CO2 emissions {{$emissionAmount}}</label></br>
				     <label  class="">Cost To Offset your Emission {{$cost}}</label></br>
				     
					<div class="panel-heading">
					 	<h4>Plan A Trip</h4>
					</div>
					
					
					<div class="panel-body">
						<!-- Display Validation Errors -->
						@include('common.errors')

					</div>
				</div>
				
			   <div class="form-group row">
			      <form action = "/home" method= "POST" class = "form-horizontal">
			          {{csrf_field() }}
			     
                        <label  class="col-md-4 col-form-label text-md-right">Starting Position</label>
                              <input type="text" name="origin" >
                                    <select name = 'start'>                                                                                                                                                                                                                                                                                                               
                                      <option value="none"></option>
                                      <option value="Dawson">Dawson</option>
                                      <option value="Home">Home</option>
                                      <option value="house">FriendHouse</option>
                                    </select>
                        <label  class="col-md-4 col-form-label text-md-right">Destination</label>
                        <input type="text" name="destinationTxt" >
                         <select name = 'destination'>
                            <option value="none"></option>
                            <option value="Dawson">Dawson</option>
                            <option value="Home">Home</option>
                            <option value="house">FriendHouse</option>
                       </select>
                       
                       <div class="">
                           
                            <label  class="col-md-4 col-form-label text-md-right">Transportation Mode</label>
                            
                            <select name = 'transportationMode'>
                                <option value="drive">Drive</option>
                                <option value="carpool">CarPool with 2 other people</option>
                                <option value="publicTransport">Take Public Transport</option>
                                <option value="bike">Bike</option>
                                 <option value="walk">Walk</option>
                           </select>
                           
                       </div>
                         <div>
                             <input type="submit" name="" Value = "Go"/>
                         </div> 
                     </form>
               </div> 
			@endif
			
			<!-- All Trips with pagination-->
			@if (count($trips) > 0)
				<div class="panel panel-default">
					<div class="panel-heading">
						All trips
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th>Recent Trips</th>
								<th>&nbsp;</th>
							</thead>
							<tbody>
								<tr>
									<th class="table-text"> Transport Mode</th>
									<th class="table-text">Engine</th>
									<th class="table-text"> Distance Travelled</th>
									<th class="table-text"> Trip Date</th>
									<th class="table-text">Travel Time  </th>
									<th class="table-text">CO2 Emitted</th>
								</tr>
								@foreach ($trips as $trip)
									<tr>
										<td class="table-text">
											{{ $trip->mode }}</td>
						
										<td class="table-text">
											{{ $trip->engine }}</td>
											
								    	<td class="table-text">
											{{ $trip->distance }} Km</td>
											
										<td class="table-text">
											{{ $trip->created_at }}</td>
										
										<td class="table-text">
											{{ $trip->travelTime }}</td>
											
										<td class="table-text">
											{{ $trip->co2emissions }}</td>
											
									</tr>
									
								@endforeach
							</tbody>
						</table>
						{!! $trips->render() !!}
					</div>
				</div>
			@endif

            
		</div>
	</div>
@endsection
