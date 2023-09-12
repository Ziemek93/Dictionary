<x-layout>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="/listing/edit/{{$word->id}}" >
                @csrf
                @method('PUT')


            <div class="form-group">
              <label for="name">Word</label>
              <input name="name" placeholder="Word..." type="text" class="form-control" id="name" value="{{$word->name}}">
              @error('name')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" placeholder="Word descritpion..." type="text" class="form-control" id="description">{{$word->definition->description}}</textarea>
              @error('description')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <form method="POST" action="/listing/delete/{{$word->id }}" >
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">
                Remove word
            </button>
        </form>
        </div>
    </div>
</div>

</x-layout>
