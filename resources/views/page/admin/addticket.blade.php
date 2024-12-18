@extends('layout.admin.master')

@section('style')
    <style>
        .detail-row {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .label {
            position: relative;
            min-width: 25%;
        }

        .label:after {
            content: ':';
            position: absolute;
            right: 0;
        }

        .value {
            flex-grow: 1;
        }

        .uploadPoster {
            width: 100%;
            border: dashed grey 1.5px;
            padding: 1rem;
            border-radius: 0.5rem;
            cursor: pointer;
            color: grey;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        #poster {
            display: none;
        }
    </style>
@endsection

@section('content')
<div>
    <h1>Add Ticket</h1>
</div>

<div class="mt-2">
    <a href="{{ route('admin.manageTicket', ['id' => $event->id]) }}" class="light-button">
        Back
    </a>
</div>

<div class="mt-4">
    <form action="{{ route('admin.createTicket') }}" method="POST">
        @csrf
        <input type="hidden" name="event_id" value="{{ $event->id }}" />
        <div class="detail-row">
            <div class="label">Category</div>
            <div>
                <input name="category"/>
            </div>
        </div>
        <div class="detail-row">
            <div class="label">Price</div>
            <div>
                <input name="price"/>
            </div>
        </div>
        <div class="detail-row">
            <div class="label">Date</div>
            <div>
                <input name="deadline" type="datetime-local" min="{{ date('Y-m-d H:i') }}"/>
            </div>
        </div>
        <div class="detail-row">
            <div class="label">Stock</div>
            <div>
                <input name="stock"/>
            </div>
        </div>
        <div class="detail-row">
            <div style="width: 25%;"></div>
            <div class="value">
                <button class="light-button">Submit</button>
            </div>
        </div>
    </form>
</div>
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif
@endsection