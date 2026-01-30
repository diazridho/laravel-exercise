<x-layout>
    <!-- mengambil data Title dari route untuk diteruskan ke layout -->
    <x-slot:title> {{ $title }} </x-slot:title>

    <div class="py-4 px-4 mx-auto max-w-7xl lg:py-8 lg:px-0">
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

            <!-- looping data posts dalam blade -->
            @foreach ($posts as $post)

                {{--<article class="text-white py-8 max-w-3xl border-b border-gray-300">
                    <!-- mengambil data array post dengan isi title dari route -->
                    <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
                        <h2 class="mb-1 text-3xl tracking-tight font-bold text-white"> {{ $post['title'] }}</h2>
                    </a>
                    <div>
                        <!-- href di bawah merujuk pada /authors/{user:username} di route-->
                        By
                        <a href="/authors/{{ $post['author']['username'] }}"
                            class="hover:underline text-base text-gray-500"> {{ $post['author']['name'] }}</a>
                        In
                        <a href="/categories/{{ $post['category']['slug'] }}"
                            class="hover:underline text-base text-gray-500"> {{ $post['category']['name'] }} </a>
                        | {{ $post['created_at']->format('j F Y') }}
                    </div>
                    <p class="my-4 font-light"> {{ Str::limit($post['body'], 100) }}</p>
                    <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500"> Read more &raquo;</a>
                </article>--}}

                <article
                    class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 flex flex-col h-full">
                    <div class="flex justify-between items-center mb-5 text-gray-500">
                        <a href="/categories/{{ $post->category->slug }}">
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
                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400 flex-grow">
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

            @endforeach

        </div>
    </div>

</x-layout>