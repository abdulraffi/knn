<html>
<head>
    <title> Make A K-Nearest neighbor </title>

</head>
<body>
<div class="container" style="margin-top:2%; margin-bottom: 2%;">
    <div class="card">
        <div class="card-header">Make A K-Nearest neighbor</div>
        <div class="card-body">
            <div class="row">

                <div class="col">
                    <button class="btn btn-success btn-sm btn-block">Button 1</button>
                </div>

                <div class="col">
                    <button class="btn btn-danger btn-sm btn-block" onclick="sum(this);">Penjumlahan TF IDF</button>
                </div>

            </div>
            <div class="row">

                <div class="col">

                    <div class="form-check form-check-inline">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input"
                                   id="total_follower" <?php echo($setting->follower == 'true' ? 'checked' : '');?>>
                            <label class="form-check-label" for="total_follower" style="margin-top: 4%;">Total
                                Follower</label>
                            <br>
                            <input type="checkbox" class="form-check-input"
                                   id="total_following" <?php echo($setting->following == 'true' ? 'checked' : '');?>>
                            <label class="form-check-label" for="total_following" style="margin-top: 4%;">Total
                                Following</label>
                            <br>
                            <input type="checkbox" class="form-check-input"
                                   id="total_media_url" <?php echo($setting->total_media_url == 'true' ? 'checked' : '');?>>
                            <label class="form-check-label" for="total_media_url" style="margin-top: 4%;">Total
                                Media URL</label>
                            <br>
                            <input type="checkbox" class="form-check-input"
                                   id="total_url" <?php echo($setting->total_url == 'true' ? 'checked' : '');?>>
                            <label class="form-check-label" for="total_url" style="margin-top: 4%;">Total
                                URL</label>
                            <br>
                            <input type="checkbox" class="form-check-input"
                                   id="total_mention" <?php echo($setting->total_mention == 'true' ? 'checked' : '');?>>
                            <label class="form-check-label" for="total_mention" style="margin-top: 4%;">Total
                                Mention</label>
                            <br>
                            <input type="checkbox" class="form-check-input"
                                   id="total_RT" <?php echo($setting->total_RT == 'true' ? 'checked' : '');?>>
                            <label class="form-check-label" for="total_RT" style="margin-top: 4%;">Total
                                RT</label>
                            <br>
                            <input type="checkbox" class="form-check-input"
                                   id="total_hashtag" <?php echo($setting->total_hashtag == 'true' ? 'checked' : '');?>>
                            <label class="form-check-label" for="total_hashtag" style="margin-top: 4%;">Total
                                Hastag</label>
                            <br>
                            <input type="checkbox" class="form-check-input"
                                   id="total_huruf_besar" <?php echo($setting->total_huruf_besar == 'true' ? 'checked' : '');?>>
                            <label class="form-check-label" for="total_huruf_besar" style="margin-top: 4%;">Total
                                Huruf Besar</label>

                        </div>
                    </div>
                    <br>
                    <label class="form-check-label" for="total_follower">Nilai K</label>
                    <input type="number" class="text-info" id="nilai_k" value="{{$setting->nilai_k}}">

                </div>

                <div class="col">
                    <div class="form-check form-check-inline">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input"
                                   id="total_tanda_baca" <?php echo($setting->total_tanda_baca == 'true' ? 'checked' : '');?>>
                            <label class="form-check-label" for="total_tanda_baca" style="margin-top: 4%;">Total
                                Tanda Baca</label>
                            <br>
                            <input type="checkbox" class="form-check-input"
                                   id="total_emoji" <?php echo($setting->total_emoji == 'true' ? 'checked' : '');?>>
                            <label class="form-check-label" for="total_emoji" style="margin-top: 4%;">Total
                                Emoji</label>
                            <br>
                            <input type="checkbox" class="form-check-input"
                                   id="total_kata" <?php echo($setting->total_kata == 'true' ? 'checked' : '');?>>
                            <label class="form-check-label" for="total_kata" style="margin-top: 4%;">Total
                                Kata</label>
                            <br>
                            <input type="checkbox" class="form-check-input"
                                   id="rata2_kata" <?php echo($setting->rata2_kata == 'true' ? 'checked' : '');?>>
                            <label class="form-check-label" for="rata2_kata" style="margin-top: 4%;">Rata -
                                rata Kata</label>
                            <br>
                            <input type="checkbox" class="form-check-input"
                                   id="total_karakter" <?php echo($setting->total_karakter == 'true' ? 'checked' : '');?>>
                            <label class="form-check-label" for="total_karakter" style="margin-top: 4%;">Total
                                Karakter</label>
                            <br>
                            <input type="checkbox" class="form-check-input"
                                   id="rata2_karakter" <?php echo($setting->rata2_karakter == 'true' ? 'checked' : '');?>>
                            <label class="form-check-label" for="rata2_karakter" style="margin-top: 4%;">Rata
                                - rata Karakter</label>
                            <br>
                            <input type="checkbox" class="form-check-input"
                                   id="TF_IDF" <?php echo($setting->TF_IDF == 'true' ? 'checked' : '');?>>
                            <label class="form-check-label" for="TF_IDF" style="margin-top: 4%;">TF
                                IDF</label>


                        </div>
                    </div>
                    <br>
                    <button class="btn btn-primary" style="margin-left: 5%;" onclick="handleClick(this);">Make a K-NN
                    </button>
                </div>

            </div>


                {{--<a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Toggle first element</a>--}}

            {{--<div class="row">--}}
                {{--<div class="col">--}}
                    {{--<div class="collapse multi-collapse" id="multiCollapseExample1">--}}
                        {{--<div class="card card-body">--}}
                            {{--Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="card" style="margin-top: 3%;">
            <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Tampilan Data</a>
            </div>
            <div class="collapse" id="multiCollapseExample1">
            <table class="table">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Akun</th>
                        <th scope="col">Kelas Asli</th>
                        <th scope="col">kelas Prediksi </th>

                    </tr>
                    </thead>

                    <tbody>

                    @foreach($data as $indexKey => $datas)

                        <tr>
                            <th scope="row">{{++$indexKey}}</th>
                            <td>{{$datas->akun}}</td>
                            <td>{{$datas->kelas_asli}}</td>
                            <td>{{$datas->kelas_prediksi}}</td>
                        </tr>


                    @endforeach
                    </tbody>

                </table>
            </table>
            </div>
            <div class="row" style="margin-top:10px;">
                <div class="col-md-12">
                    <!-- About Me Box -->
                    <div class="box box-primary">

                        <!-- /.box-body -->
                        <div class="box-body">

                            <div class="box-body">
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <strong><i class="fa fa-book margin-r-5"></i>Presision</strong>
                                        <p>Agreetableness : {{ $result->re_a }}</p>
                                        <p>Conscientiousness : {{ $result->re_c}}</p>
                                        <p>Extraversion : {{ $result->re_e}}</p>
                                        <p>Neuroticsm : {{ $result->re_n }}</p>
                                        <p>Openness to Experience : {{ $result->re_o}}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <strong><i class="fa fa-book margin-r-5"></i>Recall</strong>
                                        <p>Agreetableness : {{ $result->pre_a }}</p>
                                        <p>Conscientiousness : {{ $result->pre_c }}</p>
                                        <p>Extraversion : {{ $result->pre_e }}</p>
                                        <p>Neuroticsm : {{ $result->pre_n }}</p>
                                        <p>Openness to Experience : {{ $result->pre_o }}</p>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Akurasi : {{ $result->akurasi }}</p>
                                    </div>
                                </div>
                                <hr>

                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
                </div>
        </div>

        </div>
    </div>


</body>

</html>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>

    var APP_URL = {!! json_encode(url('/')) !!};

    $(document).ready(function () {


    });

    function sum(cb) {

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: APP_URL + "/api/knn/sum",
            success: function (data) {
                alert("Penjumlahan TF IDF selesai");
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                // alert(thrownError);
            }

        });
    }


    function handleClick(cb) {

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: APP_URL + "/api/knn/datatest",
            data: {
                // "nilai_k": $("#nilai_k").val(),

                "follower": $("#total_follower").is(':checked'),
                "following": $("#total_following").is(':checked'),
                "total_media_url": $("#total_media_url").is(':checked'),
                "total_url": $("#total_url").is(':checked'),
                "total_mention": $("#total_mention").is(':checked'),

                "total_RT": $("#total_RT").is(':checked'),
                "total_hashtag": $("#total_hashtag").is(':checked'),
                "total_huruf_besar": $("#total_huruf_besar").is(':checked'),
                "total_tanda_baca": $("#total_tanda_baca").is(':checked'),
                "total_emoji": $("#total_emoji").is(':checked'),

                "total_kata": $("#total_kata").is(':checked'),
                "rata2_kata": $("#rata2_kata").is(':checked'),
                "total_karakter": $("#total_karakter").is(':checked'),
                "rata2_karakter": $("#rata2_karakter").is(':checked'),
                "TF_IDF": $("#TF_IDF").is(':checked'),
            },
            success: function (data) {
                // location.reload();
                console.info(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                // alert(thrownError);
            }

        });

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: APP_URL + "/api/knn/report",
            success: function (data) {
                location.reload();
                console.info(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                // alert(thrownError);
            }

        });

        var y = $("#rata2_karakter").is(':checked');
        console.log(y);
    }


    // $('#total_follower').onchange

</script>