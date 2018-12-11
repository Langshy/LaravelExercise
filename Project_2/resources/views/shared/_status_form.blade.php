<form action="{{ route('statuses.store') }}" method="POST">
    @include('shared._errors')
    {{ csrf_field() }}
    <textarea class="form-control" rows="4" placeholder="聊聊新鲜事儿...(140字以内)" name="content">{{ old('content') }}</textarea>
    <br>
    <button type="submit" class="btn btn-primary pull-right">发布</button>
</form>