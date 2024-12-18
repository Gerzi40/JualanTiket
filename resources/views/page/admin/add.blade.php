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

        .uploadPoster img{
            max-width: 1000px;
        }

        #poster {
            display: none;
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

    <form action="{{ route('api.event.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="admin_id" value="{{ $userId }}" />
        <div class="detail-row">
            <div class="label">Name</div>
            <div>
                <input name="name" />
            </div>
        </div>
        <div class="detail-row">
            <div class="label">Price</div>
            <div>
                <input name="price" />
            </div>
        </div>
        <div class="detail-row">
            <div class="label">Location</div>
            <div>
                <input name="location" />
            </div>
        </div>
        <div class="detail-row">
            <div class="label">Date</div>
            <div>
                <input type="date" name="date" min="{{ date('Y-m-d') }}" />
            </div>
        </div>
        <div class="detail-row">
            <div class="label">Time</div>
            <div>
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
            <div class="label">Poster</div>
            <div class="value">
                <label for="poster" class="uploadPoster">
                    <label id="chooseFileText">Choose a File</label>
                    <img src="#" id="file-preview">
                </label>
                <input type="file" id="poster" name="image" required />
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

@section('extra-js')
    <script>
        const input = document.getElementById('poster');
        const previewPhoto = () => {
            const file = input.files;
            if (file) {
                const fileReader = new FileReader();
                const preview = document.getElementById('file-preview');
                fileReader.onload = function(event) {
                    preview.setAttribute('src', event.target.result);
                }
                fileReader.readAsDataURL(file[0]);

                document.getElementById('chooseFileText').style.display = "none"
                document.getElementById('file-preview').style.display = "block"
            }
        }

        input.addEventListener("change", previewPhoto);
    </script>
@endsection
