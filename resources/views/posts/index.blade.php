@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12 p-6 bg-white rounded-lg">
        <form action="{{route('posts')}}" method="post" class="mb-4">
            @csrf
            <div class="mb-4">
                <label for="body" class="sr-only">Body</label>
                <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Write your post📝✍️"></textarea>
                @error('body')
                <div class="text-red-500 mt-2 text-sm">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <button type="submit" class="bg-green-400 text-white px-4 py-2 rounded font-medium">Post</button>
            </div>
        </form>
        @if($posts->count())
        @foreach($posts as $post)

        <x-post :post="$post" />

        @endforeach
        {{$posts->links()}}
        @else
        <p class="font-bold">There are no posts!🙅‍♂️</p>
        @endif
    </div>
</div>
@endsection