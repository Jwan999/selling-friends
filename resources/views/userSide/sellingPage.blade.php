@extends('layouts.master')
@section('content')
    <div id="app" class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-3">
                <div class="card-body font">
                    <form class="ui form" action="/sell" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="ui card centered">
                            <div class="image">
                                <img :src="image" class="image-size">
                            </div>
                            <div class="ui bottom attached button">
                                <label for="exampleFormControlFile1"> <i class="file icon"></i>
                                    هنا خلي صورة صورة صديقك</label>
                                <input style="display: none;" name="image" type="file" @change="onFileChange"
                                       class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </div>

                        <div class="field mt-4">
                            <label class="float-right">شنو اسم صديقك؟</label>
                            <input type="text" name="name" placeholder="">
                        </div>
                        <div class="field mt-4">
                            <label class="float-right"> ببيش تريد تبيعه؟</label>
                            <input type="text" name="price" placeholder="">
                        </div>
                        <div class="field mt-4">
                            <label class="float-right">ليش تريد تبيعه؟</label>
                            <input type="text" name="reason" placeholder="">
                        </div>
                        <button name="submit" class="ui pink basic button left floated font">بيع هسا</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        new Vue({
            el: '#app',
            data: {
                image: ''
            },
            methods: {
                onFileChange(e) {
                    console.log(e);
                    var files = e.target.files || e.dataTransfer.files;
                    if (!files.length)
                        return;
                    this.createImage(files[0]);
                },
                createImage(file) {
                    var image = new Image();
                    var reader = new FileReader();
                    var vm = this;

                    reader.onload = (e) => {
                        vm.image = e.target.result;
                    };
                    reader.readAsDataURL(file);
                },
            }
        })</script>
@endpush
