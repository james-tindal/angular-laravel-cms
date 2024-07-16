<section>
    <aside>
        {!! $image !!}
    </aside>
    <header>
        <h4>{{ $title }}</h4>

        <p>
            <span {!! $withCategories !!}>{{ $published_at->format('d-m-Y') }}</span>
            {!! $categories !!}
        </p>
    </header>
    <p>{{ $brief }} <a href="/news/{{ $slug }}">Read more</a></p>
</section>