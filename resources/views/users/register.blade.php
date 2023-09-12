<x-layout>
    <div class="container">
        <div class="row">
        <div class="col-12">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Register
            </h2>
            <p class="mb-4">Create an account to post gigs</p>
        </header>

        <form method="POST" action="/users">
            @csrf
            <div class="form-group">
                <label for="name" class="inline-block text-lg mb-2">Name</label>
                <input
                    type="text"
                    class="form-control"
                    name="name"

                    value="{{old('name') }}"
                />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="form-group">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    value="{{old('email') }}"
                />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="inline-block text-lg mb-2">Password</label>
                <input
                    type="password"
                    class="form-control"
                    name="password"
                    value="{{old('password') }}"
                />
                @error('password')
                <p class="text-red-500 text-xs mt-1">
                    {{$message}}
                </p>
            @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="inline-block text-lg mb-2" >Confirm Password</label>
                <input
                    type="password"
                    class="form-control"
                    name="password_confirmation"
                />
                @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">
                    {{$message}}
                </p>
            @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>

            <div class="mt-8">
                <p>Already have an account?<a href="/login" class="text-laravel">Login</a></p>
            </div>
        </form>
    </div>
</div>
</div>
</x-layout>

