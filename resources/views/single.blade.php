<x-layout>

    <div class=" p-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

        <img class="rounded-t-lg object-center mx-auto hover:opacity-80" src="{{ asset('storage/' . $image->path) }}" alt="{{ $image->title }}" />

        <div class="flex justify-between items-center p-4">

            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Image Caption:
                {{ $image->title }}</h5>

            <form action="{{ route('images.destroy', $image) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')

                <button type="submit"
                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Delete</button>
            </form>
        </div>
    </div>


</x-layout>
