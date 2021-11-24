<table class="table table-sm table-bordered mb-0 big-table table-hover text-center b-bold">
    <tbody>
    <tr>
        <td></td>
        <td class="bl-bold br-bold"><strong>All time</strong></td>
        <td class="bl-bold br-bold" colspan="4"><strong>September 2020</strong></td>
        <td class="bl-bold br-bold" colspan="4"><strong>October 2020</strong></td>
        <td class="bl-bold br-bold" colspan="4"><strong>November 2020</strong></td>
        <td class="bl-bold br-bold" colspan="4"><strong>December 2020</strong></td>
        <td class="bl-bold br-bold" colspan="4"><strong>January 2021</strong></td>
    </tr>
    <tr>
        <td></td>
        <td class="bl-bold br-bold"></td>

        <td>W1 <br>1 - 7</td>
        <td>W2 <br>8 - 14</td>
        <td>W3 <br>15 - 21</td>
        <td class="br-bold">W4 <br>22 - 31</td>

        <td>W1 <br>1 - 7</td>
        <td>W2 <br>8 - 14</td>
        <td>W3 <br>15 - 21</td>
        <td class="br-bold">W4 <br>22 - 31</td>

        <td>W1 <br>1 - 7</td>
        <td>W2 <br>8 - 14</td>
        <td>W3 <br>15 - 21</td>
        <td class="br-bold">W4 <br>22 - 30</td>

        <td>W1 <br>1 - 7</td>
        <td>W2 <br>8 - 14</td>
        <td>W3 <br>15 - 21</td>
        <td class="br-bold">W4 <br>22 - 31</td>

        <td>W1 <br>1 - 7</td>
        <td>W2 <br>8 - 14</td>
        <td>W3 <br>15 - 21</td>
        <td class="br-bold">W4 <br>22 - 31</td>
    </tr>
    <tr>
        <td class="text-left br-bold">Members</td>
        <td class="text-right">@if($data_members_all_time == 0) <span class="o3">{{ $data_members_all_time }}</span> @else {{ $data_members_all_time }} @endif</td>
        @foreach ($data_members as $item)
            @if($loop->index % 4 == 0) <td class="text-right bl-bold"> @else <td class="text-right"> @endif @if($item === 0)<span class="o3">{{ $item }}</span>@else{{ $item }}@endif</td>
            @endforeach
    </tr>
    <tr>
        <td class="text-left br-bold">Phone verified</td>
        <td class="text-right">@if($data_phone_verified_all_time == 0) <span class="o3">{{ $data_phone_verified_all_time }}</span> @else {{ $data_phone_verified_all_time }} @endif</td>
        @foreach ($data_phone_verified as $item)
            @if($loop->index % 4 == 0) <td class="text-right bl-bold"> @else <td class="text-right"> @endif  @if($item === 0)<span class="o3">{{ $item }}</span>@else{{ $item }}@endif</td>
            @endforeach
    </tr>
    <tr>
        <td class="text-left br-bold">Unique visitors (GA)</td>
        <td class="text-right">@if($data_unique_all_time == 0) <span class="o3">{{ $data_unique_all_time }}</span> @else {{ $data_unique_all_time }} @endif</td>
        @foreach ($data_unique as $item)
            @if($loop->index % 4 == 0) <td class="text-right bl-bold"> @else <td class="text-right"> @endif @if($item === 0)<span class="o3">{{ $item }}</span>@else{{ $item }}@endif</td>
            @endforeach
    </tr>
    <tr>
        <td class="text-left br-bold">Total Checkout</td>
        <td class="text-right">@if(array_sum($total_check_out_all) == 0) <span class="o3">Rp {{ number_format(array_sum($total_check_out_all), 0, '.', ',') }}</span> @else Rp {{ number_format(array_sum($total_check_out_all), 0, '.', ',') }} @endif</td>
        @foreach ($total_check_out_all as $item)
            <td class="text-right bl-bold" colspan="4"> @if($item === 0)<span class="o3">Rp {{ number_format($item, 0, '.', ',') }}</span>@else Rp {{ number_format($item, 0, '.', ',') }}@endif</td>
        @endforeach
    </tr>
    <tr>
        <td class="text-left br-bold">Total Checkout MLBB</td>
        <td class="text-right">@if(array_sum($total_check_out['mlbb']) == 0) <span class="o3">Rp {{ number_format(array_sum($total_check_out['mlbb']), 0, '.', ',') }}</span> @else Rp {{ number_format(array_sum($total_check_out['mlbb']), 0, '.', ',') }} @endif</td>
        @foreach ($total_check_out['mlbb'] as $item)
            @if($loop->index % 4 == 0) <td class="text-right bl-bold"> @else <td class="text-right"> @endif @if($item === 0)<span class="o3">Rp {{ number_format($item, 0, '.', ',') }}</span>@else Rp {{ number_format($item, 0, '.', ',') }}@endif</td>
            @endforeach
    </tr>
    <tr>
        <td class="text-left br-bold">Total Checkout Freefire</td>
        <td class="text-right">@if(array_sum($total_check_out['freefire']) == 0) <span class="o3">Rp {{ number_format(array_sum($total_check_out['freefire']), 0, '.', ',') }}</span> @else Rp {{ number_format(array_sum($total_check_out['freefire']), 0, '.', ',') }} @endif</td>
        @foreach ($total_check_out['freefire'] as $item)
            @if($loop->index % 4 == 0) <td class="text-right bl-bold"> @else <td class="text-right"> @endif @if($item === 0)<span class="o3">Rp {{ number_format($item, 0, '.', ',') }}</span>@else Rp {{ number_format($item, 0, '.', ',') }}@endif</td>
            @endforeach
    </tr>
    <tr>
        <td class="text-left br-bold">Total Checkout PUBGM</td>
        <td class="text-right">@if(array_sum($total_check_out['pubgm']) == 0) <span class="o3">Rp {{ number_format(array_sum($total_check_out['pubgm']), 0, '.', ',') }}</span> @else Rp {{ number_format(array_sum($total_check_out['pubgm']), 0, '.', ',') }} @endif</td>
        @foreach ($total_check_out['pubgm'] as $item)
            @if($loop->index % 4 == 0) <td class="text-right bl-bold"> @else <td class="text-right"> @endif @if($item === 0)<span class="o3">Rp {{ number_format($item, 0, '.', ',') }}</span>@else Rp {{ number_format($item, 0, '.', ',') }}@endif</td>
            @endforeach
    </tr>
    <tr>
        <td class="text-left br-bold">Total Checkout Valorant</td>
        <td class="text-right">@if(array_sum($total_check_out['valorant']) == 0) <span class="o3">Rp {{ number_format(array_sum($total_check_out['valorant']), 0, '.', ',') }}</span> @else Rp {{ number_format(array_sum($total_check_out['valorant']), 0, '.', ',') }} @endif</td>
        @foreach ($total_check_out['valorant'] as $item)
            @if($loop->index % 4 == 0) <td class="text-right bl-bold"> @else <td class="text-right"> @endif @if($item === 0)<span class="o3">Rp {{ number_format($item, 0, '.', ',') }}</span>@else Rp {{ number_format($item, 0, '.', ',') }}@endif</td>
            @endforeach
    </tr>
    <tr>
        <td class="text-left br-bold">Total Checkout Ragnarok</td>
        <td class="text-right">@if(array_sum($total_check_out['ragnarok']) == 0) <span class="o3">Rp {{ number_format(array_sum($total_check_out['ragnarok']), 0, '.', ',') }}</span> @else Rp {{ number_format(array_sum($total_check_out['ragnarok']), 0, '.', ',') }} @endif</td>
        @foreach ($total_check_out['ragnarok'] as $item)
            @if($loop->index % 4 == 0) <td class="text-right bl-bold"> @else <td class="text-right"> @endif @if($item === 0)<span class="o3">Rp {{ number_format($item, 0, '.', ',') }}</span>@else Rp {{ number_format($item, 0, '.', ',') }}@endif</td>
            @endforeach
    </tr>
    <tr>
        <td class="text-left br-bold">Total Checkout Telkomsel Pulsa</td>
        <td class="text-right">@if(array_sum($total_check_out['telkomsel_pulsa']) == 0) <span class="o3">Rp {{ number_format(array_sum($total_check_out['telkomsel_pulsa']), 0, '.', ',') }}</span> @else Rp {{ number_format(array_sum($total_check_out['telkomsel_pulsa']), 0, '.', ',') }} @endif</td>
        @foreach ($total_check_out['telkomsel_pulsa'] as $item)
            @if($loop->index % 4 == 0) <td class="text-right bl-bold"> @else <td class="text-right"> @endif @if($item === 0)<span class="o3">Rp {{ number_format($item, 0, '.', ',') }}</span>@else Rp {{ number_format($item, 0, '.', ',') }}@endif</td>
            @endforeach
    </tr>
    <tr>
        <td class="text-left br-bold">Total Checkout Telkomsel Kuota</td>
        <td class="text-right">@if(array_sum($total_check_out['telkomsel_kuota']) == 0) <span class="o3">Rp {{ number_format(array_sum($total_check_out['telkomsel_kuota']), 0, '.', ',') }}</span> @else Rp {{ number_format(array_sum($total_check_out['telkomsel_kuota']), 0, '.', ',') }} @endif</td>
        @foreach ($total_check_out['telkomsel_kuota'] as $item)
            @if($loop->index % 4 == 0) <td class="text-right bl-bold"> @else <td class="text-right"> @endif @if($item === 0)<span class="o3">Rp {{ number_format($item, 0, '.', ',') }}</span>@else Rp {{ number_format($item, 0, '.', ',') }}@endif</td>
            @endforeach
    </tr>
    <tr>
        <td class="text-left br-bold">Total Checkout XL</td>
        <td class="text-right">@if(array_sum($total_check_out['xl']) == 0) <span class="o3">Rp {{ number_format(array_sum($total_check_out['xl']), 0, '.', ',') }}</span> @else Rp {{ number_format(array_sum($total_check_out['xl']), 0, '.', ',') }} @endif</td>
        @foreach ($total_check_out['xl'] as $item)
            @if($loop->index % 4 == 0) <td class="text-right bl-bold"> @else <td class="text-right"> @endif @if($item === 0)<span class="o3">Rp {{ number_format($item, 0, '.', ',') }}</span>@else Rp {{ number_format($item, 0, '.', ',') }}@endif</td>
            @endforeach
    </tr>
    <tr>
        <td class="text-left br-bold">Total Checkout Tri</td>
        <td class="text-right">@if(array_sum($total_check_out['tri']) == 0) <span class="o3">Rp {{ number_format(array_sum($total_check_out['tri']), 0, '.', ',') }}</span> @else Rp {{ number_format(array_sum($total_check_out['tri']), 0, '.', ',') }} @endif</td>
        @foreach ($total_check_out['tri'] as $item)
            @if($loop->index % 4 == 0) <td class="text-right bl-bold"> @else <td class="text-right"> @endif @if($item === 0)<span class="o3">Rp {{ number_format($item, 0, '.', ',') }}</span>@else Rp {{ number_format($item, 0, '.', ',') }}@endif</td>
            @endforeach
    </tr>
    <tr>
        <td class="text-left br-bold">Total Checkout Google Voucher</td>
        <td class="text-right">@if(array_sum($total_check_out['google_voucher']) == 0) <span class="o3">Rp {{ number_format(array_sum($total_check_out['google_voucher']), 0, '.', ',') }}</span> @else Rp {{ number_format(array_sum($total_check_out['google_voucher']), 0, '.', ',') }} @endif</td>
        @foreach ($total_check_out['google_voucher'] as $item)
            @if($loop->index % 4 == 0) <td class="text-right bl-bold"> @else <td class="text-right"> @endif @if($item === 0)<span class="o3">Rp {{ number_format($item, 0, '.', ',') }}</span>@else Rp {{ number_format($item, 0, '.', ',') }}@endif</td>
            @endforeach
    </tr>
    <tr>
        <td class="text-left br-bold">Total Checkout Token</td>
        <td class="text-right">@if(array_sum($total_check_out['token']) == 0) <span class="o3">Rp {{ number_format(array_sum($total_check_out['token']), 0, '.', ',') }}</span> @else Rp {{ number_format(array_sum($total_check_out['token']), 0, '.', ',') }} @endif</td>
        @foreach ($total_check_out['token'] as $item)
            @if($loop->index % 4 == 0) <td class="text-right bl-bold"> @else <td class="text-right"> @endif @if($item === 0)<span class="o3">Rp {{ number_format($item, 0, '.', ',') }}</span>@else Rp {{ number_format($item, 0, '.', ',') }}@endif</td>
            @endforeach
    </tr>
    </tbody>
</table>
