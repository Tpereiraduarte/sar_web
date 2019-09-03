@if ($messages = Session::get('success'))
<div id="toast">
    <div id="img"><i class="fa fa-fw fa-thumbs-up"></i></div>
    <div id="desc">{{ $messages }}</div>
</div>
@endif
