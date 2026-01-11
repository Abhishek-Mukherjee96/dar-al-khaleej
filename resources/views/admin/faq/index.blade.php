@extends('admin.layouts.main')
@section('content')
<x-flash />
<div class="card mt-2">
    <div class="card-header">
        <h5 class="pull-left pt-2">FAQ</h5>
            <a href="{{route('add_faq')}}" class="btn btn-primary pull-right"><i class="bi bi-plus"></i> Add FAQ</a>
        <div class="clear"></div>
    </div>
    <div id="tableExample">
        <div class="table-responsive scrollbar">
            <table class="table mb-0 data-table fs-10 tableToExport">
                <thead class="bg-200">
                    <tr>
                        <th class="text-900 sort text-nowrap">SL No.</th>
                        <th class="text-900 sort text-nowrap">Question</th>
                        <th class="text-900 sort text-nowrap">Status</th>
                        <th class="text-900 sort text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody id="business_filter_data">
                    @if (count($faqs) > 0)
                    @foreach ($faqs as $value)
                    <tr>
                        <td class="text-nowrap">{{ $loop->iteration }}</td>
                        <td class="text-nowrap">{{ $value->question }}</td>
                        <td class="text-nowrap">{!! status_badge($value->status) !!}</td>
                        <td class="text-nowrap">
                            <a href="{{route('edit_faq_action', $value->faq_id)}}" class="badge bg-info rounded rounded-circle" style="padding-top: 7px; padding-bottom: 7px;">
                                <i class="bi bi-pencil fs-9"></i>
                            </a>
                            <a href="{{route('delete_faq_action', $value->faq_id)}}" class="badge bg-danger rounded rounded-circle" style="padding-top: 7px; padding-bottom: 7px;"
                                onclick="return confirm('Are you sure?')">
                                <i class="bi bi-trash fs-9"></i>
                            </a>
                        </td>
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
                {{ $faqs->links() }}
            </div>
        </div>
    </div>
</div>
@endsection