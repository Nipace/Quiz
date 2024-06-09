<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
</head>
<body class="bg-light">
<div class="container mt-5">
    <div id="start-quiz" class="quiz-container">
        <h3 class="text-center">Enter Your Name</h3>
        <form id="start-form">
            <div class="form-group">
                <input type="text" class="form-control" id="username" placeholder="Enter your name" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Start Quiz</button>
        </form>
    </div>

    <div id="quiz-container" class="quiz-container" style="display:none;">
        <div id="question-container">
            <h3 id="question-text"></h3>
            <ul id="options-list" class="list-group"></ul>
        </div>
        <button id="next-btn" class="btn btn-primary mt-3">Next</button>
    </div>

    <div id="results-container" style="display:none;">
        <!-- Results will be inserted here by JavaScript -->
    </div>
</div>
</body>
</html>
