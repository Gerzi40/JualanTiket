@extends('layout.user.master')

@section('content')
    <div class="container-fluid">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">@lang('message.eventname')</th>
                    <th scope="col">@lang('message.ticketcategory')</th>
                    <th scope="col">@lang('message.totalticket')</th>
                    <th scope="col">@lang('message.totalprice')</th>
                    <th scope="col">@lang('message.purchasedate')</th>
                    <th scope="col">@lang('message.showqr')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $tr)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $tr->event->name }}</td>
                        <td>{{ $tr->ticketcategory->name }}</td>
                        <td>{{ $tr->total_ticket }}</td>
                        <td>Rp. {{ number_format($tr->total_price, 2, ',', '.') }}</td>
                        <td>{{ $tr->created_at->format('d M Y') }}</td>
                        <td>
                            <!-- Show QR Button -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#qrModal"
                                data-id="{{ $tr->id }}" data-qrcode="{{ $tr->qrcode }}">
                                @lang('message.showqr')
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="qrModalLabel">QR Code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="qrCodeImage" src="/assets/transaction/qr.png" alt="QR Code" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.querySelectorAll('.modal-backdrop').forEach(backdrop => backdrop.remove());
        var qrModal = new bootstrap.Modal(document.getElementById('qrModal'), {
            backdrop: false
        });
        qrModal.show();
        qrModal.hide();
    </script>
@endsection
