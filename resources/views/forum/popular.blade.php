<div class="panel">
    <div class="panel-body" style="background: #5cb85c; color: #fff; padding: 8px 1.25rem;">
        </div>
    <div class="list-group">
        @foreach($populars as $popular)
        <a href="{{route('forumslug',$popular->slug)}}" class="list-group-item" id="index_hover">{{$popular->title}}</a>
        @endforeach
    </div>
</div>