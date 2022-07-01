@extends('layouts.app')
@section('content')

@if(session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
@endif
<div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Create Voucher
    </button>
</div>
    <div>
        <table>
            <thead>
                <tr>
                    <td>Voucher Title</td>
                    <td>Start Date</td>
                    <td>Expire Date</td>
                    <td>amount</td>
                    <td>Image</td>
                    <td>Description</td>
                    <td>action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($voucher as $data)
                <tr>
                    <td>{{$data->voucher_title}}</td>
                    <td>{{$data->start_date}}</td>
                    <td>{{$data->expire_date}}</td>
                    <td>{{$data->amount}}</td>
                    <td><img width="30px" class="img-circle" src="{{ asset('storage/voucher_image/' . $data->image) }}"></td>
                    <td>{{$data->description}}</td>
                    <td><a href="{{ route('voucher.edit', $data->id)}}">Edit</a> &nbsp;<a href="{{ route('voucher.delete', $data->id)}}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Voucher</h5>

            </div>
            <div class="modal-body">
                <form action="{{route('voucher.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Voucher Title</label><br>
                            <input type="text" name="voucher_title" required>

                        </div>
                        <div class="col-md-6">
                            <label>Start Date</label><br>
                            <input type="date" name="start_date" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Expire Date</label><br>
                            <input type="date" name="expire_date" required>

                        </div>
                        <div class="col-md-6">
                            <label>Amount</label><br>
                            <input type="text" name="amount" required>
                        </div>
                    </div>
                    <div>
                        <label>Description</label><br>
                        <textarea name="description" rows="4" required></textarea>
                    </div>
                    <div>
                        
                        <input type="file" name="image" id="image" required>
                        <div id="img-preview"></div>
                    </div>

                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

            const chooseFile = document.getElementById("image");
            const imgPreview = document.getElementById("img-preview");

            chooseFile.addEventListener("change", function () {
            getImgData();
            });

            function getImgData() {
            const files = chooseFile.files[0];
            if (files) {
                const fileReader = new FileReader();
                fileReader.readAsDataURL(files);
                fileReader.addEventListener("load", function () {
                imgPreview.style.display = "block";
                imgPreview.innerHTML = '<img src="' + this.result + '" />';
                });    
            }
            
            }
</script>

@endsection