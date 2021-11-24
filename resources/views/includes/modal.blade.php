<div class="container--modal">
    @if(session('success') || session('failed') || session('success-recharge-lp') || session('success-recharge-bp') || session('failed-signup') || session('failed-verify') || session('success-verify'))
        <div id="message" class="modal metro splash" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    @if(session('success-recharge-lp'))
                        <h3 class="colored">Congratulations</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message text-center">
                                <div class="curr-gain mb-20">
                                    <p>You have purchased</p>
                                    <div class="inner">
                                        <img src="{{ asset('img/currencies/lp.svg') }}" class="curr">
                                        <div class="amt">{{ session('success-recharge-lp') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                            <a href="{{ url('events') }}" class="ctagp">Watch Live Events</a>
                        </div>
                    @endif

                    @if(session('success-recharge-bp'))
                        <h3 class="colored">Congratulations</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message text-center">
                                <div class="curr-gain mb-20">
                                    <p>You have purchased</p>
                                    <div class="inner">
                                        <img src="{{ asset('img/currencies/bp.svg') }}" class="curr">
                                        <div class="amt">{{ session('success-recharge-bp') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                        </div>
                    @endif

                    @if(session('success') === 'success-become-fans' )
                        <h3 class="colored">Congratulations</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message text-center">
                                <div class="curr-gain mb-20">
                                    <p>Now you are fans of {{ $user->teams->name }}</p>
                                    <div class="inner">
                                        <img src="{{ asset($user->teams->logo.'-50.png') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                        </div>
                    @endif

                    @if(session('success') === 'success-diamond-purchase')
                        <h3 class="colored">Congratulations</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message text-center">
                                <div class="curr-gain mb-20">
                                    <p>Terima kasih. Pesanan kamu akan segera diproses.</p>
                                </div>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                            {{-- <a href="{{ url('profile/system-mail') }}" class="ctagp btn-goto-system-mail">Go to System Mail</a> --}}
                        </div>
                    @endif

                    @if(session('success') === 'success-resend')
                        <h3 class="colored">Email Sent</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message text-center">
                                <div class="curr-gain mb-20">
                                    <p>We've sent you a new code. Please check you phone</p>
                                </div>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                        </div>
                    @endif

                    @if(session('success-verify'))
                        <h3 class="colored">@if(session('success-verify') === 'email') Email Verified @else Welcome @endif</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message text-center">
                                <div class="curr-gain mb-20">
                                    <p>{{ (session('success-verify') === 'email') ? 'Terima kasih, email kamu telah berhasil terverifikasi.' : 'Nomor handphone kamu berhasil terverifikasi. Selamat bergabung dengan Timkamu!' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                        </div>
                    @endif

                    @if(session('failed') === 'failed-resend-email-notfound')
                        <h3 class="colored">Error</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message">
                                <p>Email not found. Please try again.</p>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                        </div>
                    @endif

                    @if(session('failed') === 'failed-otp-token-notfound')
                        <h3 class="colored">Error</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message">
                                <p>Token invalid.</p>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                        </div>
                    @endif

                    @if(session('failed') === 'purchase-require-phone-verify')
                        <h3 class="colored">Error</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message">
                                <p>Nomor handphone kamu belum terverifikasi. Harap verifikasi nomor terlebih dahulu</p>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                            <a href="{{ url('resend-otp') }}" class="ctagp">Resend OTP Code</a>
                        </div>
                    @endif

                    @if(session('failed') === 'failed-resend' || session('failed') === 'failed-become-fans' || session('failed') === 'failed-signup')
                        <h3 class="colored">Error</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message">
                                <p>Something went wrong. Please try again.</p>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                        </div>
                    @endif

                    @if(session('failed-signup'))
                        <h3 class="colored">Error</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message">
                                <p>{{ session('failed-signup') }}</p>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                        </div>
                    @endif

                    @if(session('failed-verify'))
                        <h3 class="colored">Error</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message">
                                <p>{{ session('failed-verify') }}</p>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                        </div>
                    @endif

                    @if(session('failed') === 'failed-login')
                        <h3 class="colored">Error</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message">
                                <p>Login error</p>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                        </div>
                    @endif

                    @if(session('failed') === 'update-password-notmatch')
                        <h3 class="colored">Error</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message">
                                <p>Password not match</p>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                        </div>
                    @endif

                    @if(session('failed') === 'failed-update-password')
                        <h3 class="colored">Error</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message">
                                <p>Something went wrong. Please try again.</p>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                        </div>
                    @endif

                    @if(session('failed') === 'failed-recharge')
                        <h3 class="colored">Error</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message">
                                <p>Recharge error</p>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                        </div>
                    @endif                
                    
                    @if(session('failed') === 'failed-bookmark')
                        <h3 class="colored">Error</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message">
                                <p>Bookmark error: Something went wrong. Please try again.</p>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                        </div>
                    @endif

                    @if(session('failed') === 'event-bookmarked')
                        <h3 class="colored">Error</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message">
                                <p>You have already bookmark this event</p>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                        </div>
                    @endif

                    @if(session('success') === 'success-bookmark')
                        <h3 class="colored">Success</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message">
                                <p>The event has been added to your bookmark.</p>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                        </div>
                    @endif
                    
                    @if(session('success') === 'success-logout')
                        <h3 class="colored">Log out</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message">
                                <p>You have been logged out.</p>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                        </div>
                    @endif

                    @if(session('success') === 'success-update-password')
                        <h3 class="colored">Success</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message">
                                <p>You have successfuly change update your password</p>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                        </div>
                    @endif


                    @if(session('failed') === 'require-login')
                        <h3 class="colored">Error</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message">
                                <p>That page requires login.</p>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                        </div>
                    @endif
                    @if(session('failed') === 'purchase-require-login')
                        <h3 class="colored">Error</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message">
                                <p>You need to login to purchase that item.</p>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Batal</a>
                            <a href="{{ url('sign-in') }}" class="ctagp">Sign In</a>
                        </div>
                    @endif

                    @if(session('failed') === 'need-recharge-lp')
                        <h3 class="colored">Purchase gagal</h3>
                        <div class="modal-body posrel">
                            <div class="message">
                                <p class="donate-message">Silakan coba lagi</p>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                            <a href="#" data-dismiss="modal" class="ctagp btn-recharge-lp">Recharge LP</a>
                        </div>
                    @endif

                    @if(session('success') === 'success-recharge-support')
                        <h3 class="colored">Congratulations</h3>
                        <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                        <div class="modal-body posrel">
                            <div class="message">
                                <p>Dukungan kamu berhasil diberikan. Terima kasih telah mendukung tim kamu di event ini. Hasil dari dukungan dapat dilihat di halaman event atau di member profile page kamu.</p>
                            </div>
                        </div>
                        <div class="nwcls">
                            <a href="#" data-dismiss="modal">Okay</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif

    <style type="text/css">
        #spinner .spinner-border {
            width: 100px;
            height: 100px;
            position: absolute;
            top: -26px;
            left: 0;
        }
        .level-up-modal-rank-icon {
            width: 40%;
        }
        .level-up-modal-rank-title {
            font-size: 26px;
            text-transform: uppercase;
            text-align: center !important;
           font-family: 'Rajdhani-Bold';
        }
    </style>

    <div id="spinner" class="modal metro" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-sm spin" role="document">
            <div class="modal-content">
                <h3>
                    <div class="spinner-border text-light" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <img src="{{ asset('img/emblem.svg') }}" class="emblem-spinner">
                </h3>
            </div>
        </div>
    </div>

    <div id="rules" class="modal metro" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <h3 class="colored">Peraturan Dukungan</h3>
                <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                <div class="modal-body posrel">
                    <div class="message">
                        <ul class="pl-3">
                            <li>15 menit sebelum pertandingan semua bentuk pemberian dukungan akan ditutup.</li>
                            <li>Nilai dukungan Minimum dukungan 1 BP, maksimum 2,000 BP.</li>
                            <li>BP didapat dari konversi LP.</li>   
                            <li>1LP = 1BP.</li>   
                        </ul>
                    </div>
                </div>
                <div class="nwcls">
                    <a href="#" data-dismiss="modal">Okay</a>
                </div>
            </div>
        </div>
    </div>

    <div id="lp-rates" class="modal metro" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <h3 class="colored">LP RATES</h3>
                <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                <div class="modal-body posrel">
                    <div class="message">
                        <p>LP Purchase Rates: Rp 1,000 = 1 <img src="{{ asset('img/currencies/lp.svg') }}" class="mdl-curr"></p>
                    </div>
                </div>
                <div class="nwcls">
                    <a href="#" data-dismiss="modal">Okay</a>
                </div>
            </div>
        </div>
    </div>


    <div id="dukung-ab-success" class="modal metro" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <h3 class="colored">Congratulations</h3>
                <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                <div class="modal-body posrel">
                    <div class="message">
                        <p>Dukungan sudah diberikan. Terima kasih telah mendukung tim kamu di event ini. Hasil dari dukungan dapat dilihat member profile page kamu.</p>
                    </div>
                </div>
                <div class="nwcls">
                    <a href="#" data-dismiss="modal">Okay</a>
                </div>
            </div>
        </div>
    </div>

    <div id="dukung-ab-failed" class="modal metro" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <h3 class="colored">Error</h3>
                <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                <div class="modal-body posrel">
                    <div class="message">
                        <p>Pemberian dukungan gagal. Silakan coba lagi</p>
                    </div>
                </div>
                <div class="nwcls">
                    <a href="#" data-dismiss="modal">Okay</a>
                </div>
            </div>
        </div>
    </div>


    <div id="donate-success" class="modal metro" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <h3 class="colored">Donate sukses</h3>
                <div class="modal-body posrel">
                    <div class="message">
                        <p class="donate-message">Terimakasih</p>
                    </div>
                </div>
                <div class="nwcls">
                    <a href="#" data-dismiss="modal">Okay</a>
                </div>
            </div>
        </div>
    </div>

    <div id="donate-failed" class="modal metro" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <h3 class="colored">Donate gagal</h3>
                <div class="modal-body posrel">
                    <div class="message">
                        <p class="donate-message">Silakan coba lagi</p>
                    </div>
                </div>
                <div class="nwcls">
                    <a href="#" data-dismiss="modal">Okay</a>
                    <a href="#" data-dismiss="modal" class="ctagp btn-recharge-lp">Recharge LP</a>
                </div>
            </div>
        </div>
    </div>

    <div id="require-sign-in" class="modal metro" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body posrel">
                    <div class="message">
                        <h3>Sign In Required</h3>
                        <p class="donate-message">You need to sign in order to do that.</p>

                        <div class="clearfix mt-5"></div>
                        <a href="#" class="tkbtn cancel float-right rm2" data-dismiss="modal">Batal</a>
                        <a href="{{ url('sign-in') }}" class="tkbtn outline-white float-right rm" data-dismiss="modal">Sign In</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="dukungan-require-sign-in" class="modal metro" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <h3 class="colored">Sign In Required</h3>
                <i data-feather="x" class="icon tutup" data-dismiss="modal"></i>
                <div class="modal-body posrel">
                    <div class="message">
                        <p class="donate-message">Untuk memberikan dukungan kamu perlu sign in terlebih dulu.</p>
                        <p>Keuntungan bergabung dengan Timkamu.com:</p>
                        <ul class="pl-3">
                            <li>Berikan support ke tim favorit kamu.</li>
                            <li>Dapatkan Loyalty dan Battle points dari setiap live games.</li>
                        </ul>

                        <div class="clearfix mt-5"></div>
                    </div>
                </div>
                <div class="nwcls">
                    <a href="#" data-dismiss="modal">Batal</a>
                    <a href="{{ url('sign-in') }}" class="ctagp">Sign In</a>
                </div>
            </div>
        </div>
    </div>
</div>