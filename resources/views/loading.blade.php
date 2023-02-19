<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loading</title>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>
<body>
    <div>
        Test
        @foreach ($Users as $item)
        <div>
            {{ $item->name }}
        </div>
        @endforeach
    </div>

    <div id="progress-bar-container">
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div id="progress-bar-message"></div>
    </div>

    <script>
        $(function() {
            var progressBar = $('.progress-bar');
            var message = $('#progress-bar-message');

            $.ajax({
                url: '/loading'
                , method: 'GET'
                , xhrFields: {
                    onprogress: function(e) {
                        var progress = e.loaded / e.total * 100;
                        console.log(e.total)
                        progressBar.css('width', progress + '%');
                        progressBar.attr('aria-valuenow', progress);
                    }
                }
            }).done(function() {
                // Hide progress bar and message when done
                $('#progress-bar-container').hide();
            }).fail(function() {
                // Show error message if Ajax request fails
                message.text('An error occurred while loading the data.');
            }).always(function() {
                // Hide progress bar and message when done or when an error occurs
                $('#progress-bar-container').hide();
            });

            // Listen for progress updates
            var source = new EventSource('/loading');
            source.onmessage = function(event) {
                var data = JSON.parse(event.data);
                var progress = data.progress;
                var message = data.message;

                progressBar.css('width', progress + '%');
                progressBar.attr('aria-valuenow', progress);
                message.text(message);
            };
        });

    </script>
</body>
</html>
