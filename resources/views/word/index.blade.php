<x-layout>


    <div class="container">
        <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="border-box">
                {{-- {{$word->id}}  {{$word->definition->description }} --}}
                <div>
                    <p class="font-weight-bold">{{$definition->description }}</p>
                </div>
                @foreach ($words as $word)
                    <span class="word">{{$word->name}}</span>
                @endforeach
                <div>

                    <div>
                    <form method="POST" action="/word/add/{{$definition->id }}" >
                        @csrf
                        <label for="name">Add new word:</label>
                        <div class="sigle-input-group row">
                            <div class="col-md-8">
                            <input name="name" placeholder="Word..." type="text" class="form-control" id="name" value="{{old('name')}}">
                            @error('name')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                            </div>
                            <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">
                            Add
                        </button>
                        </div>
                    </div>
                    </form>
                    <form method="POST" action="/definition/delete/{{$definition->id }}" >
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">
                            Remove definition
                        </button>
                    </form>

                    {{-- <div class="edit-btns">
                        <button type="button" class="btn btn-success">Success</button>
                        <button type="button" class="btn btn-danger">Danger</button>
                    </div> --}}
                </div>
            </div>
        </div>
        </div>
    </div>
    </x-layout>
