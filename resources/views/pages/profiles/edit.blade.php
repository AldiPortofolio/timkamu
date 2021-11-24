@extends('layouts.app')

@section('page_title', "Change Password")
@section('body_class', "bg1")
@section('content')

@include('includes.menu')
<div class="root profile-index">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="rajdhani-bold font-30 text-uppercase color-white mb-0">My Account</h2>
                <h5 class="color-white opacity-05 font-14 mb-5 game-name">Manage my account</h5>

                <div class="profile-wrapper">
                    
                    @include('includes.profile-left')

                    <div class="right">
                        @include('includes.profile-sub')
                        
                        <div class="profile-form-container">
                            <form action="{{ url('update-password') }}" id="form-update-pwd" method="post">
                                @csrf
                                <!-- update password -->
                                <div class="form-group">
                                    <label>New password</label>
                                    <input type="password" name="password" class="form-control form-control-lg tk input-dark" id="nwpwd">
                                </div>
                                <div class="form-group">
                                    <label>Repeat new password</label>
                                    <input type="password" name="confirm_password" class="form-control form-control-lg tk input-dark" id="rnwpwd">
                                </div>

                                <!-- submit -->
                                <div class="form-group pt-4">
                                    <button type="submit" class="btn btn-primary btn-update">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
            
        </div>
    </div>
</div>

<style type="text/css">
    .profile-form-container {
        padding: 25px;
    }
</style>

<div class="mobile--profile-index">
    
    @include('includes.profile-mobile-head')

    <div class="mobile--profile--area-selector">
        <i data-feather="more-vertical" class="icon"></i>Change Password
    </div>
    
    <div class="area-info">
        <div class="area-info--box">
            <!-- update password -->
            <div class="form-group">
                <label>New password</label>
                <input type="password" class="form-control tk input-dark" id="nwpwd-mbl">
            </div>
            <div class="form-group">
                <label>Repeat new password</label>
                <input type="password" class="form-control tk input-dark" id="rnwpwd-mbl">
            </div>
            <!-- submit -->
            <div class="form-group pt-4">
                <button type="button" class="btn btn-primary btn-block btn-mobile-rstpwd">Update</button>
            </div>
        </div>
    </div>
</div>


<style type="text/css">
    body.bg1 {
        background-image: url(<?php echo asset('img/f1a.jpg'); ?>);
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
    .root {
        padding-top: 100px;
        padding-bottom: 100px;
    }

    @media (max-width: 992px) {
        .root.profile-index {
            display: none;
        }
        .mobile--profile-index {
            display: block;
        }
    }
</style>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        
        mobileProfileSubmenu();

        $('.btn-mobile.rstpwd').on('click', function(e) {
            e.preventDefault();
            
            var pwd = $('#nwpwd-mbl').val();
            var rpwd = $('#rnwpwd-mbl').val();

            if(checkPassword(pwd, rpwd)) {
                $('#form-update-pwd #nwpwd').val(pwd);
                $('#form-update-pwd #rnwpwd').val(rpwd);

                $('#form-update-pwd').submit();
            }
        })

    });

    function checkPassword(pwd, rpwd) {
        if(pwd === rpwd) {
            return true;
        }

        return false;
    }
</script>
@endsection