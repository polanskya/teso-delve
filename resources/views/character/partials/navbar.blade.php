<ul class="nav nav-tabs {{$removedCharacters->count() > 0 ? '' : 'hidden'}}">
    <li role="presentation" class="{{(\Request::route()->getName() == 'characters.index') ? 'active' : ''}}"><a href="{{route('characters.index')}}">Active</a></li>
    <li role="presentation" class="{{(\Request::route()->getName() == 'characters.index.deleted') ? 'active' : ''}}"><a href="{{route('characters.index.deleted')}}">Inactive</a></li>
</ul>