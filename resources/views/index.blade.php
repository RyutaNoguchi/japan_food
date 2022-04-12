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
                    if (prefectures[data.code-1]['color'] == '#FFC107') {
                        window.location.href =　'/' + data.code;
                    }
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
    
    @if(isset($prefecture))
        <p>献立</p>
        <p>{{ $prefecture->menu }}</p>
        @foreach($images as $image)
            <img src="{{ $image->path }}">
        @endforeach
    @endif
    
    <form action='/store' method='POST' enctype='multipart/form-data'>
        @csrf
        <p>
        <select name="prefecture[id]">
            <option value="" selected>都道府県</option>
            <option value="1">北海道</option>
            <option value="2">青森県</option>
            <option value="3">岩手県</option>
            <option value="4">宮城県</option>
            <option value="5">秋田県</option>
            <option value="6">山形県</option>
            <option value="7">福島県</option>
            <option value="8">茨城県</option>
            <option value="9">栃木県</option>
            <option value="10">群馬県</option>
            <option value="11">埼玉県</option>
            <option value="12">千葉県</option>
            <option value="13">東京都</option>
            <option value="14">神奈川県</option>
            <option value="15">新潟県</option>
            <option value="16">富山県</option>
            <option value="17">石川県</option>
            <option value="18">福井県</option>
            <option value="19">山梨県</option>
            <option value="20">長野県</option>
            <option value="21">岐阜県</option>
            <option value="22">静岡県</option>
            <option value="23">愛知県</option>
            <option value="24">三重県</option>
            <option value="25">滋賀県</option>
            <option value="26">京都府</option>
            <option value="27">大阪府</option>
            <option value="28">兵庫県</option>
            <option value="29">奈良県</option>
            <option value="30">和歌山県</option>
            <option value="31">鳥取県</option>
            <option value="32">島根県</option>
            <option value="33">岡山県</option>
            <option value="34">広島県</option>
            <option value="35">山口県</option>
            <option value="36">徳島県</option>
            <option value="37">香川県</option>
            <option value="38">愛媛県</option>
            <option value="39">高知県</option>
            <option value="40">福岡県</option>
            <option value="41">佐賀県</option>
            <option value="42">長崎県</option>
            <option value="43">熊本県</option>
            <option value="44">大分県</option>
            <option value="45">宮崎県</option>
            <option value="46">鹿児島県</option>
            <option value="47">沖縄県</option>
        </select>
        </p>
        <p><textarea name='prefecture[menu]' rows="10" cols="60" placeholder="献立を入力してください"></textarea></textarea></textarea></p>
        <p><input type='file' name='image[]' accept="image/jpeg,image/png,image/gif" multiple></p>
        <button type="submit" class="btn btn-outline-warning m-2 text-right">登録</button>
    </form>

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
    
</body>
</html>