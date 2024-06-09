<x-tenant-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tenants') }}
            <x-button-link  class="ml-4 float-right" href="{{route('tenants.create')}}">Create Tenants</x-button-link>
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
                            <th scope="col">Domain</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($tenants as $tenant)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{$tenant->name}}</td>
                                    <td>{{$tenant->email}}</td>
                                    <td>
                                        @forelse ($tenant->domains as $domain)
                                            {{$domain->domain}} {{$loop->last ? '' : ', '}}
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
