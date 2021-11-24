@extends('layouts.mails.app')
@section('content')
	<h1 style="margin: 0 0 20px; font-size: 28px; line-height: 30px; color: #333333; font-weight: bold;text-align: center" align="center">
        HASIL GAMES EVENT
	</h1> <!-- Title -->
	<p style="font-size:16px;margin: 0 0 10px;text-align: center" align="center">
        Hey <strong>{{ $dataUser }}</strong> <br>
        {!! $message !!}
        <br><br>

        <a href="https://timkamu.com" class="btn btn-primary">Go to TimKamu</a>
	</p>
    <p style="font-size:16px;margin: 0 0 10px;text-align: center" align="center">
        Warm regards,<br>Timkamu Team
        <br><br>
	</p>
	<br><br>
@stop