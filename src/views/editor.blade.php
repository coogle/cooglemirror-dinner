@extends('cooglemirror-dinner::editor-layout')

@section("cooglemirror-dinner::main")
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            CoogleMirror Dinner Menu
        </h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" method="post">
            @foreach($menuItems as $day => $item)
            <div class="form-group">
                <label for="menuItem[{{ $day }}]" class="col-sm-1 control-label">{{ ucfirst($day) }}.</label>
                <div class="col-sm-11">
                    <input type="text" name="menuItem[{{ $day }}]" id="menuItem[{{ $day }}]" class="form-control" value="{{{ $item }}}">
                </div>
            </div>
            @endforeach
            <input type="submit" class="btn btn-primary btn-block" value="Update Menu">
        </form>
    </div>
</div>
@stop
