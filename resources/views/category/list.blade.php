<table class="table table-hover table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Owner</th>
        <th>Control</th>
        <th>Created_at</th>
    </tr>
    </thead>
    <tbody>
    @foreach(\App\Category::with('user')->orderBy('id','desc')->get() as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            <td>
                <img src="{{ asset('small/'.$category->user->photo) }}" alt="" class="img ">
                {{ $category->user->name }}</td>
            <td>
                <a href="{{ route('category.edit',$category->id) }}" class="btn btn-outline-warning">
                    <i class="fa-solid fa-edit"></i>
                </a>
                <a href="{{ route('category.show',$category->id) }}" class="btn btn-outline-info">
                    <i class="fa-solid fa-eye"></i>
                </a>
                <form action="{{ route('category.destroy',$category->id) }}" method="post" class="d-inline-block">
                    @csrf
                    @method('delete')
                    <button class="btn btn-outline-danger" type="submit"
                            onclick="return confirm('Are you sure to delete {{ $category->title }} category?');">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </td>
            <td>
                <i class="fa-solid fa-calendar text-success"></i>
                {{ $category->created_at->format('d-m-y') }}
                <br>
                <i class="fa-solid fa-clock text-danger"></i>
                {{ $category->created_at->format('h:i A') }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
