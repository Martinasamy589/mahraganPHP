<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournament</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="storiesAndTournament.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }

        #storiesAll {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            grid-gap: 30px;
            justify-content: center;
            width: 80%;
            margin: auto;
            border-radius: 20px;
            box-shadow: -7px 7px 1px rgba(0, 0, 0, 0.869);
            background-color: #1d5374;
            padding: 50px 50px 30px 50px;
            transition: all 0.3s;
        }

        .story-container {
            padding: 30px;
            border-radius: 20px;
            background: linear-gradient(to right, #fff4f6, #a8a8a7);
            text-align: center;
            margin-bottom: 30px;
            transition: all 0.3s;
            box-shadow: -7px 7px 1px rgba(0, 0, 0, 0.604);
        }

        .story-image {
            width: 160px;
            height: 160px;
            cursor: pointer;
            border: 3px solid;
            border-radius: 8px;
            box-shadow: -5px 5px 0px rgba(0, 0, 0, 0.604);
            transition: all 0.3s;
        }

        .story-image:active {
            transform: translate(-5px, 5px);
            box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.601);
            transition: all 0.2s;
        }

        .story-box {
            display: none;
            width: 100%;
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-shadow: -5px 5px 0px rgba(0, 0, 0, 0.604);
            background-color: #f9f9f9;
            transition: all 0.3s;
        }

        #Questions-box {
            cursor: pointer;
            display: block;
            justify-content: center;
            width: 80%;
            margin: auto;
            border-radius: 20px;
            box-shadow: -6px 6px 0px rgba(0, 0, 0, 0.869);
            background-color: #1d5374;
            padding: 50px 50px 30px 50px;
            transition: all 0.3s;
        }

        .Question-container {
            padding: 30px;
            border-radius: 20px;
            background: linear-gradient(to right, #fff4f6, #a8a8a7);
            text-align: center;
            margin-bottom: 30px;
            transition: all 0.3s;
            box-shadow: -5px 5px 1px rgba(0, 0, 0, 0.604);
        }

        #Questions-box p {
            user-select: none;
        }

        hr {
            width: 20%;
            margin: auto;
            border: 3px solid rgba(192, 0, 0, 0.745);
            border-radius: 10px;
            opacity: 1;
            transition: all 1s;
        }

        .Answers {
            margin-top: 20px;
            display: none;
        }

        .Answers label {
            user-select: none;
        }

        .Answers .radios {
            padding: 8px;
        }

        .radios label {
            padding: 7px 15px 7px 15px;
            border-radius: 8px;
        }

        .submitButton {
            padding: 5px 10px;
            border-radius: 6px;
            box-shadow: -3px 3px 0px rgba(0, 0, 0, 0.659);
            transition: all 0.2s;
        }

        .submitButton:active {
            transform: translate(-3px, 3px);
            box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.659);
        }

        @media only screen and (max-width: 850px) {
            #storiesAll, #Questions-box {
                width: 95%;
            }
        }
    </style>
</head>

<body>
<div id="Questions-box">

        
<div class="Question-container" >
    <p onclick="toggleAnswers(document.getElementById('Question1')); expandLine(this)"> ما هو تاريخ ميلاد الشهيد بيشوي</p>
    <hr>
    <div class="Answers" id="Question1">
        <div class="radios"><input type="radio" name="Q1" id="Q1-1st"><label for="Answer#1">1994</label></div>
        <div class="radios"><input type="radio" name="Q1" id="Q1-2nd"><label for="Answer#2">1998</label></div>
        <div class="radios"><input type="radio" name="Q1" id="Q1-3rd"><label for="Answer#3">1997</label></div>
        <div class="radios"><input type="radio" name="Q1" id="Q1-4th"><label for="Answer#4">1996</label></div>
        <button type="button" onclick="checkAnswers(1,'Q1-1st');submit(this)"  class="submitButton" >Submit</button>
    </div>
</div>


<div class="Question-container">
    <p onclick="toggleAnswers(document.getElementById('Question2')); expandLine(this)">    الشهيد بيشوي من شهداء </p>
    <hr>
    <div class="Answers" id="Question2">
        <div class="radios"><input type="radio" name="Q2" id="Q2-1st"><label for="Answer#1">  شهداء طنطا</label></div>
        <div class="radios"><input type="radio" name="Q2" id="Q2-2nd"><label for="Answer#2">  شهداء البطرسيه</label></div>
        <div class="radios"><input type="radio" name="Q2" id="Q2-3rd"><label for="Answer#3"> شهداء الاسكندريه </label></div>
        <div class="radios"><input type="radio" name="Q2" id="Q2-4th"><label for="Answer#4"> شهداء مطروح </label></div>
        <button type="button" onclick="checkAnswers(2,'Q2-1st');submit(this)"  class="submitButton" >Submit</button>

    </div>
</div>



<div class="Question-container">
    <p onclick="toggleAnswers(document.getElementById('Question3')); expandLine(this)">    الشهيدتان مارينا وفيبرونيا من شهداء </p>
    <hr>
    <div class="Answers" id="Question3">
        <div class="radios"><input type="radio" name="Q3" id="Q3-1st"><label for="Answer#1">  شهداء الاسكندريه</label></div>
        <div class="radios"><input type="radio" name="Q3" id="Q3-2nd"><label for="Answer#2">دير المحرق </label></div>
        <div class="radios"><input type="radio" name="Q3" id="Q3-3rd"><label for="Answer#3">شهداء طنطا   </label></div>
        <div class="radios"><input type="radio" name="Q3" id="Q3-4th"><label for="Answer#4">شهداء البطرسيه </label></div>
        <button type="button" onclick="checkAnswers(3,'Q3-4th');submit(this)"  class="submitButton">Submit</button>
    </div>
</div>

<div class="Question-container">
    <p onclick="toggleAnswers(document.getElementById('Question4')); expandLine(this)">الشهيده ماجي مؤمن ؟</p>
    <hr>
    <div class="Answers" id="Question4">
        <div class="radios"><input type="radio" name="Q4" id="Q4-1st"><label for="Answer#1">اول شهداء مطروح</label></div>
        <div class="radios"><input type="radio" name="Q4" id="Q4-2nd"><label for="Answer#2">اول شهداء البطرسيه     </label></div>
        <div class="radios"><input type="radio" name="Q4" id="Q4-3rd"><label for="Answer#3">اخر شهداء البطرسيه</label></div>
        <div class="radios"><input type="radio" name="Q4" id="Q4-4th"><label for="Answer#4">اصغر شهداء الاسكندريه</label></div>
        <button type="button" onclick="checkAnswers(4,'Q4-3rd');submit(this)"  class="submitButton" >Submit</button>
    </div>
</div>

<div class="Question-container">
    <p onclick="toggleAnswers(document.getElementById('Question5')); expandLine(this)">الشهيد القس رافائيل موسى</p>
    <hr>
    <div class="Answers" id="Question5">
        <div class="radios"><input type="radio" name="Q5" id="Q5-1st"><label for="Answer#1">يعد راعيا كاهنا لكنيسة مارجرجس إحدى الكنائس الرئيسية فى مدينة العريش</label></div>
        <div class="radios"><input type="radio" name="Q5" id="Q5-2nd"><label for="Answer#2">شهيد العريش</label></div>
        <div class="radios"><input type="radio" name="Q5" id="Q5-3rd"><label for="Answer#3">استشهد  بعد خروجه من خدمة القداس الإلهى</label></div>
        <div class="radios"><input type="radio" name="Q5" id="Q5-4th"><label for="Answer#4">كل ما سبق صحيح</label></div>
        <button type="button" onclick="checkAnswers(5,'Q5-4th');submit(this)"  class="submitButton" >Submit</button>
    </div>
</div>

<div class="Question-container">
    <p onclick="toggleAnswers(document.getElementById('Question6')); expandLine(this)"> أبونا الراهب أغابيوس المحرقي</p>
    <hr>
    <div class="Answers" id="Question6">
        <div class="radios"><input type="radio" name="Q6" id="Q6-1st"><label for="Answer#1">هو ابن خالة نيافة الأنبا ساويرس رئيس دير المحرق</label></div>
        <div class="radios"><input type="radio" name="Q6" id="Q6-2nd"><label for="Answer#2"> هو ابن عم نيافة الأنبا ساويرس رئيس دير المحرق</label></div>
        <div class="radios"><input type="radio" name="Q6" id="Q6-3rd"><label for="Answer#3">هو شقيق نيافة الأنبا ساويرس رئيس دير المحرق</label></div>
        <div class="radios"><input type="radio" name="Q6" id="Q6-4th"><label for="Answer#4">لا توجد اجابه صحيحه</label></div>
        <button type="button" onclick="checkAnswers(6,'Q6-1st');submit(this)"  class="submitButton" >Submit</button>
    </div>
</div>

<div class="Question-container">
    <p onclick="toggleAnswers(document.getElementById('Question7')); expandLine(this)"> أبونا القمص أرسانيوس وديد رزق الله  تم رسامته علي يد</p>
    <hr>
    <div class="Answers" id="Question7">
        <div class="radios"><input type="radio" name="Q7" id="Q7-1st"><label for="Answer#1">الانبا بيشوي</label></div>
        <div class="radios"><input type="radio" name="Q7" id="Q7-2nd"><label for="Answer#2"> البابا كيرلس السادس</label></div>
        <div class="radios"><input type="radio" name="Q7" id="Q7-3rd"><label for="Answer#3">قداسة البابا شنوده الثالث 117</label></div>
        <div class="radios"><input type="radio" name="Q7" id="Q7-4th"><label for="Answer#4"> لا توجد اجابه صحيحه</label></div>
        <button type="button" onclick="checkAnswers(7,'Q7-3rd');submit(this)"  class="submitButton" >Submit</button>
    </div>
</div>

<div class="Question-container">
    <p onclick="toggleAnswers(document.getElementById('Question8')); expandLine(this)"> الشهيد ابونا سمعان شحاته ولد في سنه</p>
    <hr>
    <div class="Answers" id="Question8">
        <div class="radios"><input type="radio" name="Q8" id="Q8-1st"><label for="Answer#1">1975   </label></div>
        <div class="radios"><input type="radio" name="Q8" id="Q8-2nd"><label for="Answer#2">1972</label></div>
        <div class="radios"><input type="radio" name="Q8" id="Q8-3rd"><label for="Answer#3">1979 </label></div>
        <div class="radios"><input type="radio" name="Q8" id="Q8-4th"><label for="Answer#4">1950</label></div>
        <button type="button" onclick="checkAnswers(8,'Q8-2nd');submit(this)"  class="submitButton" >Submit</button>
    </div>
</div>

<div class="Question-container">
    <p onclick="toggleAnswers(document.getElementById('Question9')); expandLine(this)">  الشهيد ابونا سمعان شحاته</p>
    <hr>
    <div class="Answers" id="Question9">
        <div class="radios"><input type="radio" name="Q9" id="Q9-1st"><label for="Answer#1"> له اربعه اخوة </label></div>
        <div class="radios"><input type="radio" name="Q9" id="Q9-2nd"><label for="Answer#2"> له ثلاته اخوة </label></div>
        <div class="radios"><input type="radio" name="Q9" id="Q9-3rd"><label for="Answer#3"> له سته اخوة </label></div>
        <div class="radios"><input type="radio" name="Q9" id="Q9-4th"><label for="Answer#4"> له خمسة اخوة </label></div>
        <button type="button" onclick="checkAnswers(9,'Q9-4th');submit(this)"  class="submitButton" >Submit</button>
    </div>
</div>

<div class="Question-container">
    <p onclick="toggleAnswers(document.getElementById('Question10')); expandLine(this)"> شهداء كنيسه القديسين هم شهداء </p>
    <hr>
    <div class="Answers" id="Question10">
        <div class="radios"><input type="radio" name="Q10" id="Q10-1st"><label for="Answer#1">شهداء الاسكندريه</label></div>
        <div class="radios"><input type="radio" name="Q10" id="Q10-2nd"><label for="Answer#2" >شهداء البطرسيه </label></div>
        <div class="radios"><input type="radio" name="Q10" id="Q10-3rd"><label for="Answer#3">شهداء مطروح</label></div>
        <div class="radios"><input type="radio" name="Q10" id="Q10-4th"><label for="Answer#4">شهداء طنطا</label></div>
        <button type="button" onclick="checkAnswers(10,'Q10-1st');submit(this)"  class="submitButton" >Submit</button>

    </div>
</div>


</div>

       
        <div id="result" style="text-align: center; margin-buttom: 20px;">
            <button type="button" onclick="showResult()" class="submitButton" style="background-color:#1d5374; color :#f9f9f9;">Show Result</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        let correctAnswers = {
            1: 'Q1-1st',
            2: 'Q2-1st',
            3: 'Q3-4th',
            4: 'Q4-3rd',
            5: 'Q5-4th',
            6: 'Q6-1st',
            7: 'Q7-3rd',
            8: 'Q8-2nd',
            9: 'Q9-4th',
            10: 'Q10-1st'
        };

        function toggleAnswers(answerElement) {
            if (answerElement.style.display === "none" || answerElement.style.display === "") {
                answerElement.style.display = "block";
            } else {
                answerElement.style.display = "none";
            }
        }

        function checkAnswers(questionNumber, correctAnswerId) {
            const radios = document.getElementsByName('Q' + questionNumber);
            let selectedAnswerId = null;

            for (let i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    selectedAnswerId = radios[i].id;
                }
            }

            for (let i = 0; i < radios.length; i++) {
                if (radios[i].id === correctAnswerId) {
                    radios[i].nextElementSibling.style.background = 'green';
                } else if (radios[i].id === selectedAnswerId) {
                    radios[i].nextElementSibling.style.background = 'red';
                }
            }
        }

        function submit(button) {
            button.style.display = "none";
        }

        function expandLine(hr){
            if(hr.nextElementSibling.style.width == "70%"){
                hr.nextElementSibling.style.width = "20%";
            }else{
                hr.nextElementSibling.style.width = "70%"
            }
        }

        function showResult() {
            let correctCount = 0;
            let incorrectCount = 0;

            for (let questionNumber in correctAnswers) {
                const correctAnswerId = correctAnswers[questionNumber];
                const radios = document.getElementsByName('Q' + questionNumber);
                let selectedAnswerId = null;

                for (let i = 0; i < radios.length; i++) {
                    if (radios[i].checked) {
                        selectedAnswerId = radios[i].id;
                    }
                }

                if (selectedAnswerId === correctAnswerId) {
                    correctCount++;
                } else if (selectedAnswerId !== null) {
                    incorrectCount++;
                }
            }

            document.getElementById('result').innerHTML = `<p>Correct Answers: ${correctCount}</p><p>Incorrect Answers: ${incorrectCount}</p>`;
        }
    </script>
</body>
</html>
