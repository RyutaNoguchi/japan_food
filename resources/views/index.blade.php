<!DOCTYPE HTML>

<html>
<head>
    <title>食の旅2022</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <script type="text/javascript" src="{{ url(mix('js/jmap.js')) }}" defer></script>
    <script type = "text/javascript">
        const prefectures = @json($prefectures);
        $(document).ready(function() {
            $('#jmap').jmap({
                height: '700px',
                lineColor: '#bfbfbf',
                lineWidth: 1,
                showInfobox: true,
                backgroundRadius: '0.3rem',
                backgroundPadding: '1rem',
                backgroundColor: '#ff000000',
                prefectureClass: 'prefecture',
                prefectureLineColor: '#ffffff',
                prefectureLineWidth: 1,
                prefectureLineHoverColor : '#fff',
                fontSize: '0.8rem',
                fontColor: '#000',
                font: 'serif',
                areas: prefectures,
                onSelect: function(e, data) {
                    $('#prefectureModal').find('#prefectureModalTitle')
                    .html(data.area8.name + " - " + data.area11.name + " - " + data.name + data.full)
                    .end().find('.modal-body')
                    .html(JSON.stringify(data, null, 4))
                    .end().modal('show');
                },
            });
        });
    </script>
    <link href="{{ asset('css/jmap.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <h1 class="m-2">日本47都道府県 食の旅2022</h1>
    
    <div id="jmap">
        <div class="jmap-infobox">
        </div>
    </div>
    
    <button type="button" class="btn btn-outline-warning m-2 text-right">登録</button>

    <div class="modal fade" id="prefectureModal" tabindex="-1" role="dialog" aria-labelledby="prefectureModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="prefectureModalTitle"></h5>
                </div>
                <div class="modal-body overflow-auto" style="height:350px;">
                </div>
            </div>
        </div>
    </div>
    </div>
    
    //画像のアップロード実験用フォーム
    <form action='/create/' method='POST' enctype="multipart/form-data">
        @csrf
        <input type='file' name='image'>
        {{ csrf_field() }}
        <button type='submit'>送信</button>
    </form>
    
</body>
</html>