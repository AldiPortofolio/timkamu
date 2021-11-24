@extends('layouts.mails.app')
@section('content')
	<h1 style="margin: 0 0 20px; font-size: 28px; line-height: 30px; color: #333333; font-weight: bold;text-align: center" align="center">
        RESET YOUR PASSWORD
	</h1> <!-- Title -->
	<p style="font-size:16px;margin: 0 0 10px;text-align: center" align="center">
		Hey <strong>{{ $dataUser }}</strong>, Click the link below to reset your password.
        <br><br>
	</p>
    <tr>
		<td style="padding: 0 20px 20px;" align="center">
			<!-- Button : BEGIN -->
			<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" style="margin: auto;">
				<tr>
					<td class="button-td button-td-primary" style="border-radius: 4px; background: #fff;text-align: center;">
						<a href="{{ url('reset-password?token='.$otpCode) }}" align="center">{{ url('reset-password?token='.$otpCode) }}</a>
					</td>
				</tr>
			</table>
		</td>
    </tr>
    <p style="font-size:16px;margin: 0 0 10px;text-align: center" align="center">
        Warm regards,<br>Timkamu Team
        <br><br>
	</p>
	<br><br>
@stop