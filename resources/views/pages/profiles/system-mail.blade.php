@extends('layouts.mana-ui')

@section('page_title', "System Mail")
@section('body_class', 'mana-ui event-index')


@section('content')
@include('includes.mana-ui.effects')
@include('includes.mana-ui.nav')


<!-- page content -->
<section id="page-content">

	<!-- page header -->
	<div id="page-title">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<h1 class="rajdhani-bold">System Mail</h1>
				</div>
			</div> 
		</div>
    </div>
    
    <!-- pagination head -->
	<div id="pagination-head">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">
					<div class="section-title position-relative">
						<h4 class="font-size-16 mb-20">Page {{ $items->currentPage() }} of {{ $items->lastPage() }}</h4>
						<div href="#" class="o5 section-title-meta-link font-size-14">
							<a href="@if($items->currentPage() === 1)#@else{{ url('profile/system-mail?page='.($items->currentPage() - 1)) }}@endif">Previous</a>
							&nbsp;&nbsp;-&nbsp;&nbsp;
							<a href="@if($items->currentPage() === $items->lastPage())#@else{{ url('profile/system-mail?page='.($items->currentPage() + 1)) }}@endif">Next</a>
						</div>
					</div>
				</div>
			</div> 
		</div>
	</div>

	<!-- event index filters -->
	<div class="system-mail-wrapper">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6">

					<div class="mailer-container d-flex">
                        @if($items->total() > 0)
                        @foreach ($items->items() as $key => $item)
                            <div class="mailer-item {{ $item->status === '1' ? 'opened' : '' }}" data-toggle="modal" data-target="#mail-{{ $item->id }}" data-id="{{ $item->id }}">
                                <div class="mailer-item-head">
                                    {{ $item->subject }}
                                </div>
                                <div class="mailer-item-meta">
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}
                                </div>
                            </div>
                        @endforeach
                        @else
                        <div class="system-mail-no-mail bd20 bg25510 d-flex align-items-center justify-content-center mb-20">
							Belum ada system mail
                        </div>
                        @endif

					</div>

				</div>
			</div> 
		</div>
	</div>

</section>

<section id="page-modals">
    @foreach ($items as $key => $item)
        <div class="modal mana-ui slim-card @if(session('success') === 'success-diamond-purchase' && $key === 0) splash @endif" tabindex="-1" role="dialog" id="mail-{{ $item->id }}">
            <div class="modal-dialog modal-dialog-centered" role="document">
                
                <div class="modal-content">
                    @include('includes.mana-ui.modal-top')
                    <div class="modal-mid">
                        <p class="o3 mb-30"><i data-feather="clock" class="mail-time-icon"></i>{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y H:i') }}</p>
                        {!! $item->message !!}
                    </div>
                    <div class="modal-actions d-flex flex-column">
                        <a href="#" class="mana-btn-54 mana-btn-red scale-onclick" data-dismiss="modal">Okay</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</section>

@include('includes.mana-ui.footer')


<style type="text/css">
    .system-mail-no-mail {
		padding: 50px 70px;
	}
    .rincian-table, .system-msg-table {
        width: 100%;
    }
    .rincian-table td {
		padding: 10px 15px;
	}
	.rincian-table tr:nth-child(even) {
	    background: rgb(0 0 0 / 10%);
	}
	.rincian-table tr:nth-child(odd) {
	    background: rgb(0 0 0 / 20%);
	}
	.rincian-table tr:first-child td:first-child {border-top-left-radius: 10px;}
	.rincian-table tr:first-child td:last-child {border-top-right-radius: 10px;}
	.rincian-table tr:last-child td:first-child {border-bottom-left-radius: 10px;}
    .rincian-table tr:last-child td:last-child {border-bottom-right-radius: 10px;}
	/*page specific*/
	.system-msg-table td {
		padding: 10px 15px;
	}
	.system-msg-table tr:nth-child(even) {
	    background: rgb(0 0 0 / 10%);
	}
	.system-msg-table tr:nth-child(odd) {
	    background: rgb(0 0 0 / 20%);
	}
	.system-msg-table tr:first-child td:first-child {border-top-left-radius: 10px;}
	.system-msg-table tr:first-child td:last-child {border-top-right-radius: 10px;}
	.system-msg-table tr:last-child td:first-child {border-bottom-left-radius: 10px;}
    .system-msg-table tr:last-child td:last-child {border-bottom-right-radius: 10px;}
    
    .system-msg-table tr td:first-child {
        opacity: 0.5;
    }
	.mail-time-icon {
		width: 16px;
		position: relative;
		top: -2px;
		margin-right: 10px;
	}
	.mailer-container {
		flex-direction: column;
	}
	.mailer-item {
		background: rgb(255 255 255 / 0.1);
	    border-radius: 20px;
	    height: 80px;
	    flex: 1;
	    display: flex;
	    align-items: flex-start;
	    flex-direction: column;
	    justify-content: center;
	    padding: 20px;
	    cursor: pointer;
	    margin-bottom: 20px;
	    transition: all 0.1s ease-in-out;
	}
	.mailer-item:hover {
		background: rgb(255 255 255 / 0.2);
	}
	.mailer-item.opened {
		background: rgb(0 0 0 / 0.2);
	}
	.mailer-item.opened:hover {
		background: rgb(0 0 0 / 0.4);
	}
	.mailer-item:active {transform: scale(1.05) !important;}
	.mailer-item-head {
		font-weight: 600;
	}
	.mailer-item-meta {
		opacity: 0.5;
	}
</style>
<style type="text/css">
	/*media*/
	
</style>
<style>
    .system-mail-table-rincian td.text-right, .system-msg-table tr:last-child td:last-child {
        font-family: 'poetsenone-reg';
        font-size: 14px;
    }
    .desktop-system-mail .system-msg-no-mail {
        min-height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgb(0 0 0 / 20%);
    }
    .system-mail-color-1 {
        color: #FFEB3B;
        font-weight: 800;
    }
    .system-mail-table-rincian tr.result {
        font-size: 14px;
    }
    .system-mail-table-rincian th,
    .system-mail-table-rincian td {
        padding: 10px 15px;
    }
    .system-mail-table-rincian thead tr {
        background: rgb(0 0 0 / 30%);
    }
    .system-mail-table-rincian tbody tr:nth-child(odd) {
        background: rgb(0 0 0 / 20%);
    }
    .system-mail-table-rincian tbody tr:nth-child(even) {
        background: rgb(0 0 0 / 10%);
    }
    .system-mail-table-rincian tr.result {
        border-top: 1px solid rgb(255 255 255 / 40%);
    }

    .system-msg-item--convert-to {
        flex: 0 0 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .system-msg-item--convert-to .icon {
        height: 50px;
        width: 50px;
        opacity: 0.3;
    }
    .system-mail-item-group {
        display: flex;
        flex-wrap: wrap;
    }
    .system-msg-item-box {
        background: rgb(0 0 0 / 40%);
        border: 2px solid rgb(255 255 255 / 20%);
        border-radius: 10px;
        flex: 0 0 60px;
        height: 60px;
        padding: 10px;
        position: relative;
        margin: 5px;
    }
    .system-msg-item-box span {
        position: absolute;
        right: 6px;
        bottom: 2px;
        font-weight: 800;
        font-style: italic;
    }
    .system-msg-content-title {
        font-size: 32px;
        font-family:'Rajdhani-Bold' !important;
        line-height: 1.2;
        margin-bottom: .5rem;
    }
    .system-msg-content-additional-title {
        font-size: 14px;
    }
    .desktop-system-mail .system-msg-content-message {
        margin-top: 20px;
    }
    .system-msg-content-additional-message {
        margin-top: 20px;
    }
    .system-msg-item {
        padding: 20px 0;
        background: rgb(0 0 0 / 40%);
        border-bottom: 1px solid rgb(255 255 255 / 20%);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    .desktop-system-mail .system-msg-item.no-mail {
        padding: 80px 15px;
    }
    .mb-system-mail .system-msg-item.no-mail {
        padding: 80px 15px;
        border-bottom: 0px;
    }
    .system-msg-item.opened {
        background: rgb(0 0 0 / 20%);
    }
    .system-msg-item:hover {
        background: rgb(0 0 0 / 30%);
    }
    .system-msg-item.active {
        background: rgb(233 30 99);
    }
    .system-msg-item .left {
        flex: 0 0 76px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .system-msg-content-message {
        margin-bottom: 20px;
    }
    .system-msg-item .left .icon, .system-msg-content-message .opacity-05 {
        opacity: 0.3;
    }
    .system-msg-item .right {
        flex: 1;
        display: flex;
        flex-direction: column;
        text-align: left;
    }
    .system-mgs-preview-title {
        font-size: 14px;
        font-weight: 800;
    }
    .system-mgs-preview-date {
        opacity: 0.5;
    }
    .system-msg-wrapper {
        display: flex;
        line-height: initial;
    }
    .system-msg-list {
        flex: 0 0 300px;
        max-height: 700px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
    }
    /* width */
    .system-msg-list::-webkit-scrollbar {
      width: 10px;
    }
    /* Track */
    .system-msg-list::-webkit-scrollbar-track {
      background: rgb(0 0 0 / 20%);
    }
    /* Handle */
    .system-msg-list::-webkit-scrollbar-thumb {
      background: rgb(0 0 0 / 40%);
    }
    /* Handle on hover */
    .system-msg-list::-webkit-scrollbar-thumb:hover {
      background: rgb(0 0 0 / 40%);
    }
    .system-msg-content {
        flex: 1;
        background: rgb(0 0 0 / 20%);
        flex-direction: column;
        padding-top: 20px;
        padding-bottom: 40px;
    }
    .system-msg-content.active {
        display: block;
    }
    .desktop-system-mail .system-msg-content-head {
        padding: 25px;
        min-height: 150px;
        border-bottom: 1px solid rgb(255 255 255 / 10%);
    }
    .mb-system-mail .system-msg-content-head {
        border-bottom: 1px solid rgb(255 255 255 / 10%);
    }
    .desktop-system-mail .system-msg-content-additional {
        padding: 25px;
        padding-bottom: 75px;
        min-height: 150px;
    }
    .mb-system-mail .system-msg-content-additional {
        padding: 15px;
        padding-bottom: 75px;
    }
    .mb-system-mail-page-title {
        font-family:'Rajdhani-Bold';
        font-size: 20px;
        text-transform: uppercase;
        padding: 10px 15px;
        background: rgb(0 0 0 / 60%);
        margin: 0;
    }
    .mb-mail-controls-back {
        padding: 15px;
        background: rgb(0 0 0 / 20%);
        position: relative;
    }
    .mb-mail-controls-back span {
        position: absolute;
        right: 15px;
        opacity: 0.5;
    }
    .mb-system-mail-back {
        height: 14px;
        width: 14px;
        opacity: 0.5;
        position: relative;
        top: -2px;
        margin-right: 5px;
    }
    .mb-mail-content {
        background: rgb(0 0 0 / 20%);
    }
    .mb-mail-content-additional {
        border-top: 1px solid rgb(255 255 255 / 20%);
    }

    .c14.right {
        width: 16px;
        position: relative;
        top: -2px;
    }
</style>
@endsection

@section('js')
<script>
	$(document).ready(function() {
		
		// page specific scripts

		// open mail btn
		$('body').on('click', '.mailer-item', function(e) {
			e.preventDefault();

			target = $(this);
            var id = target.attr('data-id')

			// show spinner
			target.addClass('opened');

            $.ajax({
                url: "{{ url('ajax/system-mail') }}/" + id,
                method: 'get',
                success: function(result) {
                    //
                }
            })
		});
	})
</script>
@endsection