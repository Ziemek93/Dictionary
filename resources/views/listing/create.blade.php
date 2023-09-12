<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="/listing/add" >
                    @csrf


                <div class="form-group">
                  <label for="name">Word</label>
                  <input name="name" placeholder="Word..." type="text" class="form-control" id="name" value="{{old('name')}}">
                  @error('name')
                  <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea name="description" placeholder="Word descritpion..." type="text" class="form-control" id="description">{{old('description')}}</textarea>
                  @error('description')
                  <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

            </div>
        </div>
    </div>

    </x-layout>
