<x-layout>
    <!-- mengambil data Title dari route untuk diteruskan ke layout -->
    <x-slot:title> {{ $title }} </x-slot:title>

    <!-- looping data posts dalam blade -->
    @foreach ($posts as $post)

        <article class="text-white py-8 max-w-screen-md border-b border-gray-300">
            <!-- mengambil data array post dengan isi title dari route -->
            <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
                <h2 class="mb-1 text-3xl tracking-tight font-bold text-white"> {{ $post['title'] }}</h2>
            </a>
            <div class="text-base text-gray-500">
                <a href="/authors/{{ $post['author']['id'] }}" class="hover:underline"> {{ $post['author']['name'] }}</a> | {{ $post['created_at']->format('j F Y') }}
            </div>
            <p class="my-4 font-light"> {{ Str::limit($post['body'], 100) }}</p>
            <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500"> Read more &raquo;</a>
        </article>
    @endforeach

</x-layout> 