<x-layout>
    <!-- dikirim data Title dari route untuk diteruskan ke layout -->
    <x-slot:title> {{ $title }} </x-slot:title> 
    Hai my name is {{ $nama }} my job is {{ $pekerjaan }} from {{ $alamat }}
</x-layout>