@extends('admin.layouts.main')
@section('content')
<x-flash />
<div class="card mt-2">
    <div class="card-header">
        <h5 class="pull-left pt-2">Contacts</h5>
        <div class="clear"></div>
    </div>
    <div id="tableExample">
        <div class="table-responsive scrollbar">
            <table class="table mb-0 data-table fs-10 tableToExport">
                <thead class="bg-200">
                    <tr>
                        <th class="text-900 sort text-nowrap">Name</th>
                        <th class="text-900 sort text-nowrap">Email</th>
                        <th class="text-900 sort text-nowrap">Phone</th>
                        <th class="text-900 sort text-nowrap">Subject</th>
                        <th class="text-900 sort text-nowrap">Message</th>
                    </tr>
                </thead>
                <tbody id="business_filter_data">
                    @if (count($contacts) > 0)
                    @foreach ($contacts as $value)
                    <tr>
                        <td class="text-nowrap">{{ $value->name }}</td>
                        <td class="text-nowrap">{{ $value->email }}</td>
                        <td class="text-nowrap">{{ $value->phone }}</td>
                        <td class="text-nowrap">{{ $value->subject }}</td>
                        <td class="text-nowrap">{!! $value->message !!}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5" class="text-center"><?php echo no_record_found_in_table(); ?></td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="text-center justify-content-center filter-loader" style="display: none">
                <div class="spinner-border text-danger" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div class="pagination-wrapper">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection