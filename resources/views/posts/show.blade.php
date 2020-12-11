<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Show Post
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('posts.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Back to list</a>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <section class="text-gray-700 body-font">
                            <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
                                <img class="lg:w-3/6 md:w-4/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" src="{{asset('storage/'.$post->cover_photo_path)}}">
                                <div class="text-center lg:w-2/3 w-full">
                                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{$post->name}}</h1>
                                <p class="mb-8 leading-relaxed">{{$post->body}}</p>
                                </div>
                            </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block mt-8">
                <a href="{{ route('posts.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Back to list</a>
            </div>
        </div>
    </div>
</x-app-layout>