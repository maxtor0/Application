<x-admin-master>
    @section('content')

        <h1>User profile for: {{auth()->user()->name}}</h1>

        <div class="row">
            <div class="col-sm-6">

                <form action="{{route('user.profile.update',auth()->user())}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                    </div>

                    <div class="form-group">
                        <input type="file" name="avatar">
                    </div>

                    <div class="form-group">
                        <label for="username">User name:</label>
                        <input type="text" name="username"
                               class="form-control" id="username"
                               value="{{auth()->user()->username}}">
                        @error('username')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name"
                               class="form-control" id="name"
                               value="{{auth()->user()->name}}">
                        @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" name="email"
                               class="form-control" id="email"
                               value="{{auth()->user()->email}}">
                        @error('email')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password"
                               class="form-control" id="password">
                        @error('password')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirmation">Confirm password:</label>
                        <input type="password" name="password-confirmation"
                               class="form-control" id="password-confirmation">
                        @error('password-confirmation')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

        </div>

    @endsection
</x-admin-master>
