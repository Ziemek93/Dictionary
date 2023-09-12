<x-layout>


<div class="container">
    <div class="row">
    @foreach ($data as $word)
    <div class="card col-lg-6 col-md-12">
        <div class="border-box">
            <div>
                <p class="font-weight-bold">{{$word->name }}</p>
            </div>

            <div>
                <p>{{$word->definition->description}}</p>
                @auth
                <a href="/listing/edit/{{$word->id }}" class="btn btn-success">Edit</a>
                <a href="/word/add/{{$word->definition->id }}" class="btn btn-success">Add word to definition</a>
                @endauth
            </div>
        </div>
    </div>
    @endforeach
    </div>
</div>
</x-layout>
