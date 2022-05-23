@extends('layouts.app')

<a class="btn btn-primary" href="{{ route('user-create') }}" role="button">CREATE USER</a>
<a class="btn btn-primary" id="import">IMPORT USER</a>
<a class="btn btn-primary" href="{{ route('user-export') }}" role="button">EXPORT USER</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>AVTAR</th>
            <th>ADDRESS</th>
            <th>CITY</th>
            <th>COUNTRY</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td><img src="{{ url('/user_image/'.$user->UserDetail->user_image ) }}" alt=""></td>
                <td>{{ $user->UserDetail->address }}</td>
                <td>{{ $user->UserDetail->city }}</td>
                <td>{{ $user->UserDetail->country }}</td>
                @if ($user->UserDetail->status == '1')
                    <td><button class="btn btn-info changestatus" value="{{ $user }}" name="status"
                            role="button">Active</button></td>
                @else
                    <td><button class="btn btn-danger changestatus" value="{{ $user }}" name="status"
                            role="button">InActive</button></td>
                @endif
                <td><button class="btn btn-danger mail" value="{{ $user->id }}" name="status"
                        role="button">Send Mail</button></td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {!! $users->links() !!}
</div>
<div class="modal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('user-import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="file" name="file">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Import</button>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"app>Close</button> --}}
                </div>
            </form>
        </div>
    </div>
</div>
@push('script')
    <script type="text/javascript">
        $("#import").click(function() {
            $('.modal').modal('show');
        });
        $('.mail').click(function(){
            var user_id = $(this).val();
            console.log(user_id);
            $.ajax({
                type:"POST",
                url:"{{ route('mail') }}",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    user_id:user_id
                }
            });
        });
        $('.changestatus').click(function() {
            var route = "{{ route('user-status') }}";
            var user = $.parseJSON($(this).val());
            $.ajax({
                type: "POST",
                url: route,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    user: user.id
                },
                success: function(data) {
                    location.reload(true);
                }
            });
        });
    </script>
@endpush
