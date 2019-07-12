@extends(view()->exists('laracms.dashboard.layouts.app') ? 'laracms.dashboard.layouts.app' : 'laracms.dashboard::layouts.app', ['page' => __('laracms::admin.laracms_users')] )

@section('content')
    <div class="form-group">
        <a class="btn btn-success" href="{{ route('laracms.users.create') }}">{{ __('laracms::admin.create') }}</a>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('laracms::admin.laracms_users') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('laracms::admin.name') }}</th>
                                        <th>{{ __('laracms::admin.email') }}</th>
                                        <th>{{ __('laracms::admin.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="text-center">{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td class="text-right">
                                                <a title="{{ __('laracms::admin.edit') }}"
                                                   href="{{ route('laracms.users.edit', $user->id) }}" type="button"
                                                   rel="tooltip" class="btn btn-success btn-icon btn-sm ">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                @if(Auth::guard('laracms')->user()->id != $user->id)
                                                    <a title="{{ __('laracms::admin.delete') }}"
                                                       onclick="return confirm('{{ __('laracms::admin.sure_to_delete') }}')"
                                                       href="{{ route('laracms.users.destroy', $user->id) }}" type="button"
                                                       rel="tooltip" class="btn btn-danger btn-icon btn-sm ">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
