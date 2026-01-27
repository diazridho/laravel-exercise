<x-layout>
    <!-- mengambil data Title dari route untuk diteruskan ke layout -->
    <x-slot:title> {{ $title }} </x-slot:title>

    <article class="text-white py-8 max-w-screen-md">
        <!-- mengambil data array post dengan isi title dari route -->
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-white"> {{ $post['title'] }}</h2>
        <div class="text-base text-gray-500">
            <a href="#"> {{ $post['author']['name'] }}</a> | {{ $post['created_at']->format('j F Y') }}
        </div>
        <p class="my-4 font-light"> {{ $post['body'] }}</p>
        <a href="/posts/" class="font-medium text-blue-500"> &laquo; Back to posts</a>
    </article>

</x-layout>