@extends('layouts.app')
@section('content')

@if(session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
@endif
<div class="col-md-8 voucher-form">
    <form action="{{route('voucher.update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="voucher_title">Voucher Title</label>
                <input type="text" class="form-control" id="voucher_title" name="voucher_title" value="{{$vouchers->voucher_title}}" placeholder="Voucher Title">
                
            </div>
            <div class="form-group col-md-6">
                <label for="amount">Amount</label>
                <input type="text" class="form-control" id="amount" name="amount" value="{{$vouchers->amount}}" placeholder="Amount">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="start_date">Start Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{$vouchers->start_date}}" placeholder="Start Date">
            </div>
            <div class="form-group col-md-6">
                <label for="expire_date">Expire Date</label>
                <input type="date" class="form-control" id="expire_date" name="expire_date" value="{{$vouchers->expire_date}}" placeholder="End Date">
            </div>
        </div>
        <div class="form-row">
            
                <label for="description">Descrption</label><br>
                <textarea name="description" id="descriptin" class="form-control" rows="3">{{$vouchers->description}}</textarea>
        </div>
        <div class="form-row">
            <label for="image">Image</label><br>
            <input type="file" class="form-control" id="image" name="image" value="{{ $vouchers->image}}" placeholder="Image">
            <div id="img-preview"></div>
        </div>
        <input type="hidden" value="{{$vouchers->id}}" name="id">

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
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
            else{
                imgPreview.innerHTML = '<img src="' + php + '" />';
                    
            }
            }
</script>

@endsection