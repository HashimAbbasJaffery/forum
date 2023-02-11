<x-layouts>
        <x-navbar />
        <x-posts-table :questions="$questions"/>
        <div class="mt-10">    
                {{ $questions->withQueryString()->links() }}
        </div>
        <input type="text" name="filters" id="filters" value="{{ http_build_query(request()->except("q")) }}">

</x-layouts>