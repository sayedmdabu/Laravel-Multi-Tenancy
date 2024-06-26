<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
            <x-button-link  class="ml-4 float-right" href="{{route('users.create')}}">Create User</x-button-link>
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- @dd($tenants->toArray()) --}}
                    <table class="table table-bordered border-primary">
                        <thead>
                          <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @forelse ($user->roles as $role)
                                            {{$role->name}} {{$loop->last ? '' : ', '}}
                                        @empty

                                        @endforelse
                                    </td>
                                    <td>@mdo</td>
                                </tr>
                            @empty

                            @endforelse
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</x-tenant-app-layout>
