@extends('layouts.app')

@section('page_title', "Backpack")
@section('body_class', "bg1")
@section('content')

@include('includes.menu')
<div class="root profile-backpack">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="rajdhani-bold font-30 text-uppercase color-white mb-0">My Account</h2>
                <h5 class="color-white opacity-05 font-14 mb-5 game-name">Manage my account</h5>

                <div class="profile-wrapper">
                    
                    @include('includes.profile-left')

                    <style type="text/css">
                        .bag-wrapper {
                            padding: 40px;
                            display: flex;
                            flex-wrap: wrap;
                        }
                        .iths {
                            flex: 0 0 70px;
                            border: 2px solid rgba(255,255,255,0.2);
                            position: relative;
                            padding: 8px;
                            border-radius: 10px;
                            margin-right: 20px;
                            cursor: pointer;
                            margin-bottom: 20px;
                        }
                        .iths:hover {
                            border: 2px solid rgba(255,255,255,0.6);
                        }
                        .iths img {
                            width: 100%;
                        }
                        .iths .amt {
                            font-family: 'Rajdhani-Bold';
                            font-size: 18px;
                            position: absolute;
                            bottom: 0;
                            right: 5px;
                            color: white;
                            text-shadow: 0 0 5px #000;
                        }
                    </style>

                    <div class="right">

                        <div class="bag-wrapper">
                            @foreach ($items as $item)
                                <div class="iths" data-toggle="modal" data-target="#item-view" data-name="{{ $item->items->name }}" data-image="{{ asset($item->items->logo) }}" data-value="{{ number_format($item->value, 0, '.', ',') }}">
                                    <img src="{{ asset($item->items->logo) }}" class="curr">
                                    <div class="amt">{{ number_format($item->value, 0, '.', ',') }}</div>
                                </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>


            </div>
            
        </div>
    </div>
</div>

<div id="item-view" class="modal metro" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <h3 class="colored">My Items</h3>
            <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
            <div class="modal-body posrel">
                <div class="message text-center">
                    <div class="curr-gain">
                        <p id="name-item"></p>
                        <div class="inner">
                            <img src="#" class="curr" id="curr-item">
                        </div>
                        <p class="mt-10 cprice"><img src="{{ asset('img/currencies/lp.svg') }}"><span id="nominal-item"></span></p>
                    </div>
                </div>
            </div>
            <div class="nwcls">
                <a href="#" data-dismiss="modal">Okay</a>
            </div>

        </div>
    </div>
</div>

<style type="text/css">
    .mobile--profile-backpack-area {
        background: rgba(0,0,0,0.4);
        display: flex;
        flex-wrap: wrap;
        padding: 40px 25px;
    }
    .mobile--profile-backpack-area .iths {
        flex: 0 0 70px;
        margin: 10px 18px;
    }
</style>

<div class="mobile--profile-backpack">


    @include('includes.profile-mobile-head')
    
    <div class="mobile--profile--area-selector">
        <i data-feather="more-vertical" class="icon"></i>Backpack
    </div>
    
    <div class="mobile--profile-backpack-area">
        @foreach ($items as $item)
            <div class="iths" data-toggle="modal" data-target="#item-view" data-name="{{ $item->items->name }}" data-image="{{ asset($item->items->logo) }}" data-value="{{ number_format($item->value, 0, '.', ',') }}">
                <img src="{{ asset($item->items->logo) }}" class="curr">
                <div class="amt">{{ number_format($item->value, 0, '.', ',') }}</div>
            </div>
        @endforeach
    </div>
</div>

<style type="text/css">
    body.bg1 {
        background-image: url("{{ asset('img/f1a.jpg') }}");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
    .root {
        padding-top: 100px;
        padding-bottom: 100px;
    }

    .cprice {
        background: rgba(255,255,255,0.1);
        border-radius: 5px;
        padding: 2px 16px 1px 24px;
        position: relative;
        font-family:'Nunito Sans';
        font-weight: 800;
    }
    .cprice img {
        width: 20px !important;
        position: absolute;
        top: 52%;
        left: -4px;
        transform: translate(0,-50%);
    }
    
    @media (max-width: 992px) {
        .root.profile-backpack {
            display: none;
        }
        .mobile--profile-backpack {
            display: block;
        }
    }
</style>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        
        mobileProfileSubmenu();

    });
</script>
<script>
    $('.iths').on('click', function() {
        var name = $(this).data('name');
        var image = $(this).data('image');
        var nominal = $(this).data('value');

        $('#name-item').text(name);
        $('#curr-item').attr('src', image);
        $('#nominal-item').text(nominal);
    })
</script>
@endsection