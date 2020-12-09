

const questionNumber = document.querySelector(".question-number"); 
const questionText = document.querySelector(".question-text"); 
const optionContainer = document.querySelector(".option-container"); 
const answersIndicatorContainer = document.querySelector(".answers-indicator"); 
const homeBox = document.querySelector(".home-box");
const quizBox = document.querySelector(".quiz-box");
const resultBox = document.querySelector(".result-box");
const popupBox = document.querySelector(".popup");
const navBar = document.querySelector(".navbar");



let questionCounter = 0;
let currentQuestion;
let availableQuestions = [];
let availableOptions = [];
let correctAnswers = 0;


// on va push les questions dans l'Array availableQuestions
function setAvailableQuestions(){
    const totalQuestion = quiz.length;
    for(let i=0; i<totalQuestion; i++) {
        availableQuestions.push(quiz[i])
    }
}

// met en place le nombre de questions ainsi que les options possibles
function getNewQuestion() {
    // nombre de questions
    questionNumber.innerHTML = "Question " +  (questionCounter + 1) + " sur " + quiz.length;

    // le texte des questions
    // permet d'afficher des questions au hasard
    const questionIndex = availableQuestions[Math.floor(Math.random() * availableQuestions.length)];
    currentQuestion = questionIndex; 
    questionText.innerHTML = currentQuestion.q;

    // prend la position de 'questionIndex' dans l'Array availableQuestion; 
    const index1 = availableQuestions.indexOf(questionIndex);
    // enlève 'questionIndex' de l'Array availbleQuestion, afin qu'il n'y ait pas de répétition
    availableQuestions.splice(index1,1);
    
    // configure les options ainsi que leur longueurs
    const optionLen = currentQuestion.options.length
    // on va push les options dans l'Array availableOptions
    for(let i=0; i<optionLen; i++) {
        availableOptions.push(i)
    }

    optionContainer.innerHTML = '';
    let animationDelay = 0.15;

    // configure les options en HTML
    for(let i=0; i<optionLen; i++) {
        // option aléatoire
        const optonIndex = availableOptions[Math.floor(Math.random() * availableOptions.length)];
        // prend la position de'optonIndex' dans les availableOptions
        const index2 = availableOptions.indexOf(optonIndex);
        // supprime 'optionIndex' des availableOptions, pour éviter les répétitions
        availableOptions.splice(index2,1);
        const option = document.createElement("div");
        option.innerHTML = currentQuestion.options[optonIndex];
        option.id = optonIndex;
        option.style.animationDelay = animationDelay + 's';
        animationDelay = animationDelay + 0.15;
        option.className = "option";
        optionContainer.appendChild(option);
        option.setAttribute("onclick","getResult(this)");
    }

    questionCounter++
}

// stocke les résultats
function getResult(element){
    const id = parseInt(element.id);
    // trouve la réponse en comparant l'id de l'option où l'on a cliqué
    if(id === currentQuestion.answer){
        // affiche la couleur verte
        element.classList.add("correct");
        // ajoute le logo correct
        updateAnswersIndicator("correct");
        correctAnswers++;
    }
    else {
        // affiche la couleur rouge
        element.classList.add("wrong");
        // ajoute le logo faux
        updateAnswersIndicator("wrong");

        // si la réponse est fause on affiche la bonne
        const optionLen = optionContainer.children.length;
        for(let i=0; i<optionLen; i++){
            if(parseInt(optionContainer.children[i].id) === currentQuestion.answer){
                optionContainer.children[i].classList.add("correct");
;            }
        }
    }
    unclickableOptions();
}

// rendre impossible le fait de cliquer une autre fois lorsque l'on a déjà cliqué sur une option
function unclickableOptions(){
    const optionLen = optionContainer.children.length;
    for(let i=0; i<optionLen; i++){
        optionContainer.children[i].classList.add("already-answered");
    }
}

function answersIndicator(){
    answersIndicatorContainer.innerHTML = '';
    const totalQuestion = quiz.length;
    for(let i=0; i<totalQuestion; i++){
        const indicator = document.createElement("div");
        answersIndicatorContainer.appendChild(indicator);
    }
}

function updateAnswersIndicator(markType) {
    answersIndicatorContainer.children[questionCounter-1].classList.add(markType);
}

function next(){
    if(questionCounter === quiz.length) {
        console.log("quiz termine");
        quizOver();
    }
    else{
        getNewQuestion();
    }
}

function quizOver(){
    // cacher quizBox
    quizBox.classList.add("hide");
    // montrer resultBox
    resultBox.classList.remove("hide");
    quizResult();
}

// afficher les résultats
function quizResult(){
    let newUser = document.getElementById("userInput").value;
    resultBox.querySelector(".title-result").innerHTML = "Voici tes résultats ";
    resultBox.querySelector(".total-correct").innerHTML = correctAnswers;
    const percentage = (correctAnswers/quiz.length)*100;
    resultBox.querySelector(".percentage").innerHTML = percentage.toFixed(2) + "%";
    resultBox.querySelector(".total-score").innerHTML =  correctAnswers + "/" + quiz.length;
}

function resetQuiz(){
    questionCounter = 0;
    correctAnswers = 0;
    attempt = 0;
}

function goToHome(){
    resultBox.classList.add("hide");
    homeBox.classList.remove("hide");
    resetQuiz();
}

function tryAgainQuiz(){
    // cacher resultBox
    resultBox.classList.add("hide");
    // montrer quizBox
    quizBox.classList.remove("hide")
    resetQuiz();
    startQuiz();
}

function startQuiz(){
    // cacher homebox
    homeBox.classList.add("hide");
    quizBox.classList.remove("hide");
    // on va d'abord mettre en place les questions dans l'Array availbeQuestions
    setAvailableQuestions();
    // On va ensuite appeler la fonction getNewQuestion();
    getNewQuestion();
    // enfin on va créer l'indacteur de réponses
    answersIndicator();
}

function closePopup(){
    let newUser = document.getElementById("userInput").value;
    popupBox.classList.add("hide");
    navBar.querySelector(".welcome").innerHTML = "Bienvenue " ;
}

window.onload = function(){
    homeBox.querySelector(".total-q").innerHTML = quiz.length;
}