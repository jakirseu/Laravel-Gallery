<x-layout>

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 ">
            {{ session('success') }}
        </div>
    @endif


    <h1 class="text-center text-3xl font-semibold my-5">Upload Image</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <div class="mb-5">
                <input type="text" name="title" id="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Image Title (optional)" />
            </div>
            <div class="mb-5">
                <input id="image" name="image" type="file"
                    class="block w-full text-xl text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help"> JPEG, PNG, JPG or GIF
                    (MAX. 2048byte).</p>
            </div>
            <div class="mb-5">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-10 py-2.5 me-2 mb-2 ">Upload</button>
            </div>
        </div>

    </form>


    <h1 class="text-center text-3xl font-semibold my-5">My Gallery</h1>


    @if ($images->isEmpty())
        <p>No images found.</p>
    @else
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

            @foreach ($images as $image)
                <div>
                    <a href="{{ route('images.show', $image) }}">

                        <img src="{{ asset('storage/' . $image->path) }}"
                            class="object-cover object-center w-full h-40 max-w-full rounded-lg hover:opacity-70"
                            alt="{{ $image->title }}">
                    </a>

                </div>
            @endforeach
        </div>
    @endif



</x-layout>
