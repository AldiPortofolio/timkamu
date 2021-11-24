@extends('layouts.splash')

@section('page_title', "TimKamu - Tempat nongkrongnya anak e-sports")
@section('body_class', 'home')


@section('content')
<div class="effects">
	<div class="sunray"></div>
	<div class="top-left-blobs">
		<img src="{{ asset('img/splash/blob1.svg') }}">
	</div>
	<div class="top-right-blobs">
		<img src="{{ asset('img/splash/blob2.svg') }}">
	</div>
	<div class="bottom-left-blobs">
		<img src="{{ asset('img/splash/blob3.svg') }}">
	</div>
	<div class="bottom-right-blobs">
		<img src="{{ asset('img/splash/blob4.svg') }}">
	</div>
	<div class="clouds">
		<img src="{{ asset('img/splash/cloud1.svg') }}">
		<img src="{{ asset('img/splash/cloud2.svg') }}">
		<img src="{{ asset('img/splash/cloud3.svg') }}">
		<img src="{{ asset('img/splash/cloud1.svg') }}">
		<img src="{{ asset('img/splash/cloud2.svg') }}">
		<img src="{{ asset('img/splash/cloud3.svg') }}">
		<img src="{{ asset('img/splash/cloud1.svg') }}">
		<img src="{{ asset('img/splash/cloud2.svg') }}">
		<img src="{{ asset('img/splash/cloud3.svg') }}">
		<img src="{{ asset('img/splash/cloud1.svg') }}">
		<img src="{{ asset('img/splash/cloud2.svg') }}">
		<img src="{{ asset('img/splash/cloud3.svg') }}">
	</div>
</div>
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-sm-10 col-md-8 col-lg-6 col-xl-4">

			<div class="parts part-01">
				<h4>selamat datang di</h4>
				<h1>Public Test Server</h1>
			</div>
			<div class="parts part-02">
				<img src="{{ asset('img/splash/splash-pts.png') }}">
			</div>
			<div class="parts part-03">
				TimKamu.com <span class="o5">berupaya menjadi sebuah platform utama dimana fans dan tim e-sports dapat berkumpul, menikmati pertandingan bersama-sama dan saling mendukung.</span>
			</div>
			<div class="parts part-04">
				<div class="benefit">
					<img src="{{ asset('img/splash/promo1.png') }}" class="how-icon">
					<div class="how">Membeli diamonds MLBB dengan promo spesial</div>
				</div>
				<div class="benefit">
					<img src="{{ asset('img/splash/promo2.png') }}" class="how-icon">
					<div class="how">Memberikan dukungan untuk tim favorit kamu selama pertandingan</div>
				</div>
				<div class="benefit">
					<img src="{{ asset('img/splash/promo3.png') }}" class="how-icon">
					<div class="how">Dapatkan hadiah untuk dukungan-dukungan yang kamu berikan</div>
				</div>
				<div class="benefit">
					<img src="{{ asset('img/splash/promo4.png') }}" class="how-icon">
					<div class="how">Tonton langsung pertandingan-pertandingan e-sports</div>
				</div>
			</div>
			<div class="parts part-05">
				<p class="o5">Jika ada bug dan error pada test server ini, jangan sungkan untuk hubungi kami di:</p>
				<br>
				<p class="email-bug">development@timkamu.com</p>
			</div>
			<div class="parts part-06">
				<a href="{{ url('/') }}" class="splash-button-red">
					Masuk TimKamu
				</a>
			</div>

		</div>
	</div> 
</div>

<style type="text/css">
	/*general*/
	.o5 {
		opacity: 0.5;
	}
	/*main*/
	body.splash {
		background: #26184D;
		color: rgb(255 255 255 / 90%);
		font-family: 'Nunito', sans-serif;
		font-size: 20px;
		font-weight: 300;
		position: relative;
		padding-bottom: 150px;
	}
	.parts p {
		padding: 0;
		margin: 0;
	}
	.parts {
		position: relative;
	}
	.part-01 {
		text-align: center;
		margin-top: 100px;
	}
	.part-02 {
		text-align: center;
		margin-top: 30px;
	}
	.part-03 {
		text-align: center;
		margin-top: 30px;
	}
	.part-04 {
		text-align: center;
		margin-top: 80px;
		display: flex;
		flex-direction: column;
	}
	.part-05 {
		text-align: center;
		margin-top: 80px;
	}
	.part-06 {
		text-align: center;
		margin-top: 50px;
		margin-bottom: 100px;
	}
	.part-01 h4, 
	.part-01 h1 {
		padding: 0;
		margin: 0;
	}
	.part-01 h1 {
		font-family:'Rajdhani-Bold';
		font-size: 50px;
		text-transform: uppercase;

	}
	.part-01 h4 {
		opacity: 0.5;
		font-weight: 100;
	    font-size: 26px;
	}
	.benefit {
		display: flex;
		align-items: center;
		justify-content: flex-start;
		margin-bottom: 20px;
	}
	.benefit .how {
		text-align: left;
		opacity: 0.5;
	}
	.benefit .how-icon {
		margin-right: 20px;
	}
	.splash-button-red {
		color: rgb(255 255 255 / 90%);
	    padding: 20px 20px 24px 20px;
	    background: linear-gradient(90deg, #C31E65, #792A64);
	    border-radius: 100px;
	    font-weight: initial;
	    width: 100%;
	    transition: all 0.1s ease-in-out !important;
	    display: block;
	}
	.splash-button-red:focus,
	.splash-button-red:active,
	.splash-button-red:hover {
		text-decoration: none;
		color: rgb(255 255 255 / 100%);
	    background: linear-gradient(90deg, #C31E65ee, #792A64ee);
	}
</style>
<style type="text/css">
	/* effects*/
	.sunray {
		position: fixed;
		height: 100%;
		width: 100%;
		background-image: radial-gradient(rgb(111 23 108 / 50%), rgb(69 23 111 / 0%));
	}
	.top-left-blobs {
		width: 600px;
		position: absolute;
		top: 0;
		left: 0;
	}
	.top-right-blobs {
		width: 250px;
		position: absolute;
		top: 0;
		right: 0;
	}
	.bottom-left-blobs {
		width: 400px;
		position: absolute;
		bottom: 0;
		left: 0;
	}
	.bottom-right-blobs {
		width: 600px;
		position: absolute;
		bottom: 0;
		right: 0;
	}
	.clouds {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		overflow: hidden;
	}
</style>
<style type="text/css">
	/*splash layers*/
	.sunray {
		z-index: 50;
	}
	.clouds {
		z-index: 60;
	}
	.top-left-blobs,
	.top-right-blobs,
	.bottom-left-blobs,
	.bottom-right-blobs {
		z-index: 70;
	}
	.parts {
		z-index: 100;
	}
</style>
<style type="text/css">
	/*media*/
	@media (max-width: 960px) {
	    .top-left-blobs {
	    	width: 50%;
	    }
	    .top-right-blobs {
	    	width: 30%;
	    }
	    .bottom-left-blobs {
	    	width: 40%;
	    }
	    .bottom-right-blobs {
	    	width: 50%;
	    }
	}
	@media (max-width: 500px) {
	    .part-01 h1 {
	    	line-height: 46px;
    	    margin-top: 20px;
	    }
	}
</style>
@endsection