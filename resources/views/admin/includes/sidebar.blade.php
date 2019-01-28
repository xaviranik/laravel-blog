<ul class="list-group">
    <li class="list-group-item mb-2">
        <a href="{{ route('home') }}"><i class="fas fa-home"></i> Home</a>
    </li>

    <li class="list-group-item">
            <a href="{{ route('post.index') }}"><i class="far fa-file-alt"></i> All Posts</a>
        </li>
    <li class="list-group-item mb-2">
        <a href="{{ route('post.create') }}"><i class="far fa-plus-square"></i> Create New Post</a>
    </li>

    <li class="list-group-item">
        <a href="{{ route('category.index') }}"><i class="fas fa-th"></i> All Caterogies</a>
    </li>
    <li class="list-group-item mb-2">
        <a href="{{ route('category.create') }}"><i class="far fa-plus-square"></i> Create New Caterogy</a>
    </li>

    <li class="list-group-item">
        <a href="{{ route('tags.index') }}"><i class="fas fa-tags"></i> Manage Tags</a>
    </li>
    <li class="list-group-item mb-2">
        <a href="{{ route('tags.create') }}"><i class="far fa-plus-square"></i> Create New Tags</a>
    </li>

    @if (Auth::user()->admin)
        <li class="list-group-item">
            <a href="{{ route('user.index') }}"><i class="fas fa-users-cog"></i> Manage Users</a>
        </li>
        <li class="list-group-item mb-2">
            <a href="{{ route('user.create') }}"><i class="fas fa-user-plus"></i> Create New User</a>
        </li>
    @endif
    
    <li class="list-group-item mb-2">
        <a href="{{ route('post.trashed') }}"><i class="far fa-trash-alt"></i> Trashed Posts</a>
    </li>
</ul>