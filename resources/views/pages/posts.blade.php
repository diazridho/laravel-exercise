<x-layout>
    <!-- mengambil data Title dari route untuk diteruskan ke layout -->
    <x-slot:title> {{ $title }} </x-slot:title>
    <x-search-bar></x-search-bar>

    <div class="py-4 px-4 mx-auto max-w-7xl lg:py-8 lg:px-0">
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <!-- looping data posts dalam blade -->
            @forelse ($posts as $post)
                <article
                    class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 flex flex-col h-full">
                    <div class="flex justify-between items-center mb-5 text-gray-500">
                        <!-- agar mendapatkan variabel category untuk hidden input-->
                        <a href="/posts?category={{ $post->category->slug }}">
                            <span
                                class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                {{ $post->category->name }}
                            </span>
                        </a>
                        <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white hover:underline">
                        <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                    </h2>
                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400 grow">
                        {{Str::limit($post->body, 100)}}
                    </p>
                    <div
                        class="flex justify-between items-center mt-auto pt-4 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center space-x-4">
                            <a href="/authors/{{ $post->author->username }}">
                                <img class="w-7 h-7 rounded-full"
                                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                    alt="Jese Leos avatar" />
                            </a>
                            <a href="/authors/{{ $post->author->username }}">
                                <span class="font-medium text-md text-black dark:text-white">
                                    {{ $post->author->name }}
                                </span>
                            </a>
                        </div>
                        <a href="/posts/{{ $post->slug  }}"
                            class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                            Read more &raquo;
                        </a>
                    </div>
                </article>
            @empty
                <div class="mt-8 p-4 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-700 inline-block text-left">
                    <p class="font-bold">Tips Pencarian:</p>
                    <ul class="list-disc ml-5">
                        <li>Pastikan semua kata dieja dengan benar.</li>
                        <li>Coba kata kunci lain yang lebih umum.</li>
                        <li>Coba hapus filter kategori atau author.</li>
                    </ul>
                </div>
            @endforelse
        </div>
    </div>

    {{ $posts->links() }}

</x-layout>