<div class="hero-side-category">
    <!-- Category Toggle Wrap -->
    <div class="category-toggle-wrap">
        <!-- Category Toggle -->
        <button class="category-toggle"> <span class="arrow_carrot-right_alt2 mr-2"></span> All Categories</button>
    </div>

    <!-- Category Menu -->
    <nav class="category-menu">
        <ul>
            @foreach( categories() as $item)
            <li><a href="{{route('store.category',$item->id)}}">{{$item->title}}</a></li>
            @endforeach
        </ul>
    </nav>
</div>
