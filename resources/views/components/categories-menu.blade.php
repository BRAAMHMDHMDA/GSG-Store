    <ul>
        @forelse($categories as $category)
            <li>
                <a href="{{ route('website.category.show', $category->slug) }}">{{$category->name}}</a>
                @if(count($category->children) != 0)
                    <ul>
                        @forelse($category->children as $child)
                            <li>
                                <a href="{{ route('website.category.show', $child->slug) }}">
                                    {{$child->name}}
                                </a>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                @endif
            </li>
        @empty
        @endforelse
    </ul>
