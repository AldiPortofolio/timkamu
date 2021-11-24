<section id="app-modals">

	<div class="modal" tabindex="-1" role="dialog" id="page-uc">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title">Page information</h5>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          		<span aria-hidden="true">&times;</span>
		        	</button>
		      	</div>
		      	<div class="modal-body">
		        	<p>Page is still under construction.</p>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Okay</button>
		      	</div>
    		</div>
	  	</div>
	</div>

	<div class="modal close-all" tabindex="-1" role="dialog" id="member-stats">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
		      	<div class="modal-body">
		      		<div class="quick-stats-container">
  			      		<div class="modal-spinner"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>
  			      		<div class="quick-stats-content">
  			      			<h3 class="mb-20" id="username">brosot7</h3>
  			      			<p class="o3 mb-10">Bet stats</p>
  				        	<table class="table table-sm table-bordered table-hover mb-20">
  				        	    <tbody>
  				        	        <tr>
  				        	        	<td>Win rate</td>
  				        	        	<td class="text-right" id="win-rate">72%</td>
  				        	        </tr>
  				        	        <tr>
  				        	        	<td>Total slips</td>
  				        	        	<td class="text-right" id="total-slips">1,000</td>
  				        	        </tr>
  				        	        <tr>
  				        	        	<td>Total win</td>
  				        	        	<td class="text-right" id="win-slip">720</td>
  				        	        </tr>
  				        	    </tbody>
  				        	</table>
  			      			<p class="o3 mb-10">Money stats</p>
  				        	<table class="table table-sm table-bordered table-hover mb-20">
  				        	    <tbody>
  				        	        <tr>
  				        	        	<td>Total LP recharge (count)</td>
  				        	        	<td class="text-right"><span id="count-lp-recharge">12</span></td>
  				        	        </tr>
  				        	        <tr>
  				        	        	<td>Total LP recharge (amount)</td>
  				        	        	<td class="text-right"><span id="amt-lp-recharge">123</span><span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
  				        	        </tr>
  				        	        <tr>
  				        	        	<td>Total LP</td>
  				        	        	<td class="text-right"><span id="amt-lp">2,502</span><span class="money money-14 right"><img src="{{ asset('img/currencies/lp.svg') }}"></span></td>
  				        	        </tr>
  				        	        <tr>
  				        	        	<td>Total BP</td>
  				        	        	<td class="text-right"><span id="amt-bp">502</span><span class="money money-14 right"><img src="{{ asset('img/currencies/bp.svg') }}"></span></td>
  				        	        </tr>
  				        	        <tr>
  				        	        	<td>Total Coins</td>
  				        	        	<td class="text-right"><span id="amt-coin">25</span><span class="money money-14 right"><img src="{{ asset('img/currencies/coin.svg') }}"></span></td>
  				        	        </tr>
  				        	    </tbody>
  				        	</table>
  			      			<p class="o3 mb-10">Other info</p>
  				        	<table class="table table-sm table-bordered table-hover mb-20">
  				        	    <tbody>
  				        	        <tr>
  				        	        	<td>Registered</td>
  				        	        	<td class="text-right" id="regitration-date">24 Oct 2020 18.20</td>
  				        	        </tr>
  				        	        <tr>
  				        	        	<td>Phone</td>
  				        	        	<td class="text-right" id="user-phone">123123123</td>
  				        	        </tr>
  				        	        <tr>
  				        	        	<td>Email</td>
  				        	        	<td class="text-right" id="user-email">test@email.com</td>
  				        	        </tr>
  				        	    </tbody>
  				        	</table>
  				        	<div class="row">
  				        		<div class="col-6">
  				        			<a href="#" class="btn btn-block text-center mb-10 btn-sm btn-light" id="view-page">View page</a>
  				        		</div>
  				        		<div class="col-6">
  				        			<a href="#" class="btn btn-block text-center mb-10 btn-sm btn-light" id="view-lp-transactions">View LP transactions</a>
  				        		</div>
  				        		<div class="col-6">
  				        			<a href="#" class="btn btn-block text-center mb-10 btn-sm btn-light" id="view-all-bets">View all bets</a>
  				        		</div>
  				        		<div class="col-6">
  				        			<a href="#" class="btn btn-block text-center mb-10 btn-sm btn-light" id="view-all-topups">View all topups</a>
  				        		</div>
  				        		<div class="col-6">
  				        			<a href="#" class="btn btn-block text-center mb-10 btn-sm btn-light" id="view-historical">View historical</a>
  				        		</div>
  				        	</div>
  			      		</div>
		      		</div>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-sm btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#search-user-by-username">User search</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal" tabindex="-1" role="dialog" id="invalid-range">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title">Page information</h5>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          		<span aria-hidden="true">&times;</span>
		        	</button>
		      	</div>
		      	<div class="modal-body">
		        	<p>Pilihan tidak bisa melebihi 30 hari</p>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Okay</button>
		      	</div>
    		</div>
	  	</div>
	</div>

	<div class="modal" tabindex="-1" role="dialog" id="event-performance-select-modal">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title">Event Performance</h5>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          		<span aria-hidden="true">&times;</span>
		        	</button>
		      	</div>
		      	<div class="modal-body">
		        	<div class="form-group mb-0">
                        <select class="form-control form-control-sm h-100" id="ep_event_id">
                            <option disabled>--- 20 most recent events ---</option>
                            @foreach ($all_events->sortByDesc('id') as $itm)
							<option value="{{ $itm->id }}" @if((int)app('request')->input('event') === $itm->id) selected @endif>[#{{ $itm->id }}] {{ $itm->name }} - {{ \Carbon\Carbon::parse($itm->start_date)->format('D M Y H:i') }} {{ $itm->league_game_id ? '- '.$itm->league_games->leagues->name : '' }}</option>
							@endforeach
                        </select>
                    </div>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
		        	<button type="button" class="btn btn-sm btn-primary btn-sbmt-epbyid">Go</a>
		      	</div>
    		</div>
	  	</div>
	</div>

	<div class="modal" tabindex="-1" role="dialog" id="event-betters-select-modal">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title">List of Event Participants</h5>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          		<span aria-hidden="true">&times;</span>
		        	</button>
		      	</div>
		      	<div class="modal-body">
		        	<div class="form-group mb-0">
                        <select class="form-control form-control-sm h-100" id="ep_betters_event_id">
                            <option disabled>--- 20 most recent events ---</option>
                            @foreach ($all_events->sortByDesc('id') as $itm)
							<option value="{{ $itm->id }}" @if((int)app('request')->input('event') === $itm->id) selected @endif>[#{{ $itm->id }}] {{ $itm->name }} - {{ \Carbon\Carbon::parse($itm->start_date)->format('D M Y H:i') }} {{ $itm->league_game_id ? '- '.$itm->league_games->leagues->name : '' }}</option>
							@endforeach
                        </select>
                    </div>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancel</button>
		        	<button type="button" class="btn btn-sm btn-primary btn-sbmt-epbtrbyid">Go</a>
		      	</div>
    		</div>
	  	</div>
	</div>

	<div class="modal" tabindex="-1" role="dialog" id="search-user-by-username">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
		      	<div class="modal-header">
		        	<h5 class="modal-title">Search member</h5>
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          		<span aria-hidden="true">&times;</span>
		        	</button>
		      	</div>
		      	<div class="modal-body">
		        	<div class="row">
		        		<div class="col-8 pr-0">
		        			<div class="form-group">
		        			    <input type="text" class="form-control form-control-sm first-focus search-by-username-modal-input" placeholder="enter your search">
		        			</div>
		        		</div>
		        		<div class="col-4">
		        			<div class="form-group">
		        			    <select class="form-control form-control-sm search-by-type-modal-input">
		        			    	<option value="username" selected>Username</option>
		        			    	<option value="email">Email</option>
		        			    	<option value="phone">Phone</option>
	        			        </select>
		        			</div>
		        		</div>
		        		<div class="col-12">
		        			<div class="form-group">
		        			    <button type="button" class="btn btn-sm btn-primary btn-block has-spinner user-search-by-username-btn">
		        			        <div class="info-container"><i data-feather="search" class="btn-icon left"></i>Search</div>
		        			        <div class="spinner-container">
		        			            <div class="spinner-border"></div>
		        			        </div>
		        			    </button>
		        			</div>
		        		</div>
		        	</div>
		        	<div class="user-result-table-container d-none">
		        		<table class="table table-sm table-bordered table-hover w-100">
		        		    <thead>
		        		        <tr>
		        		            <th class="w-10">[ID]</th>
		        		            <th>Username</th>
		        		        </tr>
		        		    </thead>
		        		    <tbody>
		        		        <tr>
		        		        	<td><span class="o3 mr-1">[55423]</span></td>
		        		        	<td>
		        		        		<div class="btn-group" role="group">
		        		        		    <a href="#" data-toggle="dropdown" class="user-drop"><i data-feather="arrow-down-right" class="user-more left"></i><span>fjahja</span><br><span class="o3 black"><em>ferdianjahja@gmail.com</em></span></a>
		        		        		    <div class="dropdown-menu">
		        		        		        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#member-stats">View quick stats</a>
		        		        		        <a class="dropdown-item" href="/admin2/member-view">View page</a>
		        		        		        <a class="dropdown-item" href="#">View LP transactions</a>
		        		        		        <a class="dropdown-item" href="#">View all bets</a>
		        		        		        <a class="dropdown-item" href="#">View all topups</a>
		        		        		        <a class="dropdown-item" href="/admin2/member-historical">View historical</a>
		        		        		    </div>
		        		        		</div>
		        		        	</td>
		        		        </tr>
		        		    </tbody>
		        		</table>
		        		<p class="o5"><em>Showing maximum 10 results. Refine your search if the user is not found.</em></p>
		        	</div>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
		      	</div>
    		</div>
	  	</div>
	</div>
	
</section>