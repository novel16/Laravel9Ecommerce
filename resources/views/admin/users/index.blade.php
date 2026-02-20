@extends('layouts.admin')


@section('content')
    <div class="row">


        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Manage Users
                        <a href="{{ url('admin/users/create') }}" class="btn btn-success text-light btn-sm float-end">Add
                            User</a>
                    </h3>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle text-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <span class="badge bg-{{ $user->role_as == '1' ? 'primary' : 'secondary' }}">
                                                {{ $user->role_as == '1' ? 'Admin' : 'User' }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-1 flex-wrap">
                                                <a href="{{ url('admin/users/' . $user->id . '/edit') }}"
                                                    class="btn btn-success btn-sm text-light">
                                                    <i class="fa-regular fa-pen-to-square me-1"></i>Edit
                                                </a>

                                                <form action="{{ url('admin/users/' . $user->id . '/delete') }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this user?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm text-light">
                                                        <i class="fa-regular fa-trash-can me-1"></i>Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No records found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-2">
                        {{ $users->links() }}
                    </div>
                </div>
            @endsection
