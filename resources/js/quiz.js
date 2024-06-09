$(document).ready(function() {
    const startForm = $('#start-form');
    const quizContainer = $('#quiz-container');
    const startQuizContainer = $('#start-quiz');
    const nextBtn = $('#next-btn');
    const optionsList = $('#options-list');
    let currentPage = 0;
    let answers = [];
    let userId = sessionStorage.getItem('user_id');
    let questions = [];  // Store all questions here
    let currentQuestionIndex = null;
    const resultsContainer = $('#results-container');


    startForm.on('submit', function(e) {
        e.preventDefault();
        const username = $('#username').val();
        if (username) {
            $.ajax({
                url: '/api/start',
                method: 'POST',
                contentType: 'application/json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: JSON.stringify({ "name": username }),
                success: function(data) {
                    console.log(data);
                    sessionStorage.setItem('user_id', data.data.id);
                    userId = data.data.id;
                    startQuizContainer.hide();
                    quizContainer.show();
                    loadQuestions();
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }
    });

    function loadQuestions() {
        $.ajax({
            url: '/api/questions',
            method: 'GET',
            success: function(data) {

                questions = data.data.data;  // Store all questions
                loadQuestion(currentPage);  // Load the first question
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }

    function loadQuestion(page) {
        if (questions.length > 0 && page < questions.length) {
            const question = questions[page];
            $('#question-text').text(question.question);
            optionsList.empty();
            question.answers.forEach((answer, index) => {
                optionsList.append(`<li class="list-group-item no-bullets">
                    <input type="radio" name="question${question.id}" value="${answer.id}" id="q${question.id}o${index}">
                    <label for="q${question.id}o${index}">${answer.answer}</label>
                </li>`);
            });
            currentQuestionIndex = page;  // Update the current question index
        } else {
            submitAnswers();
        }
    }

    nextBtn.on('click', function() {
        const selectedOption = $(`input[name="question${questions[currentQuestionIndex].id}"]:checked`);
        if (selectedOption.length > 0) {
            answers.push({
                question_id: questions[currentQuestionIndex].id,
                answer: selectedOption.val()
            });
            currentPage++;
            loadQuestion(currentPage);  // Load next question
        } else {
            alert('Please select an answer before proceeding.');
        }
    });

    function submitAnswers() {

        $.ajax({
            url: '/api/answer',
            method: 'POST',
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: JSON.stringify({ user_id: userId, answers: answers }),
            success: function(data) {
                alert('Quiz submitted successfully!');
                console.log(data);
                answers = [];  // Clear answers array after successful submission
                currentPage = 0;  // Reset to first question
                questions = [];
                resultsContainer.show();// Clear questions array
                quizContainer.hide();
                let resultsHtml = '<h3>Results</h3>';

                    resultsHtml += `<p>Correct Answer: ${data.correct_answers}</p>`;
                    resultsHtml += `<p>Wrong Answer: ${data.wrong_answers}</p>`;
                    resultsHtml += `<p>Total Answered: ${data.total_answers}</p>`;
                    resultsHtml += `<hr>`;
                resultsContainer.html(resultsHtml);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }
});
