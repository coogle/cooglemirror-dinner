
<div class="bright">Dinner This Week</div>
<hr class="dimmed"/>
<div style="text-align:left">
<table>
    <tr style="{{ $cooglemirror_dinner_dayofweek == 'sun' ? "background:#303030" : "" }}">
        <td>Sun.<td>
        <td class="medium {{ $cooglemirror_dinner_dayofweek == 'sun' ? "bright bold" : "" }} ">{{ $cooglemirror_dinner_menuitems['sun'] }}</td>
    </tr>
    <tr style="{{ $cooglemirror_dinner_dayofweek == 'mon' ? "background:#303030" : "" }}">
        <td>Mon.<td>
        <td class="medium {{ $cooglemirror_dinner_dayofweek == 'mon' ? "bright bold" : "" }} ">{{ $cooglemirror_dinner_menuitems['mon'] }}</td>
    </tr>
    <tr style="{{ $cooglemirror_dinner_dayofweek == 'tues' ? "background:#303030" : "" }}">
        <td>Tues.<td>
        <td class="medium {{ $cooglemirror_dinner_dayofweek == 'tues' ? "bright bold" : "" }}">{{ $cooglemirror_dinner_menuitems['tues'] }}</td>
    </tr>
    <tr style="{{ $cooglemirror_dinner_dayofweek == 'weds' ? "background:#303030" : "" }}">
        <td>Weds.<td>
        <td class="medium {{ $cooglemirror_dinner_dayofweek == 'weds' ? "bright bold" : "" }}">{{ $cooglemirror_dinner_menuitems['weds'] }}</td>
    </tr>
    <tr style="{{ $cooglemirror_dinner_dayofweek == 'thurs' ? "background:#303030" : "" }}">
        <td>Thur.<td>
        <td class="medium {{ $cooglemirror_dinner_dayofweek == 'thurs' ? "bright bold" : "" }}">{{ $cooglemirror_dinner_menuitems['thurs'] }}</td>
    </tr>
    <tr style="{{ $cooglemirror_dinner_dayofweek == 'fri' ? "background:#303030" : "" }}">
        <td>Fri.<td>
        <td class="medium {{ $cooglemirror_dinner_dayofweek == 'fri' ? "bright bold" : "" }}">{{ $cooglemirror_dinner_menuitems['fri'] }}</td>
    </tr>
    <tr style="{{ $cooglemirror_dinner_dayofweek == 'sat' ? "background:#303030" : "" }}">
        <td>Sat.<td>
        <td class="medium {{ $cooglemirror_dinner_dayofweek == 'sat' ? "bright bold" : "" }}">{{ $cooglemirror_dinner_menuitems['sat'] }}</td>
    </tr>
</table>
</div>