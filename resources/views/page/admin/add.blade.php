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

    </style>

@endsection

@section('content')

    <a href="{{ route('admin.home') }}" class="light-button">
        Back
    </a>

    <div class="gap"></div>

    <h1>Add</h1>

    <div class="gap"></div>

    <form action="{{ route('api.event.create') }}" method="POST">
        @csrf
        <input type="hidden" name="admin_id" value="{{ $userId }}" />
        <div class="detail-row">
            <div class="label">Name</div>
            <div >
                <input name="name" />
            </div>
        </div>
        <div class="detail-row">
            <div class="label">Image</div>
            <div >
                <input name="image" />
            </div>
        </div>
        <div class="detail-row">
            <div class="label">Price</div>
            <div >
                <input name="price" />
            </div>
        </div>
        <div class="detail-row">
            <div class="label">Location</div>
            <div >
                <input name="location" />
            </div>
        </div>
        <div class="detail-row">
            <div class="label">Date</div>
            <div >
                <input type="date" name="date" min="{{ date('Y-m-d') }}" />
            </div>
        </div>
        <div class="detail-row">
            <div class="label">Time</div>
            <div >
                <input name="time" />
            </div>
        </div>
        <div class="detail-row">
            <div class="label">Description</div>
            <div class="value">
                <textarea rows="5" class="w-100" name="description"></textarea>
            </div>
        </div>
        <div class="detail-row">
            <div class="label">Terms</div>
            <div class="value">
                <textarea rows="5" class="w-100" name="terms"></textarea>
            </div>
        </div>
        <div class="detail-row">
            <div style="width: 25%;"></div>
            <div class="value">
                <button class="light-button">Submit</button>
            </div>
        </div>
    </form>

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
